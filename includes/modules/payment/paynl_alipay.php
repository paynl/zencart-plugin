<?php
require_once('paynl/paynl.php');

class paynl_alipay extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl alipay signature',
            '2.0',
            'paynl_alipay',
            2080,
            'ALIPAY',
            MODULE_PAYMENT_PAYNL_ALIPAY_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_ALIPAY_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_ALIPAY_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_ALIPAY_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_ALIPAY_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_ALIPAY_STATUS') && (MODULE_PAYMENT_PAYNL_ALIPAY_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_ALIPAY_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_ALIPAY_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_ALIPAY_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_ALIPAY_STATUS'
        );
    }
}