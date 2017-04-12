<?php
require_once('paynl/paynl.php');

class paynl_postepay extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl postepay signature',
            '2.0',
            'paynl_postepay',
            707,
            'POSTEPAY',
            MODULE_PAYMENT_PAYNL_POSTEPAY_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_POSTEPAY_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_POSTEPAY_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_POSTEPAY_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_POSTEPAY_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_POSTEPAY_STATUS') && (MODULE_PAYMENT_PAYNL_POSTEPAY_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_POSTEPAY_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_POSTEPAY_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_POSTEPAY_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_POSTEPAY_STATUS'
        );
    }
}