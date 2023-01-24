<?php
require_once('paynl/paynl.php');

class paynl_creditclick extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl creditclick signature',
            '2.0',
            'paynl_creditclick',
            2107,
            'CREDITCLICK',
            MODULE_PAYMENT_PAYNL_CREDITCLICK_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_CREDITCLICK_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_CREDITCLICK_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_CREDITCLICK_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_CREDITCLICK_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_CREDITCLICK_STATUS') && (MODULE_PAYMENT_PAYNL_CREDITCLICK_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_CREDITCLICK_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_CREDITCLICK_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_CREDITCLICK_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_CREDITCLICK_STATUS'
        );
    }
}