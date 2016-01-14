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

class paynl_mistercash extends paynl
{
  function paynl_mistercash()
  {
    parent::__construct(
        'paynl mistercash signature', 
        '2.0',
        'paynl_mistercash',
        436,
        'MISTERCASH' , 
        MODULE_PAYMENT_PAYNL_MISTERCASH_TEXT_TITLE,
        MODULE_PAYMENT_PAYNL_MISTERCASH_TEXT_PUBLIC_TITLE,
        MODULE_PAYMENT_PAYNL_MISTERCASH_TEXT_DESCRIPTION,
        defined('MODULE_PAYMENT_PAYNL_MISTERCASH_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_MISTERCASH_SORT_ORDER : 0,
        defined('MODULE_PAYMENT_PAYNL_MISTERCASH_STATUS') && (MODULE_PAYMENT_PAYNL_MISTERCASH_STATUS == 'True') ? true : false, 
        defined('MODULE_PAYMENT_PAYNL_MISTERCASH_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_MISTERCASH_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_MISTERCASH_ORDER_STATUS_ID : 0,
        'MODULE_PAYMENT_PAYNL_MISTERCASH_STATUS'
    );



    
  }//end constructor
  
  
}