<?php

require_once('paynl/paynl.php');

class paynl_yourgift extends paynl
{
  function paynl_yourgift()
  {
    parent::__construct(
        'paynl yourgift signature', 
        '2.0',
        'paynl_yourgift',
        1645,
        'YOURGIFT' , 
        MODULE_PAYMENT_PAYNL_YOURGIFT_TEXT_TITLE,
        MODULE_PAYMENT_PAYNL_YOURGIFT_TEXT_PUBLIC_TITLE,
        MODULE_PAYMENT_PAYNL_YOURGIFT_TEXT_DESCRIPTION,
        defined('MODULE_PAYMENT_PAYNL_YOURGIFT_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_YOURGIFT_SORT_ORDER : 0,
        defined('MODULE_PAYMENT_PAYNL_YOURGIFT_STATUS') && (MODULE_PAYMENT_PAYNL_YOURGIFT_STATUS == 'True') ? true : false, 
        defined('MODULE_PAYMENT_PAYNL_WEBSHOPGIFTCARD_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_YOURGIFT_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_YOURGIFT_ORDER_STATUS_ID : 0,
        'MODULE_PAYMENT_PAYNL_YOURGIFT_STATUS'
    );



    
  }//end constructor
  
  
}