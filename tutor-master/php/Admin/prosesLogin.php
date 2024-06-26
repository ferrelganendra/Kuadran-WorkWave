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
                $_SESSION['user_id'] = $user_data['id']; // Store user ID in session

                // Redirect to dashboard if status is 'diterima'
                header("Location: ../../profil.php?status=diterima");
                exit();
            } elseif ($status == 'menunggu') {
                // Alert 1 "menunggu"
                echo "<script>alert('Akun Anda sedang dalam proses verifikasi admin. Harap tunggu konfirmasi dari admin.'); window.location.href = '../../login.php';</script>";
                exit(); // Make sure to exit after the script
            } elseif ($status == 'ditolak') {
                // Alert 2 "ditolak"
                echo "<script>alert('Akun Anda tidak lolos verifikasi admin. Silakan hubungi admin untuk informasi lebih lanjut.'); window.location.href = '../../login.php';</script>";
                exit(); // Make sure to exit after the script
            }
        } else {
            // Alert 3
            echo "<script>alert('Username dan password salah!'); window.location.href = '../../login.php';</script>";
            exit(); // Make sure to exit after the script
        }

        // Close statement
        $stmt->close();
    } else {
        // Alert 4
        echo "<script>alert('Username atau password tidak boleh kosong.'); window.location.href = '../../login.php';</script>";
        exit(); // Make sure to exit after the script
    }
}

// Tutup koneksi
$koneksi->close();
?>
