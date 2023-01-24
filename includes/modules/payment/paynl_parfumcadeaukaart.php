<?php
require_once('paynl/paynl.php');

class paynl_parfumcadeaukaart extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl parfum cadeaukaart signature',
            '2.0',
            'paynl_parfumcadeaukaart',
            2682,
            'PARFUMCADEAUKAART',
            MODULE_PAYMENT_PAYNL_PARFUMCADEAUKAART_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_PARFUMCADEAUKAART_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_PARFUMCADEAUKAART_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_PARFUMCADEAUKAART_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_PARFUMCADEAUKAART_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_PARFUMCADEAUKAART_STATUS') && (MODULE_PAYMENT_PAYNL_PARFUMCADEAUKAART_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_PARFUMCADEAUKAART_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_PARFUMCADEAUKAART_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_PARFUMCADEAUKAART_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_PARFUMCADEAUKAART_STATUS'
        );
    }
}