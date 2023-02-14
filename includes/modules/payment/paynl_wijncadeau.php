<?php
require_once('paynl/paynl.php');

class paynl_wijncadeau extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl wijncadeau signature',
            '2.0',
            'paynl_wijncadeau',
            1666,
            'WIJNCADEAU',
            MODULE_PAYMENT_PAYNL_WIJNCADEAU_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_WIJNCADEAU_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_WIJNCADEAU_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_WIJNCADEAU_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_WIJNCADEAU_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_WIJNCADEAU_STATUS') && (MODULE_PAYMENT_PAYNL_WIJNCADEAU_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_WIJNCADEAU_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_WIJNCADEAU_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_WIJNCADEAU_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_WIJNCADEAU_STATUS'
        );
    }
}