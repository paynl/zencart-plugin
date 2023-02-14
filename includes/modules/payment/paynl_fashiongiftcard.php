<?php
require_once('paynl/paynl.php');

class paynl_fashiongiftcard extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl fashion giftcard signature',
            '2.0',
            'paynl_fashiongiftcard',
            1669,
            'FASHIONGIFTCARD',
            MODULE_PAYMENT_PAYNL_FASHIONGIFTCARD_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_FASHIONGIFTCARD_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_FASHIONGIFTCARD_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_FASHIONGIFTCARD_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_FASHIONGIFTCARD_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_FASHIONGIFTCARD_STATUS') && (MODULE_PAYMENT_PAYNL_FASHIONGIFTCARD_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_FASHIONGIFTCARD_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_FASHIONGIFTCARD_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_FASHIONGIFTCARD_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_FASHIONGIFTCARD_STATUS'
        );
    }
}