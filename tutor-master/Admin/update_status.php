<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'koneksi.php';

// Pastikan metode yang digunakan adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan data yang dibutuhkan terdefinisi
    if (isset($_POST['id']) && isset($_POST['status'])) {
        // Ambil nilai dari formulir
        $id = $_POST['id'];
        $status = $_POST['status'];

        // Buat dan jalankan SQL statement untuk memperbarui status
        $sql = "UPDATE users SET status='$status' WHERE id='$id'";

        if ($koneksi->query($sql) === TRUE) {
            echo "Status berhasil diperbarui.";
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }
    } else {
        echo "Data yang dibutuhkan tidak lengkap.";
    }
} else {
    echo "Metode yang digunakan harus POST.";
}

// Tutup koneksi
$koneksi->close();
?>
