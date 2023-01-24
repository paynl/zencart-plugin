<?php
require_once('paynl/paynl.php');

class paynl_bioscoopbon extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl bioscoopbon signature',
            '2.0',
            'paynl_bioscoopbon',
            2133,
            'BIOSCOOPBON',
            MODULE_PAYMENT_PAYNL_BIOSCOOPBON_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_BIOSCOOPBON_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_BIOSCOOPBON_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_BIOSCOOPBON_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_BIOSCOOPBON_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_BIOSCOOPBON_STATUS') && (MODULE_PAYMENT_PAYNL_BIOSCOOPBON_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_BIOSCOOPBON_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_BIOSCOOPBON_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_BIOSCOOPBON_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_BIOSCOOPBON_STATUS'
        );
    }
}