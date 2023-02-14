<?php
require_once('paynl/paynl.php');

class paynl_wechatpay extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl wechat pay signature',
            '2.0',
            'paynl_wechatpay',
            1978,
            'WECHATPAY',
            MODULE_PAYMENT_PAYNL_WECHATPAY_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_WECHATPAY_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_WECHATPAY_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_WECHATPAY_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_WECHATPAY_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_WECHATPAY_STATUS') && (MODULE_PAYMENT_PAYNL_WECHATPAY_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_WECHATPAY_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_WECHATPAY_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_WECHATPAY_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_WECHATPAY_STATUS'
        );
    }
}