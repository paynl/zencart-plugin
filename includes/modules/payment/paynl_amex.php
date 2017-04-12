<?php
require_once('paynl/paynl.php');

class paynl_amex extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl amex signature',
            '2.0',
            'paynl_amex',
            1705,
            'AMEX',
            MODULE_PAYMENT_PAYNL_AMEX_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_AMEX_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_AMEX_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_AMEX_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_AMEX_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_AMEX_STATUS') && (MODULE_PAYMENT_PAYNL_AMEX_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_AMEX_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_AMEX_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_AMEX_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_AMEX_STATUS'
        );
    }
}