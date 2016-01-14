<?php
define('__ROOT__', dirname(dirname(__FILE__)));
require_once(__ROOT__ . '/paynl/Pay/Autoload.php');

class paynl
{
  var $code, $title, $description, $enabled;
  
  public $apiVersion = '2.0';
  

  function paynl($signature, $apiVersion, $code, $payment_method_id,$payment_method_description, $title, $public_title, $description, $sort_order, $enabled, $order_status, $configuration_key)
  {
    global $order;
    
    $this->signature = $signature;
    $this->api_version = $apiVersion;

    $this->code = $code;
    $this->title = $title;
    $this->public_title = $public_title;
    $this->description = $description;
    $this->sort_order = $sort_order;
    $this->enabled = $enabled;
    $this->order_status = $order_status;
    $this->configuration_key = $configuration_key;
    $this->payment_method_id = $payment_method_id;
    $this->payment_method_description = $payment_method_description;
    
    


    if($this->enabled === true)
    {
      if(!zen_not_null(constant('MODULE_PAYMENT_PAYNL_' . $this->payment_method_description . '_SERVICE_ID')) || !zen_not_null(constant('MODULE_PAYMENT_PAYNL_' . $this->payment_method_description . '_API_TOKEN')))
      {
        $this->description = '<div class="secWarning">' . MODULE_PAYMENT_PAYNL_ERROR_ADMIN_CONFIGURATION . '</div>' . $this->description;

        $this->enabled = false;
      }
    }

    if($this->enabled === true)
    {
      if(isset($order) && is_object($order))
      {
         $this->update_status();
      }
    }
    


  }

  function check()
  {
    global $db;
    if(!isset($this->_check))
    {
      $check_query = $db->Execute("select configuration_value from " . TABLE_CONFIGURATION . " where configuration_key = '" . $this->configuration_key . "'");
      $this->_check = $check_query->RecordCount();
    }
    return $this->_check;
  }

  function update_status()
  {
    global $order, $db;

    if(($this->enabled == true) && ((int)constant('MODULE_PAYMENT_PAYNL_'.$this->payment_method_description.'_ZONE') > 0))
    {
      $check_flag = false;
      $check_query = $db->Execute("select zone_id from " .
          TABLE_ZONES_TO_GEO_ZONES . 
          " where geo_zone_id = '" . 
          constant('MODULE_PAYMENT_PAYNL_' . $this->payment_method_description . '_ZONE') . 
          "' and zone_country_id = '" . 
          $order->billing['country']['id'] . 
          "' order by zone_id");
      while( ! $check_query->EOF)
      {
        if($check_query->fields['zone_id'] < 1)
        {
          $check_flag = true;
          break;
        }
        elseif($check_query->fields['zone_id'] == $order->billing['zone_id'])
        {
          $check_flag = true;
          break;
        }
        $check_query->MoveNext();
      }

      if($check_flag == false)
      {
        $this->enabled = false;
      }
    }
  }

  function javascript_validation()
  {
    return false;
  }

  function selection()
  {
    return array('id' => $this->code,
      'module' => '<img src="https://admin.pay.nl/images/payment_profiles/'. $this->payment_method_id .'.gif"> '
                         . $this->public_title
    );
  }

  function pre_confirmation_check()
  {
    return false;
    /*
    // If no issuer is selected, return to payment method selection
    if(!isset($_POST['issuerID']) || ($_POST['issuerID'] < 0))
    {
      $messageStack->add_session('checkout_payment',MODULE_PAYMENT_IDEALV3_ERROR_TEXT_NO_ISSUER_SELECTED);
      zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, '', 'SSL', true, false));
    }*/
  }
  
   /*
   * Any checks or processing on the order information before proceeding to
   * payment confirmation
   */
  function confirmation()
  {
    return false;
    //$this->addSurcharge();
  }

  function process_button()
  {
    return false;  
  }

  function before_process()
  {
    return false;  
  }

