<?php
require_once('paynl/paynl.php');

class paynl_amazonpay extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl amazonpay signature',
            '2.0',
            'paynl_amazonpay',
            1903,
            'AMAZONPAY',
            MODULE_PAYMENT_PAYNL_AMAZONPAY_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_AMAZONPAY_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_AMAZONPAY_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_AMAZONPAY_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_AMAZONPAY_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_AMAZONPAY_STATUS') && (MODULE_PAYMENT_PAYNL_AMAZONPAY_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_AMAZONPAY_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_AMAZONPAY_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_AMAZONPAY_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_AMAZONPAY_STATUS'
        );
    }
}