<?php
require_once('paynl/paynl.php');

class paynl_capayable_gespreid extends paynl
{
    function __construct()
    {
        parent::__construct(
            'paynl capayable gespreid signature',
            '2.0',
            'paynl_capayable_gespreid',
            1813,
            'CAPAYABLE_GESPREID',
            MODULE_PAYMENT_PAYNL_CAPAYABLE_GESPREID_TEXT_TITLE,
            MODULE_PAYMENT_PAYNL_CAPAYABLE_GESPREID_TEXT_PUBLIC_TITLE,
            MODULE_PAYMENT_PAYNL_CAPAYABLE_GESPREID_TEXT_DESCRIPTION,
            defined('MODULE_PAYMENT_PAYNL_CAPAYABLE_GESPREID_SORT_ORDER') ? MODULE_PAYMENT_PAYNL_CAPAYABLE_GESPREID_SORT_ORDER : 0,
            defined('MODULE_PAYMENT_PAYNL_CAPAYABLE_GESPREID_STATUS') && (MODULE_PAYMENT_PAYNL_CAPAYABLE_GESPREID_STATUS == 'True') ? true : false,
            defined('MODULE_PAYMENT_PAYNL_CAPAYABLE_GESPREID_ORDER_STATUS_ID') && ((int)MODULE_PAYMENT_PAYNL_CAPAYABLE_GESPREID_ORDER_STATUS_ID > 0) ? (int)MODULE_PAYMENT_PAYNL_CAPAYABLE_GESPREID_ORDER_STATUS_ID : 0,
            'MODULE_PAYMENT_PAYNL_CAPAYABLE_GESPREID_STATUS'
        );
    }
}