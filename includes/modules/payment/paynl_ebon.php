<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of paynl_ideal
 *
 * @author gaetan
 */
require_once('paynl/paynl.php');

class paynl_ebon extends paynl
{
  function paynl_ebon()
  {
    parent::__construct(
        'paynl ebon signature', 
        '2.0',
        'paynl_ebon',
        998,
        'EBON' , 
        MODULE_PAYMENT_PAYNL_EBON_TEXT_TITLE,
        MODULE_PAYMENT_PAYNL_EBON_TEXT_PUBLIC_TITLE,
        MODULE_PAYMENT_PAYNL_EBON_TEXT_DESCRIPTION,
        defined('MODULE_PAYMENT_PAYNL_EBON_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_EBON_SORT_ORDER : 0,
        defined('MODULE_PAYMENT_PAYNL_EBON_STATUS') && (MODULE_PAYMENT_PAYNL_EBON_STATUS == 'True') ? true : false, 
        defined('MODULE_PAYMENT_PAYNL_EBON_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_EBON_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_EBON_ORDER_STATUS_ID : 0,
        'MODULE_PAYMENT_PAYNL_EBON_STATUS'
    );



    
  }//end constructor
  
  
}