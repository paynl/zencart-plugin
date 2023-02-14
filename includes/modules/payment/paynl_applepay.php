<?php
require_once('paynl/paynl.php');

class paynl_applepay extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl applepay signature',
            '2.0',
            'paynl_applepay',
            2277,
            'APPLEPAY',
            MODULE_PAYMENT_PAYNL_APPLEPAY_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_APPLEPAY_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_APPLEPAY_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_APPLEPAY_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_APPLEPAY_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_APPLEPAY_STATUS') && (MODULE_PAYMENT_PAYNL_APPLEPAY_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_APPLEPAY_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_APPLEPAY_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_APPLEPAY_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_APPLEPAY_STATUS'
        );
    }
}