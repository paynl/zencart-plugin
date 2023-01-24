<?php
require_once('paynl/paynl.php');

class paynl_huisentuincadeau extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl huis en tuin cadeau signature',
            '2.0',
            'paynl_huisentuincadeau',
            2283,
            'HUISENTUINCADEAU',
            MODULE_PAYMENT_PAYNL_HUISENTUINCADEAU_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_HUISENTUINCADEAU_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_HUISENTUINCADEAU_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_HUISENTUINCADEAU_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_HUISENTUINCADEAU_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_HUISENTUINCADEAU_STATUS') && (MODULE_PAYMENT_PAYNL_HUISENTUINCADEAU_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_HUISENTUINCADEAU_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_HUISENTUINCADEAU_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_HUISENTUINCADEAU_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_HUISENTUINCADEAU_STATUS'
        );
    }
}