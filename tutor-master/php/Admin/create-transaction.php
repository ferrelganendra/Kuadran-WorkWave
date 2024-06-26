<?php
require_once __DIR__ . '/../../config/midtrans_config.php';

// Your transaction creation logic
$transaction_details = array(
    'order_id' => rand(),
    'gross_amount' => 200000, // Amount in IDR
);

$item_details = array(
    array(
        'id' => 'a1',
        'price' => 200000,
        'quantity' => 1,
        'name' => "Midtrans Bear",
    )
);

$customer_details = array(
    'first_name' => "John",
    'last_name' => "Doe",
    'email' => "john.doe@example.com",
    'phone' => "081234567890",
);

$transaction = array(
    'transaction_details' => $transaction_details,
    'item_details' => $item_details,
    'customer_details' => $customer_details
);

try {
    $snapToken = \Midtrans\Snap::getSnapToken($transaction);
    echo json_encode(['token' => $snapToken]);
} catch (Exception $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>