  function after_process()
  {
    global $customer_id, $order, $insert_id;
    $paynlService = new Pay_Api_Start();
    $paynlService->setAmount(intval($this->format_raw($order->info['total']) * 100));
    $paynlService->setApiToken(constant('MODULE_PAYMENT_PAYNL_' . $this->payment_method_description . '_API_TOKEN'));
    $paynlService->setServiceId(constant('MODULE_PAYMENT_PAYNL_' . $this->payment_method_description . '_SERVICE_ID'));
    $paynlService->setCurrency(DEFAULT_CURRENCY);
    $paynlService->setPaymentOptionId($this->payment_method_id);
    $paynlService->setExchangeUrl($this->generateReturnURL('ext/modules/payment/paynl/paynl_exchange.php?method=' . $this->payment_method_description));
    $paynlService->setFinishUrl($this->generateReturnURL('ext/modules/payment/paynl/paynl_exchange.php?method=' . $this->payment_method_description));
    $paynlService->setDescription('Order ' . $insert_id);
    $paynlService->setExtra1($insert_id);
    $paynlService->setExtra2($customer_id);


    $b_address = $this->splitAddress(trim($order->billing['street_address']));
    $d_address = $this->splitAddress(trim($order->delivery['street_address']));

    $paynlService->setEnduser(
        array('language' => strtoupper($_SESSION['languages_code']),
          'initials' => substr($order->delivery['firstname'], 0, 1),
          'lastName' => substr($order->delivery['lastname'], 0, 50),
          'phoneNumber' => $order->customer['telephone'],
          'emailAddress' => $order->customer['email_address'],
          'address' => array('streetName' => $d_address[0],
            'streetNumber' => substr($d_address[1], 0, 4),
            'zipCode' => $order->delivery['postcode'],
            'city' => $order->delivery['city'],
            'countryCode' => $order->delivery['country']['iso_code_2']),
          'invoiceAddress' => array('initials' => substr($order->billing['firstname'], 0, 1),
            'lastname' => substr($order->billing['lastname'], 0, 50),
            'streetName' => $d_address[0],
            'streetNumber' => substr($d_address[1], 0, 4),
            'zipCode' => $order->billing['postcode'],
            'city' => $order->billing['city'],
            'countryCode' => $order->billing['country']['iso_code_2']))
    );
    
    //add products
    foreach($order->products as $product)
    {
      list($productId) = explode(':', $product['id']);
      $paynlService->addProduct(
          $productId, 
          $product['name'], 
          $product['final_price'] * 100, 
          $product['qty']
      );
    }
    
    
    //add ship cost
    $paynlService->addProduct('shipcost', $order->info['shipping_method'],$order->info['shipping_cost'] *100 , 1);
    
    //add taxes
    $countTaxes = 1;
    foreach($order->info['tax_groups'] as $tax_name => $tax_cost){
      if($tax_cost > 0)
        $paynlService->addProduct($countTaxes, $tax_name, $tax_cost *100, 1);
      $countTaxes++;
    }
    
    //add coupon
    // no information in $order about the discount amount! 
    
    try
    {
      $result = $paynlService->doRequest();
      $url = $result['transaction']['paymentURL'];
      $this->insertPaynlTransaction($result['transaction']['transactionId'], $this->payment_method_id, intval($this->format_raw($order->info['total'])) * 100, $insert_id);

      zen_redirect($url);
    }
    catch(Exception $error)
    {
      
      zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, 'payment_error=' . $this->code . '&error=paynl&paynlErrorMessage='.  urlencode($error->getMessage())  , 'SSL'));
    }

  }
  
  /*
   * Used to display error message details
   */
  function get_error()
  {
    global $HTTP_GET_VARS;

    $error_message = constant('MODULE_PAYMENT_PAYNL_'.$this->payment_method_description .'_ERROR_GENERAL');

    switch($HTTP_GET_VARS['error'])
    {
      case 'verification':
        $error_message = constant('MODULE_PAYMENT_PAYNL_'.$this->payment_method_description .'_ERROR_VERIFICATION');
        break;

      case 'declined':
        $error_message = constant('MODULE_PAYMENT_PAYNL_'.$this->payment_method_description .'_ERROR_DECLINED');
        break;
      
      case 'paynl':
        $error_message = htmlentities(urldecode($_REQUEST['paynlErrorMessage']));
        break;

      default:
        $error_message = constant('MODULE_PAYMENT_' . $this->payment_method_description . '_ERROR_GENERAL');
        break;
    }

    

    $error = array('title' => constant('MODULE_PAYMENT_PAYNL_'.$this->payment_method_description .'_ERROR_TITLE'),
      'error' => $error_message);

    return $error;
  }

  function install($parameter = null)
  {
    global $db;
    $sql = "CREATE TABLE IF NOT EXISTS paynl_transaction (" .
        "`id` int(11) NOT NULL AUTO_INCREMENT," .
        "`transaction_id` varchar(50) NOT NULL," .
        "`option_id` int(11) NOT NULL," .
        "`amount` int(11) NOT NULL," .
        "`order_id` int(11) NOT NULL," .
        "`status` varchar(10) NOT NULL DEFAULT 'PENDING'," .
        "`created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP," .
        "`last_update` timestamp ," .
        "`start_data` timestamp," .
        "PRIMARY KEY (`id`)" .
        ") ENGINE=myisam AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;";

    $db->Execute($sql);



    $params = $this->getParams();

    if(isset($parameter))
    {
      if(isset($params[$parameter]))
      {
        $params = array($parameter => $params[$parameter]);
      }
      else
      {
        $params = array();
      }
    }

    foreach($params as $key => $data)
    {
      $sql_data_array = array('configuration_title' => $data['title'],
        'configuration_key' => $key,
        'configuration_value' => (isset($data['value']) ? $data['value'] : ''),
        'configuration_description' => $data['desc'],
        'configuration_group_id' => '6',
        'sort_order' => '0',
        'date_added' => 'now()');

      if(isset($data['set_func']))
      {
        $sql_data_array['set_function'] = $data['set_func'];
      }

      if(isset($data['use_func']))
      {
        $sql_data_array['use_function'] = $data['use_func'];
      }

      zen_db_perform(TABLE_CONFIGURATION, $sql_data_array);
    }
  }

  function remove()
  {
    global $db;
    $db->Execute("delete from " . TABLE_CONFIGURATION . " where configuration_key in ('" . implode("', '", $this->keys()) . "')");
  }

  function keys()
  {
    $keys = array_keys($this->getParams());

    if($this->check())
    {
      foreach($keys as $key)
      {
        if(!defined($key))
        {
          $this->install($key);
        }
      }
    }

    return $keys;
  }

  function getParams()
  {
    global $db;
    if(!defined('MODULE_PAYMENT_PAYNL_' . $this->payment_method_description . '_TRANSACTION_ORDER_STATUS_ID'))
    {
      $check_query = $db->Execute("select orders_status_id from " . TABLE_ORDERS_STATUS . " where orders_status_name = 'Pay.nl [PAID]' limit 1");

      if($check_query->RecordCount() < 1)
      {
        $status_query = $db->Execute("select max(orders_status_id) as status_id from " . TABLE_ORDERS_STATUS);
        $status = $status_query->fields;

        $status_id = $status['status_id'] + 1;

        $languages = zen_get_languages();

        foreach($languages as $lang)
        {
          $db->Execute("insert into " . TABLE_ORDERS_STATUS . " (orders_status_id, language_id, orders_status_name) values ('" . $status_id . "', '" . $lang['id'] . "', 'Pay.nl [PAID]')");
        }

        $flags_query = $db->Execute("describe " . TABLE_ORDERS_STATUS . " public_flag");
        if($flags_query->RecordCount() == 1)
        {
          $db->Execute("update " . TABLE_ORDERS_STATUS . " set public_flag = 0 and downloads_flag = 0 where orders_status_id = '" . $status_id . "'");
        }
      }
      else
      {
        $check = $status_query->fields;

        $status_id = $check['orders_status_id'];
      }
    }
    else
    {
      $status_id = constant('MODULE_PAYMENT_PAYNL_' . $this->payment_method_description . '_TRANSACTION_ORDER_STATUS_ID');
    }

    $params = array('MODULE_PAYMENT_PAYNL_' . $this->payment_method_description . '_STATUS' => array('title' => 'Enable Pay.nl Server Integration Method',
        'desc' => 'Do you want to accept Pay.nl Server Integration Method payments?',
        'value' => 'True',
        'set_func' => 'zen_cfg_select_option(array(\'True\', \'False\'), '),
      'MODULE_PAYMENT_PAYNL_' . $this->payment_method_description . '_SERVICE_ID' => array('title' => 'Service ID',
        'desc' => 'The Service ID used for the pay.nl service'),
      'MODULE_PAYMENT_PAYNL_' . $this->payment_method_description . '_API_TOKEN' => array('title' => 'API Token ',
        'desc' => 'The API Token used for the pay.nl service'),
      'MODULE_PAYMENT_PAYNL_' . $this->payment_method_description . '_ORDER_STATUS_ID' => array('title' => 'Set Pending Status',
        'desc' => 'Set the status of pending orders made with this payment module to this value',
        'value' => '0',
        'use_func' => 'zen_get_order_status_name',
        'set_func' => 'zen_cfg_pull_down_order_statuses('),
//      'MODULE_PAYMENT_PAYNL_' . $this->payment_method_description . '_REVIEW_ORDER_STATUS_ID' => array('title' => 'Review Order Status',
//        'desc' => 'Set the status of orders flagged as being under review to this value',
//        'value' => '0',
//        'use_func' => 'zen_get_order_status_name',
//        'set_func' => 'zen_cfg_pull_down_order_statuses('),
      'MODULE_PAYMENT_PAYNL_' . $this->payment_method_description . '_TRANSACTION_ORDER_STATUS_ID' => array('title' => 'Paid Order Status',
        'desc' => 'Include paid transaction information in this order status level',
        'value' => $status_id,
        'use_func' => 'zen_get_order_status_name',
        'set_func' => 'zen_cfg_pull_down_order_statuses('),
      'MODULE_PAYMENT_PAYNL_' . $this->payment_method_description . '_ZONE' => array('title' => 'Payment Zone',
        'desc' => 'If a zone is selected, only enable this payment method for that zone.',
        'value' => '0',
        'set_func' => 'zen_cfg_pull_down_zone_classes(',
        'use_func' => 'zen_get_zone_class_title'),
      'MODULE_PAYMENT_PAYNL_' . $this->payment_method_description . '_DEBUG_EMAIL' => array('title' => 'Debug E-Mail Address',
        'desc' => 'All parameters of an invalid transaction will be sent to this email address.'),
      'MODULE_PAYMENT_PAYNL_' . $this->payment_method_description . '_SORT_ORDER' => array('title' => 'Sort order of display.',
        'desc' => 'Sort order of display. Lowest is displayed first.',
        'value' => '0'));

    return $params;
  }

    /*
   * Helper function to generate urls
   */
  protected function generateReturnURL($page, $parameters)
  {
    global $request_type;
    $strLink = '';

    $strLink = HTTP_SERVER . DIR_WS_CATALOG;
    if(ENABLE_SSL == 'true' && $request_type == 'SSL') $strLink = HTTPS_SERVER . DIR_WS_HTTPS_CATALOG;

    if(zen_not_null($parameters))
    {
      $strLink .= $page . "?" . $parameters;
    }
    else
    {
      $strLink .= $page;
    }

    return $strLink;
  }
  
