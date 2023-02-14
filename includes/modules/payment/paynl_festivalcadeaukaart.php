<?php
require_once('paynl/paynl.php');

class paynl_festivalcadeaukaart extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl festival cadeaukaart signature',
            '2.0',
            'paynl_festivalcadeaukaart',
            2511,
            'FESTIVALCADEAUKAART',
            MODULE_PAYMENT_PAYNL_FESTIVALCADEAUKAART_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_FESTIVALCADEAUKAART_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_FESTIVALCADEAUKAART_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_FESTIVALCADEAUKAART_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_FESTIVALCADEAUKAART_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_FESTIVALCADEAUKAART_STATUS') && (MODULE_PAYMENT_PAYNL_FESTIVALCADEAUKAART_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_FESTIVALCADEAUKAART_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_FESTIVALCADEAUKAART_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_FESTIVALCADEAUKAART_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_FESTIVALCADEAUKAART_STATUS'
        );
    }
}