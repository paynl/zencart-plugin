<?php
require_once('paynl/paynl.php');

class paynl_sodexo extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl sodexo signature',
            '2.0',
            'paynl_sodexo',
            3030,
            'SODEXO',
            MODULE_PAYMENT_PAYNL_SODEXO_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_SODEXO_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_SODEXO_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_SODEXO_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_SODEXO_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_SODEXO_STATUS') && (MODULE_PAYMENT_PAYNL_SODEXO_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_SODEXO_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_SODEXO_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_SODEXO_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_SODEXO_STATUS'
        );
    }
}