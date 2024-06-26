<?php
require_once __DIR__ . '/../../config/midtrans_config.php';
require_once __DIR__ . 'koneksi.php'; 

$notif = new \Midtrans\Notification();

$transaction = $notif->transaction_status;
$type = $notif->payment_type;
$order_id = $notif->order_id;
$fraud = $notif->fraud_status;
$gross_amount = $notif->gross_amount;
$transaction_time = $notif->transaction_time;
$user_id = 1; // Replace with the actual user ID linked to the transaction

// Function to update transaction status in the database
function update_transaction_status($order_id, $status, $type, $amount, $time, $fraud, $user_id) {
    global $koneksi;
    $query = "INSERT INTO transactions (order_id, transaction_status, payment_type, gross_amount, transaction_time, fraud_status, user_id)
              VALUES (?, ?, ?, ?, ?, ?, ?)
              ON DUPLICATE KEY UPDATE transaction_status = VALUES(transaction_status), payment_type = VALUES(payment_type), gross_amount = VALUES(gross_amount), transaction_time = VALUES(transaction_time), fraud_status = VALUES(fraud_status)";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "ssssssi", $order_id, $status, $type, $amount, $time, $fraud, $user_id);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

update_transaction_status($order_id, $transaction, $type, $gross_amount, $transaction_time, $fraud, $user_id);

echo "Notification processed successfully";
?>
