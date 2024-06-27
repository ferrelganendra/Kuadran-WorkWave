<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'koneksi.php';

if (isset($_POST['register'])) {
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $industri = $_POST['industri'];
    $deskripsi_perusahaan = $_POST['deskripsi_perusahaan'];
    $media_sosial = $_POST['media_sosial'];
    $website = $_POST['website'];
    $alamat_perusahaan = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Set status default 'menunggu'
    $status = 'menunggu';

    $query = "INSERT INTO users (nama_perusahaan, industri, deskripsi_perusahaan, media_sosial, website, alamat_perusahaan, username, password, status) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param('sssssssss', $nama_perusahaan, $industri, $deskripsi_perusahaan, $media_sosial, $website, $alamat_perusahaan, $username, $password, $status);

    if ($stmt->execute()) {
        // Set session
        $_SESSION['username'] = $username;
        // Menggunakan header location untuk mengarahkan ke profil.php
        header("Location: ../../profil.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
