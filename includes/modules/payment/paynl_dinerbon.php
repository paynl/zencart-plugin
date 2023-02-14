<?php
require_once('paynl/paynl.php');

class paynl_dinerbon extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl dinerbon signature',
            '2.0',
            'paynl_dinerbon',
            2670,
            'DINERBON',
            MODULE_PAYMENT_PAYNL_DINERBON_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_DINERBON_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_DINERBON_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_DINERBON_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_DINERBON_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_DINERBON_STATUS') && (MODULE_PAYMENT_PAYNL_DINERBON_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_DINERBON_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_DINERBON_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_DINERBON_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_DINERBON_STATUS'
        );
    }
}