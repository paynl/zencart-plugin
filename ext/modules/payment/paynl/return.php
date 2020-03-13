<?php

// Change dir
chdir("../../../../");

// Add necessary includes
require_once 'includes/application_top.php';

// used for sending status update mail
listdir('./' . DIR_WS_LANGUAGES);
if (strlen($foundPath) > 0) {
  require_once $foundPath;
}

// Check if shopCode is present
$shopCode = "paynl_ideal";
if (isset($_REQUEST['shopCode']) && $_REQUEST['shopCode']) {
  $shopCode = $_REQUEST['shopCode'];
}

// Check if OrderId is present
if (intval($_GET['orderId']) == 0) {
  $strMessage = "No Pay.nl order ID supplied";
  zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, 'payment_error=' . $shopCode . '&error=' . urlencode($strMessage), 'NONSSL', true, false));
  exit;
}

// Load selected payment module
require(DIR_WS_CLASSES . "payment.php");
$payment_modules = new payment($shopCode);
$payment_module = $GLOBALS[$payment_modules->selected_module];

// Update order status
$arrPaymentDetails = $payment_module->updateStatus($_GET['orderId']);

if ($arrPaymentDetails['stateName'] == "PAID") {
  // Payment Success
  $cart = &$_SESSION['cart'];
  $cart->reset(true);
  /*
    unset($_SESSION['sendto']);
    unset($_SESSION['billto']);
    unset($_SESSION['shipping']);
    unset($_SESSION['payment']);
    unset($_SESSION['comments']);
    unset($_SESSION['customer_id']); */

  zen_redirect(zen_href_link(FILENAME_CHECKOUT_SUCCESS));
} else {
  // Payment not successful (yet)
  zen_redirect(zen_href_link(FILENAME_CHECKOUT_PAYMENT, "payment_error=" . $payment_module->code . "&error=" . urlencode($arrPaymentDetails['stateName']), "SSL", true, false));
}

function listdir($start_dir = '.')
{
  global $foundPath;

  $files = array();
  if (is_dir($start_dir)) {
    $fh = opendir($start_dir);
    while (($file = readdir($fh)) !== false) {
      # loop through the files, skipping . and .., and recursing if necessary
      if (strcmp($file, '.') == 0 || strcmp($file, '..') == 0) {
        continue;
      }

      $filepath = $start_dir . '/' . $file;

      if (is_dir($filepath)) {
        $files = array_merge($files, listdir($filepath));
      } else {
        if (strpos($filepath, DIR_WS_LANGUAGES . $_SESSION['language'] . '/' . FILENAME_ORDERS . ".php")) {
          $foundPath = $filepath;
        }

        array_push($files, $filepath);
      }
    }
    closedir($fh);
  } else {
    # false if the function was called with an invalid non-directory argument
    $files = false;
  }

  return $files;
}