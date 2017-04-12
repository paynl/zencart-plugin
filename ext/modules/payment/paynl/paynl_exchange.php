<?php

ini_set('display_errors', true);
error_reporting(-1);


chdir('../../../../');
require('includes/application_top.php');


require_once(DIR_WS_MODULES . '/payment/paynl/Pay/Autoload.php');

$transactionId = null;
$isExchange = false;
if ($_REQUEST['order_id']) {
    $transactionId = $_REQUEST['order_id'];//exchange
    $isExchange = true;
} else {
    $transactionId = $_REQUEST['orderId']; //finish
    $isExchange = false;
}

$method = $_REQUEST['method'];

$payApiInfo = new Pay_Api_Info();
$payApiInfo->setApiToken(constant('MODULE_PAYMENT_PAYNL_' . $method . '_API_TOKEN'));
$payApiInfo->setServiceId(constant('MODULE_PAYMENT_PAYNL_' . $method . '_SERVICE_ID'));
$payApiInfo->setTransactionId($transactionId);


try {
    $result = $payApiInfo->doRequest();
} catch (Exception $ex) {
    var_dump($ex->getMessage());
    die;
}

$state = Pay_Helper::getStateText($result['paymentDetails']['state']);
$orderId = $result['statsDetails']['extra1'];


if ($isExchange && isAlreadyPAID($transactionId)) die("TRUE|Already PAID");


if (!$isExchange && isAlreadyPAID($transactionId)) {


    $cart = &$_SESSION['cart'];
    $cart->reset(true);
    zen_redirect(zen_href_link(FILENAME_CHECKOUT_SUCCESS));
    exit;
}

//if not already paid
switch ($state) {
    case "PENDING":
        echo "TRUE|Ignore pending";
        ob_flush();
        updatePaynlTransaction($transactionId, $state);
        die;
        break;
    case "PAID":
        if (!$isExchange) {

            updateOrderStatus($method, $orderId);
            updatePaynlTransaction($transactionId, $state);
//clean up cart & session
            $cart = &$_SESSION['cart'];
            $cart->reset(true);
            zen_redirect(zen_href_link(FILENAME_CHECKOUT_SUCCESS));
        } else {

            updatePaynlTransaction($transactionId, $state);
            updateOrderStatus($method, $orderId);

            echo "TRUE|PAID";
            ob_flush();
            $cart = &$_SESSION['cart'];
            $cart->reset(true);
            zen_session_unregister('sendto');
            zen_session_unregister('billto');
            zen_session_unregister('shipping');
            zen_session_unregister('payment');
            zen_session_unregister('comments');
        }
        break;
    case "CANCEL":
        if ($isExchange) {
            echo "TRUE|CANCEL";
            deleteOrder($orderId);
            ob_flush();
        } else {
            deleteOrder($orderId);
            zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, 'payment_error=' . urlencode($method) . '&error=Payment cancelled', 'NONSSL', true, false));
        }
        break;
}

function deleteOrder($orderId)
{
    global $db;

    $db->Execute('delete from ' . TABLE_ORDERS . ' where orders_id = "' . (int)$orderId . '"');
    $db->Execute('delete from ' . TABLE_ORDERS_TOTAL . ' where orders_id = "' . (int)$orderId . '"');
    $db->Execute('delete from ' . TABLE_ORDERS_STATUS_HISTORY . ' where orders_id = "' . (int)$orderId . '"');
    $db->Execute('delete from ' . TABLE_ORDERS_PRODUCTS . ' where orders_id = "' . (int)$orderId . '"');
    $db->Execute('delete from ' . TABLE_ORDERS_PRODUCTS_ATTRIBUTES . ' where orders_id = "' . (int)$orderId . '"');
    $db->Execute('delete from ' . TABLE_ORDERS_PRODUCTS_DOWNLOAD . ' where orders_id = "' . (int)$orderId . '"');
}

function isAlreadyPAID($transactionId)
{
    global $db;


    $orderRow = $db->Execute("SELECT order_id FROM paynl_transaction WHERE transaction_id ='" . zen_db_input($transactionId) . "'");


    if (!isset($orderRow->fields['order_id'])) return false;

    $arrTransactionsResult = $db->Execute('SELECT count(*) as count FROM paynl_transaction WHERE order_id =' . $orderRow->fields['order_id'] . ' AND status = "PAID" ');

    $arrTransactions = $arrTransactionsResult->fields['count'];


    if (intval($arrTransactions) > 0) {
        return true;
    } else return false;
}

function updatePaynlTransaction($transactionId, $status)
{
    global $db;
    $db->Execute("UPDATE paynl_transaction SET status = '" . $status . "' , last_update= now() WHERE transaction_id ='" . $transactionId . "'");
}

function updateOrderStatus($method, $orderId)
{
    global $db;


    $order_status_id = (constant('MODULE_PAYMENT_PAYNL_' . $method . '_TRANSACTION_ORDER_STATUS_ID') > 0 ? (int)constant('MODULE_PAYMENT_PAYNL_' . $method . '_TRANSACTION_ORDER_STATUS_ID') : (int)DEFAULT_ORDERS_STATUS_ID);

    $db->Execute("update " . TABLE_ORDERS . " set orders_status = '" . $order_status_id . "', last_modified = now() where orders_id = '" . (int)$orderId . "'");


    $sql_data_array = array('orders_id' => $orderId,
        'orders_status_id' => $order_status_id,
        'date_added' => 'now()',
        'customer_notified' => '0',
        'comments' => 'Pay.nl Transaction [VERIFIED]');

    zen_db_perform(TABLE_ORDERS_STATUS_HISTORY, $sql_data_array);
}

?>
