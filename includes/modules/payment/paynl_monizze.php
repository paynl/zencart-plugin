<?php
require_once('paynl/paynl.php');

class paynl_monizze extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl monizze signature',
            '2.0',
            'paynl_monizze',
            3027,
            'MONIZZE',
            MODULE_PAYMENT_PAYNL_MONIZZE_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_MONIZZE_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_MONIZZE_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_MONIZZE_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_MONIZZE_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_MONIZZE_STATUS') && (MODULE_PAYMENT_PAYNL_MONIZZE_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_MONIZZE_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_MONIZZE_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_MONIZZE_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_MONIZZE_STATUS'
        );
    }
}