<?php
require_once('paynl/paynl.php');

class paynl_giropay extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl giropay signature',
            '2.0',
            'paynl_giropay',
            694,
            'GIROPAY',
            MODULE_PAYMENT_PAYNL_GIROPAY_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_GIROPAY_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_GIROPAY_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_GIROPAY_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_GIROPAY_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_GIROPAY_STATUS') && (MODULE_PAYMENT_PAYNL_GIROPAY_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_GIROPAY_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_GIROPAY_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_GIROPAY_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_GIROPAY_STATUS'
        );
    }
}