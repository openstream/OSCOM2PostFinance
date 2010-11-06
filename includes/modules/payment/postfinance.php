<?php
/*
  $Id: postfinance.php   2009-01-19 16:30
  PostFinance E-Payment Modele for osCommerce 2.2
*/

  class postfinance {
    var $code, $title, $description, $enabled;

	// class constructor
    function postfinance() {
      global $order;
		$this->adminlang		= $_SESSION['languages_id']; 
		$this->postfinanceLang	= $_SESSION['language']; 
		$this->code				= 'postfinance';
		$this->title			= MODULE_PAYMENT_POSTFINANCE_TEXT_TITLE;
		$this->description		= MODULE_PAYMENT_POSTFINANCE_TEXT_DESCRIPTION;
		$this->sort_order		= MODULE_PAYMENT_POSTFINANCE_SORT_ORDER;
		$this->email_description= MODULE_PAYMENT_POSTFINANCE_TEXT_DESCRIPTION ;
		$this->enabled			= (MODULE_PAYMENT_POSTFINANCE_STATUS == 'True') ? true : false;
		$this->state			= (MODULE_PAYMENT_POSTFINANCE_MOD == '1') ? '1' : '0';
	
	switch($this->adminlang){
	case 1:
		$this->postFinanceInfo = array(
							"activeModuleMainTitle"		=> "Activate PostFinance module",
							"activeModuleSubTitle"		=> "Would you like to accept payments via PostFinance?",
							"SortMainTitle"				=> "Sort",
							"SortSubTitle"				=> "Sort order of display. (Lowest is displayed first)",
							"defCurrMainTitle"			=> "Default Transaction Currency",
							"defCurrSubTitle"			=> "The default currency to use for transactions (ex: CHF forces to use CHF for payment / empty if Navigation currency is udes)",
							"preparingMainTitle"		=> "Set Preparing Order Status",
							"preparingSubTitle"			=> "Set the status of prepared orders made with this payment module to this value",
							"statusMainTitle"			=> "State of order",
							"statusSubTitle"			=> "Set the status of orders made with this payment module to this value.",
							"payZoneMainTitle"			=> "Payment Zone",
							"payZoneSubTitle"			=> "If a zone is selected, only enable this payment method for that zone.",
							"ModMainTitle"				=> "Mod",
							"ModSubTitle"				=> "Mod (1=TEST / ELSE=PRODUCTION)",
							"merchantIDMainTitle"		=> "Merchant ID (PSPID)",
							"merchantIDSubTitle"		=> "The merchant ID (PSPID) to connect to the gateway with.",
							"userIDMainTitle"			=> "User ID (optional)",
							"userIDSubTitle"			=> "The user ID to perform transactions under. (optional).",
							"merchantPasswordMainTitle" => "Merchant/User Password",
							"merchantPasswordSubTitle"	=> "The password to use with the merchant or user ID when connecting to the gateway.",
							"SHAMainTitle"				=> "SHA-1 Signature",
							"SHASubTitle"				=> "The additional string to use when building the SHA-1 signature of the transaction. (optional; 3.2)",
							"PageTitleMainTitle"		=> "Title and header of the page",
							"PageTitleSubTitle"			=> "Title and header of the page.",
							"BgColorMainTitle"			=> "Background color",
							"BgColorSubTitle"			=> "Background color",
							"TextColorMainTitle"		=> "Text color",
							"TextColorSubTitle"			=> "Text color",
							"TableBgColorMainTitle"		=> "Table background color",
							"TableBgColorSubTitle"		=> "Table background color",
							"TableTextColorMainTitle"	=> "Table text color",
							"TableTextColorSubTitle"	=> "Table text color",
							"ButtonBgColorMainTitle"	=> "Button background color",
							"ButtonBgColorSubTitle"		=> "Button background color",
							"ButtonTextColorMainTitle"	=> "Button text color",
							"ButtonTextColorSubTitle"	=> "Button text color",
							"FontFamilyMainTitle"		=> "Font family",
							"FontFamilySubTitle"		=> "Font family",
							"acceptUrlMainTitle"		=> "Accept Url",
							"acceptUrlSubTitle"			=> "URL of the web page to display to the customer when the payment has been authorized or is waiting to be accepted.",
							"declineUrlMainTitle"		=> "Decline Url",
							"declineUrlSubTitle"		=> "URL of the web page to show the customer when the acquirer declines the authorization more than the maximum permissible number of times.",
							"exceptionUrlMainTitle"		=> "Exception Url",
							"exceptionUrlSubTitle"		=> "URL of the web page to display to the customer when the payment result is uncertain.",
							"cancelUrlMainTitle"		=> "Cancel Url",
							"cancelUrlSubTitle"			=> "URL of the web page to display to the customer when he cancels the payment.",
							"catalogUrlMainTitle"		=> "Catalog Url",
							"catalogUrlSubTitle"		=> "Catalog Url.",
							"homeUrlMainTitle"			=> "Home Url",
							"homeUrlSubTitle"			=> "Site home Url.",
							"logoMainTitle"				=> "Logo URL",
							"logoSubTitle"				=> "URL/filename of the logo you want to display at the top of the payment page next to the title. The URL must be absolute (contain the full path),it cannot be relative.",
							"debugEmailMainTitle"		=> "Debug E-Mail Address",
							"debugEmailSubTitle"		=> "All parameters of an Invalid IPN notification will be sent to this email address if one is entered.",
							"TemplateURLTitle"			=> "Payment Page Template",
							"TemplateURLSubTitle"		=> "Absolute URL to the payment page template. Sample template  is located under ext/modules/payment/postfinance/template-oscommerce.html. See PostFinance documentation for details",
							);
	break;
	case 2:
		$this->postFinanceInfo = array(
							"activeModuleMainTitle"		=> "Activate PostFinance module",
							"activeModuleSubTitle"		=> "Would you like to accept payments via PostFinance?",
							"SortMainTitle"				=> "Sort",
							"SortSubTitle"				=> "Sort order of display. (Lowest is displayed first)",
							"defCurrMainTitle"			=> "Default Transaction Currency",
							"defCurrSubTitle"			=> "The default currency to use for transactions (ex: CHF forces to use CHF for payment / empty if Navigation currency is udes)",
							"preparingMainTitle"		=> "Set Preparing Order Status",
							"preparingSubTitle"			=> "Set the status of prepared orders made with this payment module to this value",
							"statusMainTitle"			=> "State of order",
							"statusSubTitle"			=> "Set the status of orders made with this payment module to this value.",
							"payZoneMainTitle"			=> "Payment Zone",
							"payZoneSubTitle"			=> "If a zone is selected, only enable this payment method for that zone.",
							"ModMainTitle"				=> "Mod",
							"ModSubTitle"				=> "Mod (1=TEST / ELSE=PRODUCTION)",
							"merchantIDMainTitle"		=> "Merchant ID (PSPID)",
							"merchantIDSubTitle"		=> "The merchant ID (PSPID) to connect to the gateway with.",
							"userIDMainTitle"			=> "User ID (optional)",
							"userIDSubTitle"			=> "The user ID to perform transactions under. (optional).",
							"merchantPasswordMainTitle" => "Merchant/User Password",
							"merchantPasswordSubTitle"	=> "The password to use with the merchant or user ID when connecting to the gateway.",
							"SHAMainTitle"				=> "SHA-1 Signature",
							"SHASubTitle"				=> "The additional string to use when building the SHA-1 signature of the transaction. (optional; 3.2)",
							"PageTitleMainTitle"		=> "Title and header of the page",
							"PageTitleSubTitle"			=> "Title and header of the page.",
							"BgColorMainTitle"			=> "Background color",
							"BgColorSubTitle"			=> "Background color",
							"TextColorMainTitle"		=> "Text color",
							"TextColorSubTitle"			=> "Text color",
							"TableBgColorMainTitle"		=> "Table background color",
							"TableBgColorSubTitle"		=> "Table background color",
							"TableTextColorMainTitle"	=> "Table text color",
							"TableTextColorSubTitle"	=> "Table text color",
							"ButtonBgColorMainTitle"	=> "Button background color",
							"ButtonBgColorSubTitle"		=> "Button background color",
							"ButtonTextColorMainTitle"	=> "Button text color",
							"ButtonTextColorSubTitle"	=> "Button text color",
							"FontFamilyMainTitle"		=> "Font family",
							"FontFamilySubTitle"		=> "Font family",
							"acceptUrlMainTitle"		=> "Accept Url",
							"acceptUrlSubTitle"			=> "URL of the web page to display to the customer when the payment has been authorized or is waiting to be accepted.",
							"declineUrlMainTitle"		=> "Decline Url",
							"declineUrlSubTitle"		=> "URL of the web page to show the customer when the acquirer declines the authorization more than the maximum permissible number of times.",
							"exceptionUrlMainTitle"		=> "Exception Url",
							"exceptionUrlSubTitle"		=> "URL of the web page to display to the customer when the payment result is uncertain.",
							"cancelUrlMainTitle"		=> "Cancel Url",
							"cancelUrlSubTitle"			=> "URL of the web page to display to the customer when he cancels the payment.",
							"catalogUrlMainTitle"		=> "Catalog Url",
							"catalogUrlSubTitle"		=> "Catalog Url.",
							"homeUrlMainTitle"			=> "Home Url",
							"homeUrlSubTitle"			=> "Site home Url.",
							"logoMainTitle"				=> "Logo URL",
							"logoSubTitle"				=> "URL/filename of the logo you want to display at the top of the payment page next to the title. The URL must be absolute (contain the full path),it cannot be relative.",
							"debugEmailMainTitle"		=> "Debug E-Mail Address",
							"debugEmailSubTitle"		=> "All parameters of an Invalid IPN notification will be sent to this email address if one is entered.",
							"TemplateURLTitle"			=> "Payment Page Template",
							"TemplateURLSubTitle"		=> "Absolute URL to the payment page template. Sample template  is located under ext/modules/payment/postfinance/template-oscommerce.html. See PostFinance documentation for details",		
							);
	  break;
	  case 3:
	  default:
		$this->postFinanceInfo = array(
							"activeModuleMainTitle"		=> "Activate PostFinance module",
							"activeModuleSubTitle"		=> "Would you like to accept payments via PostFinance?",
							"SortMainTitle"				=> "Sort",
							"SortSubTitle"				=> "Sort order of display. (Lowest is displayed first)",
							"defCurrMainTitle"			=> "Default Transaction Currency",
							"defCurrSubTitle"			=> "The default currency to use for transactions (ex: CHF forces to use CHF for payment / empty if Navigation currency is udes)",
							"preparingMainTitle"		=> "Set Preparing Order Status",
							"preparingSubTitle"			=> "Set the status of prepared orders made with this payment module to this value",
							"statusMainTitle"			=> "State of order",
							"statusSubTitle"			=> "Set the status of orders made with this payment module to this value.",
							"payZoneMainTitle"			=> "Payment Zone",
							"payZoneSubTitle"			=> "If a zone is selected, only enable this payment method for that zone.",
							"ModMainTitle"				=> "Mod",
							"ModSubTitle"				=> "Mod (1=TEST / ELSE=PRODUCTION)",
							"merchantIDMainTitle"		=> "Merchant ID (PSPID)",
							"merchantIDSubTitle"		=> "The merchant ID (PSPID) to connect to the gateway with.",
							"userIDMainTitle"			=> "User ID (optional)",
							"userIDSubTitle"			=> "The user ID to perform transactions under. (optional).",
							"merchantPasswordMainTitle" => "Merchant/User Password",
							"merchantPasswordSubTitle"	=> "The password to use with the merchant or user ID when connecting to the gateway.",
							"SHAMainTitle"				=> "SHA-1 Signature",
							"SHASubTitle"				=> "The additional string to use when building the SHA-1 signature of the transaction. (optional; 3.2)",
							"PageTitleMainTitle"		=> "Title and header of the page",
							"PageTitleSubTitle"			=> "Title and header of the page.",
							"BgColorMainTitle"			=> "Background color",
							"BgColorSubTitle"			=> "Background color",
							"TextColorMainTitle"		=> "Text color",
							"TextColorSubTitle"			=> "Text color",
							"TableBgColorMainTitle"		=> "Table background color",
							"TableBgColorSubTitle"		=> "Table background color",
							"TableTextColorMainTitle"	=> "Table text color",
							"TableTextColorSubTitle"	=> "Table text color",
							"ButtonBgColorMainTitle"	=> "Button background color",
							"ButtonBgColorSubTitle"		=> "Button background color",
							"ButtonTextColorMainTitle"	=> "Button text color",
							"ButtonTextColorSubTitle"	=> "Button text color",
							"FontFamilyMainTitle"		=> "Font family",
							"FontFamilySubTitle"		=> "Font family",
							"acceptUrlMainTitle"		=> "Accept Url",
							"acceptUrlSubTitle"			=> "URL of the web page to display to the customer when the payment has been authorized or is waiting to be accepted.",
							"declineUrlMainTitle"		=> "Decline Url",
							"declineUrlSubTitle"		=> "URL of the web page to show the customer when the acquirer declines the authorization more than the maximum permissible number of times.",
							"exceptionUrlMainTitle"		=> "Exception Url",
							"exceptionUrlSubTitle"		=> "URL of the web page to display to the customer when the payment result is uncertain.",
							"cancelUrlMainTitle"		=> "Cancel Url",
							"cancelUrlSubTitle"			=> "URL of the web page to display to the customer when he cancels the payment.",
							"catalogUrlMainTitle"		=> "Catalog Url",
							"catalogUrlSubTitle"		=> "Catalog Url.",
							"homeUrlMainTitle"			=> "Home Url",
							"homeUrlSubTitle"			=> "Site home Url.",
							"logoMainTitle"				=> "Logo URL",
							"logoSubTitle"				=> "URL/filename of the logo you want to display at the top of the payment page next to the title. The URL must be absolute (contain the full path),it cannot be relative.",
							"debugEmailMainTitle"		=> "Debug E-Mail Address",
							"debugEmailSubTitle"		=> "All parameters of an Invalid IPN notification will be sent to this email address if one is entered.",
							"TemplateURLTitle"			=> "Payment Page Template",
							"TemplateURLSubTitle"		=> "Absolute URL to the payment page template. Sample template  is located under ext/modules/payment/postfinance/template-oscommerce.html. See PostFinance documentation for details",		
							);
	  break;
	}

      if ((int)MODULE_PAYMENT_POSTFINANCE_PREPARE_ORDER_STATUS_ID > 0) {
        $this->order_status = MODULE_PAYMENT_POSTFINANCE_PREPARE_ORDER_STATUS_ID;
      }

      if (is_object($order)) 
			$this->update_status();

      // Please choose if you are in testing or production phase: 1 = Test, 0 = Production

	  if($this->state == "1") {
		  $this->form_action_url='https://e-payment.postfinance.ch/ncol/test/orderstandard.asp';
	  }
  	  else {
		  $this->form_action_url='https://e-payment.postfinance.ch/ncol/prod/orderstandard.asp';
	  }

    }

	// class methods
    function update_status() {
		global $order;

		if ( ($this->enabled == true) && ((int)MODULE_PAYMENT_POSTFINANCE_ZONE > 0) ) {
			$check_flag = false;
			$check_query = tep_db_query("select zone_id from " . TABLE_ZONES_TO_GEO_ZONES . " where geo_zone_id = '" . MODULE_PAYMENT_POSTFINANCE_ZONE . "' and zone_country_id = '" . $order->billing['country']['id'] . "' order by zone_id");
			while ($check = tep_db_fetch_array($check_query)) {
				if ($check['zone_id'] < 1) {
					$check_flag = true;
					break;
				 }
				 elseif ($check['zone_id'] == $order->billing['zone_id']) {
					$check_flag = true;
					break;
				 }
			}

			if ($check_flag == false) {
				  $this->enabled = false;
			}
		}
    }

    function javascript_validation() {
      return false;
    }

	function selection() {
      global $cart_PostFinance_ID;

      if (tep_session_is_registered('cart_PostFinance_ID')) {
        $order_id = substr($cart_PostFinance_ID, strpos($cart_PostFinance_ID, '-')+1);
        $check_query = tep_db_query('select orders_id from ' . TABLE_ORDERS_STATUS_HISTORY . ' where orders_id = "' . (int)$order_id . '" limit 1');

        if (tep_db_num_rows($check_query) < 1) {
          tep_db_query('delete from ' . TABLE_ORDERS . ' where orders_id = "' . (int)$order_id . '"');
          tep_db_query('delete from ' . TABLE_ORDERS_TOTAL . ' where orders_id = "' . (int)$order_id . '"');
          tep_db_query('delete from ' . TABLE_ORDERS_STATUS_HISTORY . ' where orders_id = "' . (int)$order_id . '"');
          tep_db_query('delete from ' . TABLE_ORDERS_PRODUCTS . ' where orders_id = "' . (int)$order_id . '"');
          tep_db_query('delete from ' . TABLE_ORDERS_PRODUCTS_ATTRIBUTES . ' where orders_id = "' . (int)$order_id . '"');
          tep_db_query('delete from ' . TABLE_ORDERS_PRODUCTS_DOWNLOAD . ' where orders_id = "' . (int)$order_id . '"');

          tep_session_unregister('cart_PostFinance_ID');
        }
      }

      return array('id'		=> $this->code,
                   'module' => $this->title);
    }

    function pre_confirmation_check() {
      global $cartID, $cart;

      if (empty($cart->cartID)) {
        $cartID = $cart->cartID = $cart->generate_cart_id();
      }

      if (!tep_session_is_registered('cartID')) {
        tep_session_register('cartID');
      }
    }


	function confirmation() {
      global $cartID, $cart_PostFinance_ID, $customer_id, $languages_id, $order, $order_total_modules;
      if (tep_session_is_registered('cartID')) {
        $insert_order	= false;

        if (tep_session_is_registered('cart_PostFinance_ID')) {
          $order_id		= substr($cart_PostFinance_ID, strpos($cart_PostFinance_ID, '-')+1);
          $curr_check	= tep_db_query("select currency from " . TABLE_ORDERS . " where orders_id = '" . (int)$order_id . "'");
          $curr			= tep_db_fetch_array($curr_check);

          if ( ($curr['currency'] != $order->info['currency']) || ($cartID != substr($cart_PostFinance_ID, 0, strlen($cartID))) ) {
            $check_query = tep_db_query('select orders_id from ' . TABLE_ORDERS_STATUS_HISTORY . ' where orders_id = "' . (int)$order_id . '" limit 1');

            if (tep_db_num_rows($check_query) < 1) {
              tep_db_query('delete from ' . TABLE_ORDERS . ' where orders_id = "' . (int)$order_id . '"');
              tep_db_query('delete from ' . TABLE_ORDERS_TOTAL . ' where orders_id = "' . (int)$order_id . '"');
              tep_db_query('delete from ' . TABLE_ORDERS_STATUS_HISTORY . ' where orders_id = "' . (int)$order_id . '"');
              tep_db_query('delete from ' . TABLE_ORDERS_PRODUCTS . ' where orders_id = "' . (int)$order_id . '"');
              tep_db_query('delete from ' . TABLE_ORDERS_PRODUCTS_ATTRIBUTES . ' where orders_id = "' . (int)$order_id . '"');
              tep_db_query('delete from ' . TABLE_ORDERS_PRODUCTS_DOWNLOAD . ' where orders_id = "' . (int)$order_id . '"');
            }

            $insert_order = true;
          }
        } else {
          $insert_order = true;
        }

        if ($insert_order == true) {
          $order_totals = array();
          if (is_array($order_total_modules->modules)) {
            reset($order_total_modules->modules);
            while (list(, $value) = each($order_total_modules->modules)) {
              $class	= substr($value, 0, strrpos($value, '.'));
              if ($GLOBALS[$class]->enabled) {
                for ($i=0, $n=sizeof($GLOBALS[$class]->output); $i<$n; $i++) {
                  if (tep_not_null($GLOBALS[$class]->output[$i]['title']) && tep_not_null($GLOBALS[$class]->output[$i]['text'])) {
                    $order_totals[] = array('code'				=> $GLOBALS[$class]->code,
                                            'title'				=> $GLOBALS[$class]->output[$i]['title'],
                                            'text'				=> $GLOBALS[$class]->output[$i]['text'],
                                            'value'				=> $GLOBALS[$class]->output[$i]['value'],
                                            'sort_order'		=> $GLOBALS[$class]->sort_order);
                  }
                }
              }
            }
          }

          $sql_data_array = array('customers_id'				=> $customer_id,
                                  'customers_name'				=> $order->customer['firstname'] . ' ' . $order->customer['lastname'],
                                  'customers_company'			=> $order->customer['company'],
                                  'customers_street_address'	=> $order->customer['street_address'],
                                  'customers_suburb'			=> $order->customer['suburb'],
                                  'customers_city'				=> $order->customer['city'],
                                  'customers_postcode'			=> $order->customer['postcode'],
                                  'customers_state'				=> $order->customer['state'],
                                  'customers_country'			=> $order->customer['country']['title'],
                                  'customers_telephone'			=> $order->customer['telephone'],
                                  'customers_email_address'		=> $order->customer['email_address'],
                                  'customers_address_format_id' => $order->customer['format_id'],
                                  'delivery_name'				=> $order->delivery['firstname'] . ' ' . $order->delivery['lastname'],
                                  'delivery_company'			=> $order->delivery['company'],
                                  'delivery_street_address'		=> $order->delivery['street_address'],
                                  'delivery_suburb'				=> $order->delivery['suburb'],
                                  'delivery_city'				=> $order->delivery['city'],
                                  'delivery_postcode'			=> $order->delivery['postcode'],
                                  'delivery_state'				=> $order->delivery['state'],
                                  'delivery_country'			=> $order->delivery['country']['title'],
                                  'delivery_address_format_id'	=> $order->delivery['format_id'],
                                  'billing_name'				=> $order->billing['firstname'] . ' ' . $order->billing['lastname'],
                                  'billing_company'				=> $order->billing['company'],
                                  'billing_street_address'		=> $order->billing['street_address'],
                                  'billing_suburb'				=> $order->billing['suburb'],
                                  'billing_city'				=> $order->billing['city'],
                                  'billing_postcode'			=> $order->billing['postcode'],
                                  'billing_state'				=> $order->billing['state'],
                                  'billing_country'				=> $order->billing['country']['title'],
                                  'billing_address_format_id'	=> $order->billing['format_id'],
                                  'payment_method'				=> $order->info['payment_method'],
                                  'cc_type'						=> $order->info['cc_type'],
                                  'cc_owner'					=> $order->info['cc_owner'],
                                  'cc_number'					=> $order->info['cc_number'],
                                  'cc_expires'					=> $order->info['cc_expires'],
                                  'date_purchased'				=> 'now()',
                                  'orders_status'				=> $order->info['order_status'],
                                  'currency'					=> $order->info['currency'],
                                  'currency_value'				=> $order->info['currency_value']);

          tep_db_perform(TABLE_ORDERS, $sql_data_array);

          $insert_id = tep_db_insert_id();

          for ($i=0, $n=sizeof($order_totals); $i<$n; $i++) {
            $sql_data_array = array('orders_id'					=> $insert_id,
                                    'title'						=> $order_totals[$i]['title'],
                                    'text'						=> $order_totals[$i]['text'],
                                    'value'						=> $order_totals[$i]['value'],
                                    'class'						=> $order_totals[$i]['code'],
                                    'sort_order'				=> $order_totals[$i]['sort_order']);

            tep_db_perform(TABLE_ORDERS_TOTAL, $sql_data_array);
          }

          for ($i=0, $n=sizeof($order->products); $i<$n; $i++) {
            $sql_data_array = array('orders_id'					=> $insert_id,
                                    'products_id'				=> tep_get_prid($order->products[$i]['id']),
                                    'products_model'			=> $order->products[$i]['model'],
                                    'products_name'				=> $order->products[$i]['name'],
                                    'products_price'			=> $order->products[$i]['price'],
                                    'final_price'				=> $order->products[$i]['final_price'],
                                    'products_tax'				=> $order->products[$i]['tax'],
                                    'products_quantity'			=> $order->products[$i]['qty']);

            tep_db_perform(TABLE_ORDERS_PRODUCTS, $sql_data_array);

            $order_products_id = tep_db_insert_id();

            $attributes_exist = '0';
            if (isset($order->products[$i]['attributes'])) {
              $attributes_exist = '1';
              for ($j=0, $n2=sizeof($order->products[$i]['attributes']); $j<$n2; $j++) {
                if (DOWNLOAD_ENABLED == 'true') {
                  $attributes_query = "select popt.products_options_name, poval.products_options_values_name, pa.options_values_price, pa.price_prefix, pad.products_attributes_maxdays, pad.products_attributes_maxcount , pad.products_attributes_filename
                                       from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_OPTIONS_VALUES . " poval, " . TABLE_PRODUCTS_ATTRIBUTES . " pa
                                       left join " . TABLE_PRODUCTS_ATTRIBUTES_DOWNLOAD . " pad
                                       on pa.products_attributes_id=pad.products_attributes_id
                                       where pa.products_id = '" . $order->products[$i]['id'] . "'
                                       and pa.options_id = '" . $order->products[$i]['attributes'][$j]['option_id'] . "'
                                       and pa.options_id = popt.products_options_id
                                       and pa.options_values_id = '" . $order->products[$i]['attributes'][$j]['value_id'] . "'
                                       and pa.options_values_id = poval.products_options_values_id
                                       and popt.language_id = '" . $languages_id . "'
                                       and poval.language_id = '" . $languages_id . "'";
                  $attributes = tep_db_query($attributes_query);
                } else {
                  $attributes = tep_db_query("select popt.products_options_name, poval.products_options_values_name, pa.options_values_price, pa.price_prefix from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_OPTIONS_VALUES . " poval, " . TABLE_PRODUCTS_ATTRIBUTES . " pa where pa.products_id = '" . $order->products[$i]['id'] . "' and pa.options_id = '" . $order->products[$i]['attributes'][$j]['option_id'] . "' and pa.options_id = popt.products_options_id and pa.options_values_id = '" . $order->products[$i]['attributes'][$j]['value_id'] . "' and pa.options_values_id = poval.products_options_values_id and popt.language_id = '" . $languages_id . "' and poval.language_id = '" . $languages_id . "'");
                }
                $attributes_values = tep_db_fetch_array($attributes);

                $sql_data_array = array('orders_id' => $insert_id,
                                        'orders_products_id' => $order_products_id,
                                        'products_options' => $attributes_values['products_options_name'],
                                        'products_options_values' => $attributes_values['products_options_values_name'],
                                        'options_values_price' => $attributes_values['options_values_price'],
                                        'price_prefix' => $attributes_values['price_prefix']);

                tep_db_perform(TABLE_ORDERS_PRODUCTS_ATTRIBUTES, $sql_data_array);

                if ((DOWNLOAD_ENABLED == 'true') && isset($attributes_values['products_attributes_filename']) && tep_not_null($attributes_values['products_attributes_filename'])) {
                  $sql_data_array = array('orders_id' => $insert_id,
                                          'orders_products_id' => $order_products_id,
                                          'orders_products_filename' => $attributes_values['products_attributes_filename'],
                                          'download_maxdays' => $attributes_values['products_attributes_maxdays'],
                                          'download_count' => $attributes_values['products_attributes_maxcount']);

                  tep_db_perform(TABLE_ORDERS_PRODUCTS_DOWNLOAD, $sql_data_array);
                }
              }
            }
          }

          $cart_PostFinance_ID = $cartID . '-' . $insert_id;
          tep_session_register('cart_PostFinance_ID');
          tep_session_register('order_id');
        }
      }

      return false;
    }


    function process_button() {
		global $HTTP_POST_VARS, $HTTP_SERVER_VARS, $customer_id, $currencies, $currency, $order, $osCsid, $sidretour, $customers_id, $language, $cart_PostFinance_ID;

		$cart_id = explode("-", $cart_PostFinance_ID);
		$order_id = $cart_id[1];

		switch($language){
			case 'english':
			  $usedlanguage='en_US';
			break;
			case 'german':
			  $usedlanguage='de_DE';
			break;
			case 'espanol':
			  $usedlanguage='es_ES';
			break;
			case 'french':
			  $usedlanguage='fr_FR';
			break;
			case 'italian':
			  $usedlanguage='it_IT';
			break;
			default:
			  $usedlanguage='en_US';
			break;
		}
      
       //set default currency for module

	    if(MODULE_PAYMENT_POSTFINANCE_CURRENCY){
			$usedcurrency	= MODULE_PAYMENT_POSTFINANCE_CURRENCY;
		}else{
			$usedcurrency	= $currency;
		}
		
		// Following variables for postfiance login and payment page settings

		$merchant_id						= MODULE_PAYMENT_POSTFINANCE_MERCHANT_ID;
		$payment_gateway_page_title			= MODULE_PAYMENT_POSTFINANCE_TITLE;
		$payment_gateway_page_bgcolor		= MODULE_PAYMENT_POSTFINANCE_BGCOLOR;
		$payment_gateway_page_txtcolor		= MODULE_PAYMENT_POSTFINANCE_TXTCOLOR;
		$payment_gateway_page_tblbgcolor	= MODULE_PAYMENT_POSTFINANCE_TBLBGCOLOR;
		$payment_gateway_page_tbltxtcolor	= MODULE_PAYMENT_POSTFINANCE_TBLTXTCOLOR;
		$payment_gateway_page_buttonbgcolor	= MODULE_PAYMENT_POSTFINANCE_BUTTONBGCOLOR;
		$payment_gateway_page_buttontxtcolor= MODULE_PAYMENT_POSTFINANCE_BUTTONTXTCOLOR;
		$payment_gateway_page_fonttype		= MODULE_PAYMENT_POSTFINANCE_FONTTYPE;
		$payment_gateway_page_logo			= MODULE_PAYMENT_POSTFINANCE_LOGO;

		$payment_gateway_page_accepturl		= MODULE_PAYMENT_POSTFINANCE_ACCEPTURL;
		$payment_gateway_page_declineurl	= MODULE_PAYMENT_POSTFINANCE_DECLINEURL;
		$payment_gateway_page_exceptionurl	= MODULE_PAYMENT_POSTFINANCE_EXCEPTIONURL;
		$payment_gateway_page_cancelurl		= MODULE_PAYMENT_POSTFINANCE_CANCELURL;
		$payment_gateway_page_catalogurl	= MODULE_PAYMENT_POSTFINANCE_CATALOGURL;
		$payment_gateway_page_homeurl		= MODULE_PAYMENT_POSTFINANCE_HOMEURL;
		$payment_gateway_sha_signature		= MODULE_PAYMENT_POSTFINANCE_SHA1_SIGNATURE;
		$payment_gateway_page_template		= MODULE_PAYMENT_POSTFINANCE_TEMPLATE_URL;

		$usedtotal = number_format($order->info['total'] * $currencies->get_value($currency), $currencies->get_decimal_places($currency), '.', '');
		$sidretour = tep_session_name() . '=' . tep_session_id(); 
		$usedtotal = $usedtotal*100;
			  
		$process_button_string = '';
		$params = array('PSPID' => $merchant_id, 
						'amount' => $usedtotal, 
						'language' => $usedlanguage, 
						'currency' => $usedcurrency, 
						'orderID' => $order_id,
						'CN' => $order->billing['firstname']." ".$order->billing['lastname'], 
						'owneraddress' => $order->billing['street_address'], 
						'ownerZIP' => $order->billing['postcode'], 
						'ownercty' => $order->billing['country']['iso_code_2'], 
						'ownertown' => $order->billing['city'], 
						'ownertelno' => $order->customer['telephone'], 
						'EMAIL' => $order->customer['email_address'],
						'accepturl' => $payment_gateway_page_accepturl,
						'declineurl' => $payment_gateway_page_declineurl,
						'exceptionurl' => $payment_gateway_page_exceptionurl,
						'cancelurl' => $payment_gateway_page_cancelurl,
						'catalogurl' => $payment_gateway_page_catalogurl,
						'homeurl' => $payment_gateway_page_homeurl,
						'TITLE' => $payment_gateway_page_title, 
						'BGCOLOR' => $payment_gateway_page_bgcolor, 
						'TXTCOLOR' => $payment_gateway_page_txtcolor, 
						'TBLBGCOLOR' => $payment_gateway_page_tblbgcolor, 
						'TBLTXTCOLOR' => $payment_gateway_page_tbltxtcolor, 
						'BUTTONBGCOLOR' => $payment_gateway_page_buttonbgcolor, 
						'BUTTONTXTCOLOR' => $payment_gateway_page_buttontxtcolor, 
						'FONTTYPE' => $payment_gateway_page_fonttype, 
						'LOGO' => $payment_gateway_page_logo,
						'TP' => $payment_gateway_page_template,					
						);
						
		//echo '<pre>'; print_r($params); die();
		 
		$params = array_change_key_case($params, CASE_UPPER);
		ksort($params);
		
		while(list($key, $val) = each($params)){
		 if($val){
		  $process_button_string .= tep_draw_hidden_field($key, $val);	  
		  $sha_str .= $key.'='.$val.$payment_gateway_sha_signature;
		  //$sha_str_debug .= $key.' = '.$val. ' ' . $payment_gateway_sha_signature."<br>";		    
		 }
		}

		// params that must not be used for SHAsign calculation
		$params_optional = array('txtHistoryBack' => 'false',
								 tep_session_name() => tep_session_id()
								 );
	
		$params = array_change_key_case($params_optional, CASE_UPPER);

		while(list($key, $val) = each($params_optional)){
		 if($val){
		  $process_button_string .= tep_draw_hidden_field($key, $val);
		 }
		}
		
		//echo '<div style="text-align: left; ">'.$sha_str_debug.'<br><br>';
		//echo $sha_str . '</div>';
		
		$shaSign = strtoupper(sha1($sha_str));
		$process_button_string .= tep_draw_hidden_field('SHASign', $shaSign);	  

	  return $process_button_string;
    }

	function before_process() {
      global $customer_id, $order, $order_totals, $sendto, $billto, $languages_id, $payment, $currencies, $cart, $cart_PostFinance_ID;
      global $$payment;

      $order_id = substr($cart_PostFinance_ID, strpos($cart_PostFinance_ID, '-')+1);
	  $order_status = $_GET['STATUS'];

      $check_query = tep_db_query("select orders_status from " . TABLE_ORDERS . " where orders_id = '" . (int)$order_id . "'");
      if (tep_db_num_rows($check_query)) {
        $check = tep_db_fetch_array($check_query);

        if ($check['orders_status'] == MODULE_PAYMENT_POSTFINANCE_PREPARE_ORDER_STATUS_ID) {
          $sql_data_array = array('orders_id' => $order_id,
                                  'orders_status_id' => MODULE_PAYMENT_POSTFINANCE_PREPARE_ORDER_STATUS_ID,
                                  'date_added' => 'now()',
                                  'customer_notified' => '0',
                                  'comments' => '');

          tep_db_perform(TABLE_ORDERS_STATUS_HISTORY, $sql_data_array);
        }
      }

     if ($order_status == '5' || $order_status == '9' || $order_status == '91' || $order_status == '51') {

		tep_db_query("update " . TABLE_ORDERS . " set orders_status = '" . (MODULE_PAYMENT_POSTFINANCE_ORDER_STATUS_ID > 0 ? (int)MODULE_PAYMENT_POSTFINANCE_ORDER_STATUS_ID : (int)DEFAULT_ORDERS_STATUS_ID) . "', last_modified = now() where orders_id = '" . (int)$order_id . "'");

	 }

		if ($order_status == '5') {
          $comment_status = 'PostFinance IPN Verified [Payment has been authorized]';
        } elseif ( ($order_status == '9') ) {
          $comment_status = 'PostFinance IPN Verified [Payment has been accepted]';
        }elseif ( ($order_status == '51' || $order_status == '91' ) ) {
          $comment_status = 'PostFinance IPN Verified [Payment has been pending]';
        }

		if ($order_status == "2") {
          $comment_status = 'PostFinance IPN Invalid [Declined]';
        } elseif ( $order_status == "52" || $order_status == "92" ) {
          $comment_status = 'PostFinance IPN Invalid [Exception occured]';
        } elseif ( $order_status == "1" ) {
          $comment_status = 'PostFinance IPN Invalid [Cancelled]';
        }

	  $sql_data_array = array('orders_id' => $order_id,
                              'orders_status_id' => (MODULE_PAYMENT_POSTFINANCE_ORDER_STATUS_ID > 0 ? (int)MODULE_PAYMENT_POSTFINANCE_ORDER_STATUS_ID : (int)DEFAULT_ORDERS_STATUS_ID),
                              'date_added' => 'now()',
                              'customer_notified' => (SEND_EMAILS == 'true') ? '1' : '0',
                              'comments' => $comment_status );

      tep_db_perform(TABLE_ORDERS_STATUS_HISTORY, $sql_data_array);

	  // initialized for the email confirmation

      $products_ordered = '';
      $subtotal = 0;
      $total_tax = 0;

      for ($i=0, $n=sizeof($order->products); $i<$n; $i++) {
        if (STOCK_LIMITED == 'true') {
          if (DOWNLOAD_ENABLED == 'true') {
            $stock_query_raw = "SELECT products_quantity, pad.products_attributes_filename
                                FROM " . TABLE_PRODUCTS . " p
                                LEFT JOIN " . TABLE_PRODUCTS_ATTRIBUTES . " pa
                                ON p.products_id=pa.products_id
                                LEFT JOIN " . TABLE_PRODUCTS_ATTRIBUTES_DOWNLOAD . " pad
                                ON pa.products_attributes_id=pad.products_attributes_id
                                WHERE p.products_id = '" . tep_get_prid($order->products[$i]['id']) . "'";

            $products_attributes = $order->products[$i]['attributes'];
            if (is_array($products_attributes)) {
              $stock_query_raw .= " AND pa.options_id = '" . $products_attributes[0]['option_id'] . "' AND pa.options_values_id = '" . $products_attributes[0]['value_id'] . "'";
            }
            $stock_query = tep_db_query($stock_query_raw);
          } else {
            $stock_query = tep_db_query("select products_quantity from " . TABLE_PRODUCTS . " where products_id = '" . tep_get_prid($order->products[$i]['id']) . "'");
          }
          if (tep_db_num_rows($stock_query) > 0) {
            $stock_values = tep_db_fetch_array($stock_query);

            if ((DOWNLOAD_ENABLED != 'true') || (!$stock_values['products_attributes_filename'])) {
              $stock_left = $stock_values['products_quantity'] - $order->products[$i]['qty'];
            } else {
              $stock_left = $stock_values['products_quantity'];
            }


		    if ($order_status == '5' || $order_status == '9' || $order_status == '91' || $order_status == '51') {
				tep_db_query("update " . TABLE_PRODUCTS . " set products_quantity = '" . $stock_left . "' where products_id = '" . tep_get_prid($order->products[$i]['id']) . "'");
				if ( ($stock_left < 1) && (STOCK_ALLOW_CHECKOUT == 'false') ) {
				  tep_db_query("update " . TABLE_PRODUCTS . " set products_status = '0' where products_id = '" . tep_get_prid($order->products[$i]['id']) . "'");
				}
			}

          }
        }

	    if ($order_status == '5' || $order_status == '9' || $order_status == '91' || $order_status == '51') {
		    tep_db_query("update " . TABLE_PRODUCTS . " set products_ordered = products_ordered + " . sprintf('%d', $order->products[$i]['qty']) . " where products_id = '" . tep_get_prid($order->products[$i]['id']) . "'");
		}


		//------insert customer choosen option to order--------
        $attributes_exist = '0';
        $products_ordered_attributes = '';
        if (isset($order->products[$i]['attributes'])) {
          $attributes_exist = '1';
          for ($j=0, $n2=sizeof($order->products[$i]['attributes']); $j<$n2; $j++) {
            if (DOWNLOAD_ENABLED == 'true') {
              $attributes_query = "select popt.products_options_name, poval.products_options_values_name, pa.options_values_price, pa.price_prefix, pad.products_attributes_maxdays, pad.products_attributes_maxcount , pad.products_attributes_filename
                                   from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_OPTIONS_VALUES . " poval, " . TABLE_PRODUCTS_ATTRIBUTES . " pa
                                   left join " . TABLE_PRODUCTS_ATTRIBUTES_DOWNLOAD . " pad
                                   on pa.products_attributes_id=pad.products_attributes_id
                                   where pa.products_id = '" . $order->products[$i]['id'] . "'
                                   and pa.options_id = '" . $order->products[$i]['attributes'][$j]['option_id'] . "'
                                   and pa.options_id = popt.products_options_id
                                   and pa.options_values_id = '" . $order->products[$i]['attributes'][$j]['value_id'] . "'
                                   and pa.options_values_id = poval.products_options_values_id
                                   and popt.language_id = '" . $languages_id . "'
                                   and poval.language_id = '" . $languages_id . "'";
              $attributes = tep_db_query($attributes_query);
            } else {
              $attributes = tep_db_query("select popt.products_options_name, poval.products_options_values_name, pa.options_values_price, pa.price_prefix from " . TABLE_PRODUCTS_OPTIONS . " popt, " . TABLE_PRODUCTS_OPTIONS_VALUES . " poval, " . TABLE_PRODUCTS_ATTRIBUTES . " pa where pa.products_id = '" . $order->products[$i]['id'] . "' and pa.options_id = '" . $order->products[$i]['attributes'][$j]['option_id'] . "' and pa.options_id = popt.products_options_id and pa.options_values_id = '" . $order->products[$i]['attributes'][$j]['value_id'] . "' and pa.options_values_id = poval.products_options_values_id and popt.language_id = '" . $languages_id . "' and poval.language_id = '" . $languages_id . "'");
            }
            $attributes_values = tep_db_fetch_array($attributes);

            $products_ordered_attributes .= "\n\t" . $attributes_values['products_options_name'] . ' ' . $attributes_values['products_options_values_name'];
          }
        }
		//------insert customer choosen option eof ----
        $total_weight += ($order->products[$i]['qty'] * $order->products[$i]['weight']);
        $total_tax += tep_calculate_tax($total_products_price, $products_tax) * $order->products[$i]['qty'];
        $total_cost += $total_products_price;

        $products_ordered .= $order->products[$i]['qty'] . ' x ' . $order->products[$i]['name'] . ' (' . $order->products[$i]['model'] . ') = ' . $currencies->display_price($order->products[$i]['final_price'], $order->products[$i]['tax'], $order->products[$i]['qty']) . $products_ordered_attributes . "\n";
      }

		// lets start with the email confirmation
        $email_order = STORE_NAME . "\n" .
                     EMAIL_SEPARATOR . "\n" .
                     EMAIL_TEXT_ORDER_NUMBER . ' ' . $order_id . "\n" .
                     EMAIL_TEXT_INVOICE_URL . ' ' . tep_href_link(FILENAME_ACCOUNT_HISTORY_INFO, 'order_id=' . $order_id, 'SSL', false) . "\n" .
                     EMAIL_TEXT_DATE_ORDERED . ' ' . strftime(DATE_FORMAT_LONG) . "\n\n";
      if ($order->info['comments']) {
        $email_order .= tep_db_output($order->info['comments']) . "\n\n";
      }
      $email_order .= EMAIL_TEXT_PRODUCTS . "\n" .
                      EMAIL_SEPARATOR . "\n" .
                      $products_ordered .
                      EMAIL_SEPARATOR . "\n";

      for ($i=0, $n=sizeof($order_totals); $i<$n; $i++) {
        $email_order .= strip_tags($order_totals[$i]['title']) . ' ' . strip_tags($order_totals[$i]['text']) . "\n";
      }

      if ($order->content_type != 'virtual') {
        $email_order .= "\n" . EMAIL_TEXT_DELIVERY_ADDRESS . "\n" .
                        EMAIL_SEPARATOR . "\n" .
                        tep_address_label($customer_id, $sendto, 0, '', "\n") . "\n";
      }

      $email_order .= "\n" . EMAIL_TEXT_BILLING_ADDRESS . "\n" .
                      EMAIL_SEPARATOR . "\n" .
                      tep_address_label($customer_id, $billto, 0, '', "\n") . "\n\n";
      if (is_object($$payment)) {
        $email_order .= EMAIL_TEXT_PAYMENT_METHOD . "\n" .
                        EMAIL_SEPARATOR . "\n";
        $payment_class = $$payment;
        $email_order .= $payment_class->title . "\n\n";
        if ($payment_class->email_footer) {
          $email_order .= $payment_class->email_footer . "\n\n";
        }
	  }

	if ($order_status == '5' || $order_status == '9' || $order_status == '91' || $order_status == '51') {
		  tep_mail($order->customer['firstname'] . ' ' . $order->customer['lastname'], $order->customer['email_address'], EMAIL_TEXT_SUBJECT, $email_order, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);

		  // send emails to other people
		  if (SEND_EXTRA_ORDER_EMAILS_TO != '') {
			tep_mail('', SEND_EXTRA_ORDER_EMAILS_TO, EMAIL_TEXT_SUBJECT, $email_order, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);
		  }
	}


   if ($order_status == '1' || $order_status == '2' || $order_status == '92' || $order_status == '52') {

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

		  tep_mail('', MODULE_PAYMENT_POSTFINANCE_DEBUG_EMAIL, 'Post Finance IPN Invalid Process', $email_body, STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);
		}
          tep_db_query('delete from ' . TABLE_ORDERS . ' where orders_id = "' . $order_id . '"');
		  tep_redirect(tep_href_link('checkout_payment.php'));
   }
	  // load the after_process function from the payment modules
      $this->after_process();

      $cart->reset(true);

	  // unregister session variables used during checkout
      tep_session_unregister('sendto');
      tep_session_unregister('billto');
      tep_session_unregister('shipping');
      tep_session_unregister('payment');
      tep_session_unregister('comments');
      tep_session_unregister('cart_PostFinance_ID');
      tep_redirect(tep_href_link(FILENAME_CHECKOUT_SUCCESS, '', 'SSL'));
    }

    function after_process() {
      return false;
    }

    function get_error() {
      return false;
    }

    function check() {
      if (!isset($this->_check)) {
        $check_query = tep_db_query("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = 'MODULE_PAYMENT_POSTFINANCE_STATUS'");
        $this->_check = tep_db_num_rows($check_query);
      }
      return $this->_check;
    }

    function install() {

      $check_query = tep_db_query("select orders_status_id from " . TABLE_ORDERS_STATUS . " where orders_status_name = 'Preparing [PostFinance]' limit 1");

      if (tep_db_num_rows($check_query) < 1) {
        $status_query = tep_db_query("select max(orders_status_id) as status_id from " . TABLE_ORDERS_STATUS);
        $status = tep_db_fetch_array($status_query);

        $status_id = $status['status_id']+1;

        $languages = tep_get_languages();

        foreach ($languages as $lang) {
          tep_db_query("insert into " . TABLE_ORDERS_STATUS . " (orders_status_id, language_id, orders_status_name) values ('" . $status_id . "', '" . $lang['id'] . "', 'Preparing [PostFinance]')");
        }
	  }

	 	tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('".addslashes($this->postFinanceInfo[activeModuleMainTitle])."', 'MODULE_PAYMENT_POSTFINANCE_STATUS', 'True', '".$this->postFinanceInfo[activeModuleSubTitle]."', '6', '1', 'tep_cfg_select_option(array(\'True\', \'False\'), ', now())");

		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['merchantIDMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_MERCHANT_ID', '', '".$this->postFinanceInfo['merchantIDSubTitle']."', '6', '0', now())");

		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['userIDMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_USER_ID', '', '".$this->postFinanceInfo['userIDSubTitle']."', '6', '0', now())");

		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['merchantPasswordMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_PASSWORD', '', '".$this->postFinanceInfo['merchantPasswordSubTitle']."', '6', '0', now())");
      
		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['SHAMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_SHA1_SIGNATURE', '', '".$this->postFinanceInfo['SHASubTitle']."', '6', '0', now())");

  		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['PageTitleMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_TITLE', '', '".$this->postFinanceInfo['PageTitleSubTitle']."', '6', '0', now())");
     
 		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['BgColorMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_BGCOLOR', '', '".$this->postFinanceInfo['BgColorSubTitle']."', '6', '0', now())");
     
 		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['TextColorMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_TXTCOLOR', '', '".$this->postFinanceInfo['TextColorSubTitle']."', '6', '0', now())");
    
 		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['TableBgColorMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_TBLBGCOLOR', '', '".$this->postFinanceInfo['TableBgColorSubTitle']."', '6', '0', now())");
     
 		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['TableTextColorMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_TBLTXTCOLOR', '', '".$this->postFinanceInfo['TableTextColorSubTitle']."', '6', '0', now())");

 		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['ButtonBgColorMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_BUTTONBGCOLOR', '', '".$this->postFinanceInfo['ButtonBgColorSubTitle']."', '6', '0', now())");
     
 		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['ButtonTextColorMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_BUTTONTXTCOLOR', '', '".$this->postFinanceInfo['ButtonTextColorSubTitle']."', '6', '0', now())");
    
 		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['FontFamilyMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_FONTTYPE', '', '".$this->postFinanceInfo['FontFamilySubTitle']."', '6', '0', now())");

	 	tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['acceptUrlMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_ACCEPTURL', '', '".$this->postFinanceInfo['acceptUrlSubTitle'] ."', '6', '0', now())");
     
	 	tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['declineUrlMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_DECLINEURL', '', '".$this->postFinanceInfo['declineUrlSubTitle']."', '6', '0', now())");
     
	 	tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['exceptionUrlMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_EXCEPTIONURL', '', '".$this->postFinanceInfo['exceptionUrlSubTitle']."', '6', '0', now())");

	 	tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['cancelUrlMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_CANCELURL', '', '".$this->postFinanceInfo['cancelUrlSubTitle']."', '6', '0', now())");

	 	tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['catalogUrlMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_CATALOGURL', '', '".$this->postFinanceInfo['catalogUrlSubTitle']."', '6', '0', now())");

	 	tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['homeUrlMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_HOMEURL', '', '".$this->postFinanceInfo['homeUrlSubTitle']."', '6', '0', now())");

 		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['logoMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_LOGO', '', '".$this->postFinanceInfo['logoSubTitle']."', '6', '0', now())");
     
		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo[SortMainTitle]."', 'MODULE_PAYMENT_POSTFINANCE_SORT_ORDER', '0', '".$this->postFinanceInfo[SortSubTitle]."', '6', '0', now())");
	    
		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo[defCurrMainTitle]."', 'MODULE_PAYMENT_POSTFINANCE_CURRENCY', 'CHF', '".$this->postFinanceInfo[defCurrSubTitle]."', '6', '0', now())");
		
	 	tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('".$this->postFinanceInfo[preparingMainTitle]."', 'MODULE_PAYMENT_POSTFINANCE_PREPARE_ORDER_STATUS_ID', '" . $status_id . "', '".$this->postFinanceInfo[preparingSubTitle]."', '6', '0', 'tep_cfg_pull_down_order_statuses(', 'tep_get_order_status_name', now())");

		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, use_function, date_added) values ('".$this->postFinanceInfo[statusMainTitle]."', 'MODULE_PAYMENT_POSTFINANCE_ORDER_STATUS_ID', '0', '".$this->postFinanceInfo[statusSubTitle]."', '6', '0', 'tep_cfg_pull_down_order_statuses(', 'tep_get_order_status_name', now())");
		
		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, use_function, set_function, date_added) values ('".$this->postFinanceInfo[payZoneMainTitle]."', 'MODULE_PAYMENT_POSTFINANCE_ZONE', '0', '".$this->postFinanceInfo[payZoneSubTitle]."', '6', '2', 'tep_get_zone_class_title', 'tep_cfg_pull_down_zone_classes(', now())"); 

		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, set_function, date_added) values ('".$this->postFinanceInfo[ModMainTitle]."', 'MODULE_PAYMENT_POSTFINANCE_MOD', '1', '".$this->postFinanceInfo[ModSubTitle]."', '6', '1', 'tep_cfg_select_option(array(\'1\', \'0\'), ', now())");

		tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['debugEmailMainTitle']."', 'MODULE_PAYMENT_POSTFINANCE_DEBUG_EMAIL', '', '".$this->postFinanceInfo['debugEmailDSubTitle']."', '6', '0', now())");
	
	 	tep_db_query("insert into " . TABLE_CONFIGURATION . " (configuration_title, configuration_key, configuration_value, configuration_description, configuration_group_id, sort_order, date_added) values ('".$this->postFinanceInfo['TemplateURLTitle']."', 'MODULE_PAYMENT_POSTFINANCE_TEMPLATE_URL', '', '".$this->postFinanceInfo['TemplateURLSubTitle']."', '6', '0', now())");
    }

    function remove() {
      tep_db_query("delete from " . TABLE_CONFIGURATION . " where locate('MODULE_PAYMENT_POSTFINANCE',configuration_key)");
    }

    function keys() {
	     $keys	= array('MODULE_PAYMENT_POSTFINANCE_STATUS','MODULE_PAYMENT_POSTFINANCE_MERCHANT_ID','MODULE_PAYMENT_POSTFINANCE_USER_ID',
						'MODULE_PAYMENT_POSTFINANCE_PASSWORD','MODULE_PAYMENT_POSTFINANCE_SHA1_SIGNATURE', 
						'MODULE_PAYMENT_POSTFINANCE_CURRENCY','MODULE_PAYMENT_POSTFINANCE_PREPARE_ORDER_STATUS_ID', 'MODULE_PAYMENT_POSTFINANCE_ORDER_STATUS_ID', 'MODULE_PAYMENT_POSTFINANCE_SORT_ORDER', 
						'MODULE_PAYMENT_POSTFINANCE_TITLE','MODULE_PAYMENT_POSTFINANCE_BGCOLOR','MODULE_PAYMENT_POSTFINANCE_TXTCOLOR',
						'MODULE_PAYMENT_POSTFINANCE_TBLBGCOLOR','MODULE_PAYMENT_POSTFINANCE_TBLTXTCOLOR','MODULE_PAYMENT_POSTFINANCE_BUTTONBGCOLOR',
						'MODULE_PAYMENT_POSTFINANCE_BUTTONTXTCOLOR','MODULE_PAYMENT_POSTFINANCE_FONTTYPE','MODULE_PAYMENT_POSTFINANCE_LOGO',
						'MODULE_PAYMENT_POSTFINANCE_ACCEPTURL','MODULE_PAYMENT_POSTFINANCE_DECLINEURL','MODULE_PAYMENT_POSTFINANCE_EXCEPTIONURL',
						'MODULE_PAYMENT_POSTFINANCE_CANCELURL','MODULE_PAYMENT_POSTFINANCE_CATALOGURL','MODULE_PAYMENT_POSTFINANCE_HOMEURL',
						'MODULE_PAYMENT_POSTFINANCE_TEMPLATE_URL','MODULE_PAYMENT_POSTFINANCE_ZONE','MODULE_PAYMENT_POSTFINANCE_DEBUG_EMAIL');

		$keys[]	= 'MODULE_PAYMENT_POSTFINANCE_MOD'; 
		return $keys;
    }
  }
?>
