<?php
require_once('paynl/paynl.php');

class paynl_capayable extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl capayable signature',
            '2.0',
            'paynl_capayable',
            1744,
            'CAPAYABLE',
            MODULE_PAYMENT_PAYNL_CAPAYABLE_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_CAPAYABLE_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_CAPAYABLE_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_CAPAYABLE_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_CAPAYABLE_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_CAPAYABLE_STATUS') && (MODULE_PAYMENT_PAYNL_CAPAYABLE_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_CAPAYABLE_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_CAPAYABLE_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_CAPAYABLE_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_CAPAYABLE_STATUS'
        );
    }
}