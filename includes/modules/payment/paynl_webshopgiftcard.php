<?php
require_once('paynl/paynl.php');

class paynl_webshopgiftcard extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl webshopgiftcard signature',
            '2.0',
            'paynl_webshopgiftcard',
            811,
            'WEBSHOPGIFTCARD',
            MODULE_PAYMENT_PAYNL_WEBSHOPGIFTCARD_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_WEBSHOPGIFTCARD_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_WEBSHOPGIFTCARD_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_WEBSHOPGIFTCARD_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_WEBSHOPGIFTCARD_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_WEBSHOPGIFTCARD_STATUS') && (MODULE_PAYMENT_PAYNL_WEBSHOPGIFTCARD_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_WEBSHOPGIFTCARD_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_WEBSHOPGIFTCARD_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_WEBSHOPGIFTCARD_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_WEBSHOPGIFTCARD_STATUS'
        );
    }
}