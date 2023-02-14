<?php
require_once('paynl/paynl.php');

class paynl_eps extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl eps signature',
            '2.0',
            'paynl_eps',
            2062,
            'EPS',
            MODULE_PAYMENT_PAYNL_EPS_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_EPS_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_EPS_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_EPS_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_EPS_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_EPS_STATUS') && (MODULE_PAYMENT_PAYNL_EPS_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_EPS_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_EPS_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_EPS_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_EPS_STATUS'
        );
    }
}