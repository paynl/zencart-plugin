<?php
require_once('paynl/paynl.php');

class paynl_klarna extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl klarna signature',
            '2.0',
            'paynl_klarna',
            1717,
            'KLARNA',
            MODULE_PAYMENT_PAYNL_KLARNA_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_KLARNA_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_KLARNA_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_KLARNA_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_KLARNA_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_KLARNA_STATUS') && (MODULE_PAYMENT_PAYNL_KLARNA_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_KLARNA_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_KLARNA_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_KLARNA_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_KLARNA_STATUS'
        );
    }
}