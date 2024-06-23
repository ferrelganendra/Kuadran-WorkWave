<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include "koneksi.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && isset($_POST['status'])) {
        $id = $_POST['id'];
        $status = $_POST['status'];

        $update_sql = "UPDATE event SET status = ? WHERE id = ?";
        $stmt = $koneksi->prepare($update_sql);
        if ($stmt) {
            $stmt->bind_param("si", $status, $id);
            if ($stmt->execute()) {
                echo "Status event telah diperbarui.";
            } else {
                echo "Terjadi kesalahan saat memperbarui status.";
            }
            $stmt->close();
        } else {
            echo "Terjadi kesalahan pada pernyataan SQL.";
        }
    } else {
        echo "Data tidak lengkap.";
    }
} else {
    echo "Metode permintaan tidak valid.";
}
$koneksi->close();
?>