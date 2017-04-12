<?php
require_once('paynl/paynl.php');

class paynl_overboeking extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl overboeking signature',
            '2.0',
            'paynl_overboeking',
            136,
            'OVERBOEKING',
            MODULE_PAYMENT_PAYNL_OVERBOEKING_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_OVERBOEKING_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_OVERBOEKING_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_OVERBOEKING_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_OVERBOEKING_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_OVERBOEKING_STATUS') && (MODULE_PAYMENT_PAYNL_OVERBOEKING_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_OVERBOEKING_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_OVERBOEKING_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_OVERBOEKING_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_OVERBOEKING_STATUS'
        );
    }
}