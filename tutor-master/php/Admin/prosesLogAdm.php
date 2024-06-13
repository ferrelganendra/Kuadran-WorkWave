<?php
// Start session
session_start();

// Include koneksi database atau file yang diperlukan
include 'koneksi.php';

// Function untuk membersihkan input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Cek apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Membersihkan dan mengambil nilai input username dan password
    $username = sanitize_input($_POST['username']);
    $password = sanitize_input($_POST['password']);

    // Ubah proses login untuk admin dengan username dan password "admin"
    if ($username === 'admin' && $password === 'admin') {
        // Admin ditemukan, set session dan redirect ke halaman dashboard admin
        $_SESSION['admin_username'] = $username;
        header("Location: dashboard_admin.php");
        exit();
    } else {
        // Jika admin tidak ditemukan, tampilkan pesan error
        echo "<script>alert('Username atau password salah. Silakan coba lagi.');</script>";
        echo "<script>window.location.href='loginAdmin.php';</script>";
    }
}

// Tutup koneksi database
mysqli_close($koneksi);
?>

