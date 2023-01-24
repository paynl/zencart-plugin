<?php
require_once('paynl/paynl.php');

class paynl_winkelcheque extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl winkelcheque signature',
            '2.0',
            'paynl_winkelcheque',
            2616,
            'WINKELCHEQUE',
            MODULE_PAYMENT_PAYNL_WINKELCHEQUE_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_WINKELCHEQUE_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_WINKELCHEQUE_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_WINKELCHEQUE_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_WINKELCHEQUE_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_WINKELCHEQUE_STATUS') && (MODULE_PAYMENT_PAYNL_WINKELCHEQUE_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_WINKELCHEQUE_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_WINKELCHEQUE_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_WINKELCHEQUE_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_WINKELCHEQUE_STATUS'
        );
    }
}