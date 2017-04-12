<?php
require_once('paynl/paynl.php');

class paynl_clickandbuy extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl clickandbuy signature',
            '2.0',
            'paynl_clickandbuy',
            139,
            'CLICKANDBUY',
            MODULE_PAYMENT_PAYNL_CLICKANDBUY_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_CLICKANDBUY_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_CLICKANDBUY_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_CLICKANDBUY_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_CLICKANDBUY_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_CLICKANDBUY_STATUS') && (MODULE_PAYMENT_PAYNL_CLICKANDBUY_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_CLICKANDBUY_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_CLICKANDBUY_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_CLICKANDBUY_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_CLICKANDBUY_STATUS'
        );
    }
}