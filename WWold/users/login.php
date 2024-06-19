<?php

// Include koneksi database
include 'koneksi.php';

// Start session
session_start();

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $username = sanitize_input($_POST['log-username']);
    $password = sanitize_input($_POST['log-password']);

    // Check if username and password are not empty
    if (!empty($username) && !empty($password)) {
        // Check if user exists and password is correct
        $query = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = mysqli_query($koneksi, $query);

        if (mysqli_num_rows($result) == 1) {
            $user_data = mysqli_fetch_assoc($result);
            $status = $user_data['status'];

            // Check user status
            if ($status == 'diterima') {
                // Set session
                $_SESSION['username'] = $username;

                // Redirect to dashboard if status is 'diterima'
                header("Location: dashboardPerusahaan.php");
                exit();
            } elseif ($status == 'menunggu') {
                // Alert 1 "menunggu"
                echo "<script>alert('Akun Anda sedang dalam proses verifikasi admin. Harap tunggu konfirmasi dari admin.');</script>";
            } elseif ($status == 'ditolak') {
                // Alert 2 "ditolak"
                echo "<script>alert('Akun Anda tidak lolos verifikasi admin. Silakan hubungi admin untuk informasi lebih lanjut.');</script>";
            }
        } else {
            // Alert 3
            echo "<script>alert('Username dan password salah !'); window.location.href = 'dashboardPerusahaan.php';</script>";
        }
    } else {
        // Alert 4
        echo "<script>alert('Username atau password tidak boleh kosong.'); window.location.href = 'dashboardPerusahaan.php';</script>";
    }
}

// Tutup koneksi
$koneksi->close();

?>
