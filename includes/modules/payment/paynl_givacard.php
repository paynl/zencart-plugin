<?php
require_once('paynl/paynl.php');

class paynl_givacard extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl givacard signature',
            '2.0',
            'paynl_givacard',
            1657,
            'GIVACARD',
            MODULE_PAYMENT_PAYNL_GIVACARD_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_GIVACARD_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_GIVACARD_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_GIVACARD_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_GIVACARD_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_GIVACARD_STATUS') && (MODULE_PAYMENT_PAYNL_GIVACARD_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_GIVACARD_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_GIVACARD_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_GIVACARD_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_GIVACARD_STATUS'
        );
    }
}