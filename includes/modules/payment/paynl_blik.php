<?php
require_once('paynl/paynl.php');

class paynl_blik extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl blik signature',
            '2.0',
            'paynl_blik',
            2856,
            'BLIK',
            MODULE_PAYMENT_PAYNL_BLIK_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_BLIK_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_BLIK_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_BLIK_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_BLIK_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_BLIK_STATUS') && (MODULE_PAYMENT_PAYNL_BLIK_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_BLIK_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_BLIK_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_BLIK_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_BLIK_STATUS'
        );
    }
}