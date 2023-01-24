<?php
require_once('paynl/paynl.php');

class paynl_boekenbon extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl boekenbon signature',
            '2.0',
            'paynl_boekenbon',
            2838,
            'BOEKENBON',
            MODULE_PAYMENT_PAYNL_BOEKENBON_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_BOEKENBON_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_BOEKENBON_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_BOEKENBON_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_BOEKENBON_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_BOEKENBON_STATUS') && (MODULE_PAYMENT_PAYNL_BOEKENBON_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_BOEKENBON_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_BOEKENBON_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_BOEKENBON_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_BOEKENBON_STATUS'
        );
    }
}