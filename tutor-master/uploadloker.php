<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'koneksi.php';

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

if (!$user_id) {
    header("Location: login.php");
    exit();
}

// Periksa jumlah lowongan yang sudah diupload oleh pengguna
$query = "SELECT COUNT(*) as count FROM loker WHERE user_id = ?";
$stmt = $koneksi->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($current_count);
$stmt->fetch();
$stmt->close();

// Dapatkan limit dari paket yang dibeli pengguna
$query = "SELECT p.limit_publish FROM transactions t 
          JOIN paketloker p ON t.package_id = p.package_id 
          WHERE t.user_id = ? AND t.transaction_status = 'success' 
          ORDER BY t.transaction_time DESC LIMIT 1";
$stmt = $koneksi->prepare($query);
$stmt->bind_param('i', $user_id);
$stmt->execute();
$stmt->bind_result($limit_publish);
$stmt->fetch();
$stmt->close();

// Jika pengguna telah mencapai limit, set package_purchased menjadi 0
if ($current_count >= $limit_publish) {
    $stmt = $koneksi->prepare("UPDATE users SET package_purchased = 0 WHERE id = ?");
    $stmt->bind_param('i', $user_id);
    $stmt->execute();
    $stmt->close();

    echo "<script>alert('Anda telah mencapai batas publikasi lowongan sesuai paket yang dibeli. Silakan beli paket baru.'); window.location.href = 'paket.php';</script>";
    exit();
}

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
        echo "<script>alert('Lowongan berhasil diupload.'); window.location.href = 'utama.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "<script>alert('Formulir tidak lengkap.'); window.location.href = 'lowongan.php';</script>";
}
?>
