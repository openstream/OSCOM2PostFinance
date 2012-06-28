<?php
/*
  $Id: postfinance_ipn.php   2009-01-19 16:30
  PostFinance E-Payment Modele for osCommerce 2.2
  This file used for to update order status and order details after completion payment process.
*/

  chdir('../../../../');
  require('includes/application_top.php');

  reset($HTTP_POST_VARS);

  $order_status = $_GET['STATUS'];
  $osCsid = $_GET['osCsid']; 

  if ($order_status == '5' || $order_status == '9' || $order_status == '91' || $order_status == '51') {
    if (isset($_GET['orderID']) && is_numeric($_GET['orderID']) && ($_GET['orderID'] > 0)) {

      $order_query = tep_db_query("select orders_status, currency, currency_value from " . TABLE_ORDERS . " where orders_id = '" . $_GET['orderID']  . "'");
      if (tep_db_num_rows($order_query) > 0) {
        $order = tep_db_fetch_array($order_query);

        if ($order['orders_status'] == MODULE_PAYMENT_POSTFINANCE_PREPARE_ORDER_STATUS_ID ) {
          $sql_data_array = array('orders_id' => $_GET['orderID'],
                                  'orders_status_id' => MODULE_PAYMENT_POSTFINANCE_PREPARE_ORDER_STATUS_ID,
                                  'date_added' => 'now()',
                                  'customer_notified' => '0',
                                  'comments' => $_SESSION['comments']);

          tep_db_perform(TABLE_ORDERS_STATUS_HISTORY, $sql_data_array);

		  tep_db_query("update " . TABLE_ORDERS . " set orders_status = '" . (MODULE_PAYMENT_POSTFINANCE_ORDER_STATUS_ID > 0 ? (int)MODULE_PAYMENT_POSTFINANCE_ORDER_STATUS_ID : (int)DEFAULT_ORDERS_STATUS_ID) . "', last_modified = now() where orders_id = '" . (int)$_GET['orderID'] . "'");

        }

        $total_query = tep_db_query("select value from " . TABLE_ORDERS_TOTAL . " where orders_id = '" . $_GET['orderID'] . "' and class = 'ot_total' limit 1");
        $total = tep_db_fetch_array($total_query);

        if ($order_status == '5') {
          $comment_status = 'Payment has been authorized';
        } elseif ( ($order_status == '9') ) {
          $comment_status = 'Payment has been accepted';
        }elseif ( ($order_status == '51' || $order_status == '91' ) ) {
          $comment_status = 'Payment is pending';
        }

        $sql_data_array = array('orders_id' => $_GET['orderID'],
                                'orders_status_id' => (MODULE_PAYMENT_POSTFINANCE_ORDER_STATUS_ID > 0 ? (int)MODULE_PAYMENT_POSTFINANCE_ORDER_STATUS_ID : (int)DEFAULT_ORDERS_STATUS_ID),
                                'date_added' => 'now()',
                                'customer_notified' => '0',
                                'comments' => 'PostFinance IPN Verified [' . $comment_status . ']');

        tep_db_perform(TABLE_ORDERS_STATUS_HISTORY, $sql_data_array);
      }
    }
	tep_session_unregister('cart');
	header("Location: ../../../../checkout_success.php?osCsid=$osCsid");
	exit;
  } else {

    if (tep_not_null(MODULE_PAYMENT_POSTFINANCE_DEBUG_EMAIL)) {
      $email_body = '$HTTP_POST_VARS:' . "\n\n";

      reset($HTTP_POST_VARS);
      while (list($key, $value) = each($HTTP_POST_VARS)) {
        $email_body .= $key . '=' . $value . "\n";
      }

      $email_body .= "\n" . '$HTTP_GET_VARS:' . "\n\n";

      reset($HTTP_GET_VARS);
      while (list($key, $value) = each($HTTP_GET_VARS)) {
        $email_body .= $key . '=' . $value . "\n";
      }

      tep_mail('', MODULE_PAYMENT_POSTFINANCE_DEBUG_EMAIL, 'PostFinance IPN Invalid Process', $email_body, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);
    }

    if (isset($_GET['orderID']) && is_numeric($_GET['orderID']) && ($_GET['orderID'] > 0)) {
      $check_query = tep_db_query("select orders_id from " . TABLE_ORDERS . " where orders_id = '" . $_GET['orderID'] . "'");
      if (tep_db_num_rows($check_query) > 0) {

        if ($order_status == "2") {
          $comment_status = 'Declined';
        } elseif ( $order_status == "52" || $order_status == "92" ) {
          $comment_status = 'Exception occured';
        } elseif ( $order_status == "1" ) {
          $comment_status = 'Cancelled';
        }
	
	    $check_query	= tep_db_query("select orders_status_id from " . TABLE_ORDERS_STATUS . " where orders_status_name = 'Processing' limit 1");
	    $cancel_status	= tep_db_fetch_array($check_query);
		$status_id		= $cancel_status['orders_status_id'];

		tep_db_query("delete from " . TABLE_ORDERS . " where orders_id = '" . $_GET['orderID'] . "'");

        $sql_data_array = array('orders_id' => $_GET['orderID'],
                                'orders_status_id' => (MODULE_PAYMENT_POSTFINANCE_ORDER_STATUS_ID > 0) ? MODULE_PAYMENT_POSTFINANCE_ORDER_STATUS_ID : DEFAULT_ORDERS_STATUS_ID,
                                'date_added' => 'now()',
                                'customer_notified' => '0',
                                'comments' => 'PostFinance IPN Invalid [' . $comment_status . ']');

        tep_db_perform(TABLE_ORDERS_STATUS_HISTORY, $sql_data_array);
      }
    }
	header("Location: ../../../../checkout_payment.php?osCsid=$osCsid");
	exit;
  }



?>
