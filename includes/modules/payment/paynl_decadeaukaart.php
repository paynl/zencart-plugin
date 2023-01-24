<?php
require_once('paynl/paynl.php');

class paynl_decadeaukaart extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl de cadeaukaart signature',
            '2.0',
            'paynl_decadeaukaart',
            2601,
            'DECADEAUKAART',
            MODULE_PAYMENT_PAYNL_DECADEAUKAART_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_DECADEAUKAART_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_DECADEAUKAART_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_DECADEAUKAART_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_DECADEAUKAART_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_DECADEAUKAART_STATUS') && (MODULE_PAYMENT_PAYNL_DECADEAUKAART_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_DECADEAUKAART_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_DECADEAUKAART_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_DECADEAUKAART_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_DECADEAUKAART_STATUS'
        );
    }
}