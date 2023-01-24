<?php
require_once('paynl/paynl.php');

class paynl_nexi extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl nexi signature',
            '2.0',
            'paynl_nexi',
            1945,
            'NEXI',
            MODULE_PAYMENT_PAYNL_NEXI_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_NEXI_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_NEXI_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_NEXI_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_NEXI_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_NEXI_STATUS') && (MODULE_PAYMENT_PAYNL_NEXI_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_NEXI_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_NEXI_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_NEXI_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_NEXI_STATUS'
        );
    }
}