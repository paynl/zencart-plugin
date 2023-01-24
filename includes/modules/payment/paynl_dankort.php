<?php
require_once('paynl/paynl.php');

class paynl_dankort extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl dankort signature',
            '2.0',
            'paynl_dankort',
            1939,
            'DANKORT',
            MODULE_PAYMENT_PAYNL_DANKORT_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_DANKORT_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_DANKORT_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_DANKORT_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_DANKORT_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_DANKORT_STATUS') && (MODULE_PAYMENT_PAYNL_DANKORT_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_DANKORT_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_DANKORT_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_DANKORT_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_DANKORT_STATUS'
        );
    }
}