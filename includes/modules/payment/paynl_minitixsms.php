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

class paynl_minitixsms extends paynl
{
  function paynl_minitixsms()
  {
    parent::__construct(
        'paynl minitixsms signature', 
        '2.0',
        'paynl_minitixsms',
        808,
        'MINITIXSMS' , 
        MODULE_PAYMENT_PAYNL_MINITIXSMS_TEXT_TITLE,
        MODULE_PAYMENT_PAYNL_MINITIXSMS_TEXT_PUBLIC_TITLE,
        MODULE_PAYMENT_PAYNL_MINITIXSMS_TEXT_DESCRIPTION,
        defined('MODULE_PAYMENT_PAYNL_MINITIXSMS_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_MINITIXSMS_SORT_ORDER : 0,
        defined('MODULE_PAYMENT_PAYNL_MINITIXSMS_STATUS') && (MODULE_PAYMENT_PAYNL_MINITIXSMS_STATUS == 'True') ? true : false, 
        defined('MODULE_PAYMENT_PAYNL_MINITIXSMS_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_MINITIXSMS_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_MINITIXSMS_ORDER_STATUS_ID : 0,
        'MODULE_PAYMENT_PAYNL_MINITIXSMS_STATUS'
    );



    
  }//end constructor
  
  
}