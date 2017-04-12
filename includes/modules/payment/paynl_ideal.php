<?php
require_once('paynl/paynl.php');

class paynl_ideal extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl ideal signature',
            '2.0',
            'paynl_ideal',
            10,
            'IDEAL',
            MODULE_PAYMENT_PAYNL_IDEAL_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_IDEAL_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_IDEAL_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_IDEAL_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_IDEAL_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_IDEAL_STATUS') && (MODULE_PAYMENT_PAYNL_IDEAL_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_IDEAL_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_IDEAL_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_IDEAL_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_IDEAL_STATUS'
        );
    }
}