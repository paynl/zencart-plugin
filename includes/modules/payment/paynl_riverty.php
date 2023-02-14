<?php
require_once('paynl/paynl.php');

class paynl_riverty extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl riverty signature',
            '2.0',
            'paynl_riverty',
            2561,
            'RIVERTY',
            MODULE_PAYMENT_PAYNL_RIVERTY_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_RIVERTY_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_RIVERTY_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_RIVERTY_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_RIVERTY_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_RIVERTY_STATUS') && (MODULE_PAYMENT_PAYNL_RIVERTY_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_RIVERTYK_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_RIVERTY_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_RIVERTY_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_RIVERTY_STATUS'
        );
    }
}