<?php
require_once('paynl/paynl.php');

class paynl_onlinebankbetaling extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl onlinebankbetaling signature',
            '2.0',
            'paynl_onlinebankbetaling',
            2970,
            'ONLINEBANKBETALING',
            MODULE_PAYMENT_PAYNL_ONLINEBANKBETALING_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_ONLINEBANKBETALING_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_ONLINEBANKBETALING_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_ONLINEBANKBETALING_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_ONLINEBANKBETALING_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_ONLINEBANKBETALING_STATUS') && (MODULE_PAYMENT_PAYNL_ONLINEBANKBETALING_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_ONLINEBANKBETALING_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_ONLINEBANKBETALING_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_ONLINEBANKBETALING_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_ONLINEBANKBETALING_STATUS'
        );
    }
}