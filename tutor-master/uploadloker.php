<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'koneksi.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

// Periksa jumlah lowongan yang sudah diupload oleh pengguna
$query = "SELECT COUNT(*) as count FROM loker WHERE user_id = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($current_count);
$stmt->fetch();
$stmt->close();

// Dapatkan limit dari kolom limit_publish_users di tabel users
$query = "SELECT limit_publish_users FROM users WHERE id = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($limit_publish);
$stmt->fetch();
$stmt->close();

if ($current_count >= $limit_publish) {
    echo "<script>alert('Anda telah mencapai batas publikasi lowongan sesuai paket yang dibeli. Silakan beli paket baru.'); window.location.href = 'paket.php';</script>";
    exit();
}

// Jika semua pemeriksaan lolos, izinkan upload lowongan dan kurangi limit_publish_users
if (isset($_POST['posisi']) && isset($_SESSION['user_id']) && isset($_POST['kategori_pekerjaan_id'])) {
    $user_id = $_SESSION['user_id'];
    $posisi = $_POST['posisi'];
    $tingkat_pendidikan = $_POST['tingkat_pendidikan'];
    $gender = $_POST['gender'];
    $status_kerja = $_POST['status_kerja'];
    $besaran_gaji = $_POST['besaran_gaji'];
    $lokasi_bekerja = $_POST['lokasi_bekerja'];
    $syarat_pekerjaan = $_POST['syarat_pekerjaan'];
    $kategori_pekerjaan_id = $_POST['kategori_pekerjaan_id'];

    $query = "INSERT INTO loker (user_id, posisi, tingkat_pendidikan, gender, status_kerja, besaran_gaji, lokasi_bekerja, syarat_pekerjaan, kategori_pekerjaan_id, tanggal_dipost) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param('issssissi', $user_id, $posisi, $tingkat_pendidikan, $gender, $status_kerja, $besaran_gaji, $lokasi_bekerja, $syarat_pekerjaan, $kategori_pekerjaan_id);

    if ($stmt->execute()) {
        // Kurangi limit_publish_users
        $stmt = $koneksi->prepare("UPDATE users SET limit_publish_users = limit_publish_users - 1 WHERE id = ?");
        $stmt->bind_param('i', $user_id);
        $stmt->execute();
        $stmt->close();

        echo "<script>alert('Lowongan berhasil diupload.'); window.location.href = 'utama.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "<script>alert('Formulir tidak lengkap.'); window.location.href = 'lowongan.php';</script>";
}
?>
