<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

// Check if form is submitted
if (isset($_POST['login'])) {
    $username = $_POST['log-username'];
    $password = $_POST['log-password'];

    // Check if username and password are not empty
    if (!empty($username) && !empty($password)) {
        // Prepare and bind
        $stmt = $koneksi->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user_data = $result->fetch_assoc();
            $status = $user_data['status'];

            // Check user status
            if ($status == 'diterima') {
                // Set session
                $_SESSION['username'] = $username;

                // Redirect to dashboard if status is 'diterima'
                header("Location: ../../profil.html");
                exit();
            } elseif ($status == 'menunggu') {
                // Alert 1 "menunggu"
                echo "<script>alert('Akun Anda sedang dalam proses verifikasi admin. Harap tunggu konfirmasi dari admin.'); window.location.href = '../../login.php';</script>";
            } elseif ($status == 'ditolak') {
                // Alert 2 "ditolak"
                echo "<script>alert('Akun Anda tidak lolos verifikasi admin. Silakan hubungi admin untuk informasi lebih lanjut.'); window.location.href = '../../login.php';</script>";
            }
        } else {
            // Alert 3
            echo "<script>alert('Username dan password salah!'); window.location.href = '../../login.php';</script>";
        }

        // Close statement
        $stmt->close();
    } else {
        // Alert 4
        echo "<script>alert('Username atau password tidak boleh kosong.'); window.location.href = '../../login.php';</script>";
    }
}

// Tutup koneksi
$koneksi->close();
?>
