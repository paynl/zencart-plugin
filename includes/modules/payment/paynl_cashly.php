<?php
require_once('paynl/paynl.php');

class paynl_cashly extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl cashly signature',
            '2.0',
            'paynl_cashly',
            1981,
            'CASHLY',
            MODULE_PAYMENT_PAYNL_CASHLY_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_CASHLY_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_CASHLY_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_CASHLY_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_CASHLY_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_CASHLY_STATUS') && (MODULE_PAYMENT_PAYNL_CASHLY_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_CASHLY_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_CASHLY_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_CASHLY_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_CASHLY_STATUS'
        );
    }
}