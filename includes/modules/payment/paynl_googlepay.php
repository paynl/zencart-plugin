<?php
require_once('paynl/paynl.php');

class paynl_googlepay extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl google pay signature',
            '2.0',
            'paynl_googlepay',
            2558,
            'GOOGLEPAY',
            MODULE_PAYMENT_PAYNL_GOOGLEPAY_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_GOOGLEPAY_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_GOOGLEPAY_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_GOOGLEPAY_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_GOOGLEPAY_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_GOOGLEPAY_STATUS') && (MODULE_PAYMENT_PAYNL_GOOGLEPAY_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_GOOGLEPAY_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_GOOGLEPAY_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_GOOGLEPAY_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_GOOGLEPAY_STATUS'
        );
    }
}