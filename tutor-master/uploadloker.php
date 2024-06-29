<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
include 'koneksi.php';

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

    $query = "INSERT INTO loker (user_id, posisi, tingkat_pendidikan, gender, status_kerja, besaran_gaji, lokasi_bekerja, syarat_pekerjaan, kategori_pekerjaan_id) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $koneksi->prepare($query);
    $stmt->bind_param('issssissi', $user_id, $posisi, $tingkat_pendidikan, $gender, $status_kerja, $besaran_gaji, $lokasi_bekerja, $syarat_pekerjaan, $kategori_pekerjaan_id);

    if ($stmt->execute()) {
        // Mengarahkan ke halaman utama setelah sukses mengunggah
        header("Location: utama.php");
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Data tidak lengkap atau pengguna tidak terdaftar.";
}
?>
