<?php
require_once('paynl/paynl.php');

class paynl_good4fun extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl good4fun signature',
            '2.0',
            'paynl_good4fun',
            2628,
            'GOOD4FUN',
            MODULE_PAYMENT_PAYNL_GOOD4FUN_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_GOOD4FUN_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_GOOD4FUN_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_GOOD4FUN_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_GOOD4FUN_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_GOOD4FUN_STATUS') && (MODULE_PAYMENT_PAYNL_GOOD4FUN_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_GOOD4FUN_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_GOOD4FUN_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_GOOD4FUN_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_GOOD4FUN_STATUS'
        );
    }
}