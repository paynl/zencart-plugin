<?php
require_once('paynl/paynl.php');

class paynl_payconic extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl payconic signature',
            '2.0',
            'paynl_payconic',
            2379,
            'PAYCONIC',
            MODULE_PAYMENT_PAYNL_PAYCONIC_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_PAYCONIC_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_PAYCONIC_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_PAYCONIC_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_PAYCONIC_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_PAYCONIC_STATUS') && (MODULE_PAYMENT_PAYNL_PAYCONIC_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_PAYCONIC_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_PAYCONIC_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_PAYCONIC_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_PAYCONIC_STATUS'
        );
    }
}