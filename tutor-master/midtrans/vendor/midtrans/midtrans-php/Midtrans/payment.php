<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

require '../../../autoload.php'; // Include Composer's autoload


// Set your Merchant Server Key
\Midtrans\Config::$serverKey = 'SB-Mid-server-2ybf1Dlh3fptsONo3qo7LBpl';
// Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
\Midtrans\Config::$isProduction = false;
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = true;
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = true;

// Ensure the response is always JSON
header('Content-Type: application/json');

$packageId = $_POST['package_id'];
$user_id = $_SESSION['user_id']; // Ensure the user_id is stored in session

$transactionDetails = [
    'order_id' => uniqid(),
    'gross_amount' => getPackagePrice($packageId)
];

$itemDetails = [
    [
        'id' => $packageId,
        'price' => getPackagePrice($packageId),
        'quantity' => 1,
        'name' => getPackageName($packageId)
    ]
];

$customerDetails = [
    'user_id' => $user_id,
    'email' => getUserEmail($user_id), // Implement getUserEmail function to get user email by user_id
];

$transaction = [
    'transaction_details' => $transactionDetails,
    'item_details' => $itemDetails,
    'customer_details' => $customerDetails,
];

function getPackagePrice($packageId) {
    // Implement this function to get the package price by packageId
    // For example:
    if ($packageId == 'gold') return 200000;
    if ($packageId == 'silver') return 150000;
    if ($packageId == 'bronze') return 100000;
}

function getPackageName($packageId) {
    // Implement this function to get the package name by packageId
    // For example:
    if ($packageId == 'gold') return 'Gold Package';
    if ($packageId == 'silver') return 'Silver Package';
    if ($packageId == 'bronze') return 'Bronze Package';
}

function getUserEmail($user_id) {
    // Implement this function to get the user email by user_id
    // For example:
    // Connect to your database and get the email for the given user_id
}

try {
    $snapToken = \Midtrans\Snap::getSnapToken($transaction);
    echo json_encode(['snapToken' => $snapToken]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
    exit();
}

?>