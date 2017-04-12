<?php
require_once('paynl/paynl.php');

class paynl_bitcoin extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl bitcoin signature',
            '2.0',
            'paynl_bitcoin',
            1594,
            'BITCOIN',
            MODULE_PAYMENT_PAYNL_BITCOIN_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_BITCOIN_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_BITCOIN_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_BITCOIN_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_BITCOIN_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_BITCOIN_STATUS') && (MODULE_PAYMENT_PAYNL_BITCOIN_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_BITCOIN_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_BITCOIN_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_BITCOIN_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_BITCOIN_STATUS'
        );
    }
}