// format prices without currency formatting
  function format_raw($number, $currency_code = '', $currency_value = '')
  {
    global $currencies;
    
    if(!isset($currency_code) || empty($currency_code))
    {
      $currency_code = DEFAULT_CURRENCY;
    }

    if(empty($currency_value) || !is_numeric($currency_value))
    {
      $currency_value = $currencies->currencies[$currency_code]['value'];
    }

    $decimal_places = $currencies->currencies[$currency_code]['decimal_places'];
    return number_format(zen_round($number * $currency_value, $decimal_places), $decimal_places, '.', '');
  }

  function splitAddress($strAddress)
  {
    $strAddress = trim($strAddress);
    $a = preg_split('/([0-9]+)/', $strAddress, 2, PREG_SPLIT_DELIM_CAPTURE);
    $strStreetName = trim(array_shift($a));
    $strStreetNumber = trim(implode('', $a));

    if(empty($strStreetName))
    { // American address notation
      $a = preg_split('/([a-zA-Z]{2,})/', $strAddress, 2, PREG_SPLIT_DELIM_CAPTURE);

      $strStreetNumber = trim(implode('', $a));
      $strStreetName = trim(array_shift($a));
    }

    return array($strStreetName, $strStreetNumber);
  }

  function sendDebugEmail($response = array())
  {
    global $HTTP_POST_VARS, $HTTP_GET_VARS;

    if(zen_not_null(constant('MODULE_PAYMENT_' . $this->payment_method_description . '_DEBUG_EMAIL')))
    {
      $email_body = '';

      if(!empty($response))
      {
        $email_body .= 'RESPONSE:' . "\n\n" . print_r($response, true) . "\n\n";
      }

      if(!empty($HTTP_POST_VARS))
      {
        $email_body .= '$HTTP_POST_VARS:' . "\n\n" . print_r($HTTP_POST_VARS, true) . "\n\n";
      }

      if(!empty($HTTP_GET_VARS))
      {
        $email_body .= '$HTTP_GET_VARS:' . "\n\n" . print_r($HTTP_GET_VARS, true) . "\n\n";
      }

      if(!empty($email_body))
      {
        zen_mail('', constant('MODULE_PAYMENT_PAYNL_' . $this->payment_method_description . '_DEBUG_EMAIL'), 'Pay.nl ' . $this->payment_method_description . ' Debug E-Mail', trim($email_body), STORE_OWNER, STORE_OWNER_EMAIL_ADDRESS);
      }
    }
  }

  function insertPaynlTransaction($transactionId, $option_id, $amount, $orderId)
  {
    global $db;
    $db->Execute("insert into paynl_transaction (transaction_id, option_id, amount, order_id, start_data) values ('" . $transactionId . "','" . $option_id . "','" . $amount . "','" . $orderId . "','" . date('Y-m-d H:i:s') . "')");
  }
}
//payment method id

?>
