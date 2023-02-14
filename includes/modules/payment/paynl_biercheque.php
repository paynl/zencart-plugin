<?php
require_once('paynl/paynl.php');

class paynl_biercheque extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl biercheque signature',
            '2.0',
            'paynl_biercheque',
            2622,
            'BIERCHEQUE',
            MODULE_PAYMENT_PAYNL_BIERCHEQUE_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_BIERCHEQUE_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_BIERCHEQUE_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_BIERCHEQUE_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_BIERCHEQUE_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_BIERCHEQUE_STATUS') && (MODULE_PAYMENT_PAYNL_BIERCHEQUE_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_BIERCHEQUE_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_BIERCHEQUE_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_BIERCHEQUE_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_BIERCHEQUE_STATUS'
        );
    }
}