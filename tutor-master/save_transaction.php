<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_POST['user_id'];
    $package_id = $_POST['package_id'];
    $order_id = $_POST['order_id'];
    $transaction_status = $_POST['transaction_status'];
    $gross_amount = $_POST['gross_amount'];
    $payment_type = $_POST['payment_type'];

    // Logging for debugging
    error_log("saveTransactionDetails: user_id = $user_id, package_id = $package_id, order_id = $order_id, transaction_status = $transaction_status, gross_amount = $gross_amount, payment_type = $payment_type");

    $stmt = $koneksi->prepare("INSERT INTO transactions (user_id, package_id, order_id, transaction_status, gross_amount, payment_type, transaction_time) 
    VALUES (?, ?, ?, ?, ?, ?, NOW())");

    if (!$stmt) {
        error_log("Prepare failed: (" . $koneksi->errno . ") " . $koneksi->error);
        echo json_encode(['error' => 'Prepare failed']);
        exit();
    }

    if (!$stmt->bind_param("iissds", $user_id, $package_id, $order_id, $transaction_status, $gross_amount, $payment_type)) {
        error_log("Binding parameters failed: (" . $stmt->errno . ") " . $stmt->error);
        echo json_encode(['error' => 'Binding parameters failed']);
        exit();
    }

    if (!$stmt->execute()) {
        error_log("Execute failed: (" . $stmt->errno . ") " . $stmt->error);
        echo json_encode(['error' => 'Execute failed']);
        exit();
    }

    $stmt->close();

    // Update the user's package_purchased
    $stmt = $koneksi->prepare("UPDATE users SET package_purchased = 1 WHERE id = ?");
    if (!$stmt) {
        error_log("Prepare failed (update users): (" . $koneksi->errno . ") " . $koneksi->error);
        echo json_encode(['error' => 'Prepare failed (update users)']);
        exit();
    }

    if (!$stmt->bind_param("i", $user_id)) {
        error_log("Binding parameters failed (update users): (" . $stmt->errno . ") " . $stmt->error);
        echo json_encode(['error' => 'Binding parameters failed (update users)']);
        exit();
    }

    if (!$stmt->execute()) {
        error_log("Execute failed (update users): (" . $stmt->errno . ") " . $stmt->error);
        echo json_encode(['error' => 'Execute failed (update users)']);
        exit();
    }

    $stmt->close();

    error_log("Transaction and user update successful for user_id = $user_id");
    echo json_encode(['success' => true]);
}
?>
