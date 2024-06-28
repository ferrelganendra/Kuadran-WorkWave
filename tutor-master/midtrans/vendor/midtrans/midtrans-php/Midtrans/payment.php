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

// Assuming user is logged in and user_id is set in session
$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if (!$user_id) {
    echo json_encode(['error' => 'User not logged in']);
    exit();
}

// Example data, you can fetch data from your database
$package_id = isset($_POST['package_id']) ? $_POST['package_id'] : null;
$packages = [
    'gold' => ['name' => 'Gold Package', 'price' => 200000],
    'silver' => ['name' => 'Silver Package', 'price' => 150000],
    'bronze' => ['name' => 'Bronze Package', 'price' => 100000]
];

if (!array_key_exists($package_id, $packages)) {
    echo json_encode(['error' => 'Invalid package selected']);
    exit();
}

$package = $packages[$package_id];

// Required
$transaction_details = array(
    'order_id' => rand(),
    'gross_amount' => $package['price'], // no decimal allowed for creditcard
);

// Optional
$item_details = array(
    array(
        'id' => $package_id,
        'price' => $package['price'],
        'quantity' => 1,
        'name' => $package['name']
    )
);

// Optional
$customer_details = array(
    'first_name'    => "User",
    'last_name'     => "Example",
    'email'         => "user@example.com",
    'phone'         => "081122334455"
);

// Fill transaction details
$transaction = array(
    'transaction_details' => $transaction_details,
    'item_details'        => $item_details,
    'customer_details'    => $customer_details,
);

try {
    $snapToken = \Midtrans\Snap::getSnapToken($transaction);
    echo json_encode(['snapToken' => $snapToken]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
    exit();
}

?>