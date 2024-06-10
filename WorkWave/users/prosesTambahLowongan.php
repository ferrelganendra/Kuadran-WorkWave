<?php
// Mulai session
session_start();

// Periksa apakah perusahaan sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Dapatkan username perusahaan dari session
$username_perusahaan = $_SESSION['username'];

// Include koneksi ke database
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
    // Membersihkan dan mengambil nilai input
    $kategori_pekerjaan_id = sanitize_input($_POST['kategori_pekerjaan_id']);
    $posisi = sanitize_input($_POST['posisi']);
    $tingkat_pendidikan = sanitize_input($_POST['tingkat_pendidikan']);
    $gender = sanitize_input($_POST['gender']);
    $status_kerja = sanitize_input($_POST['status_kerja']);
    $besaran_gaji = sanitize_input($_POST['besaran_gaji']);
    $lokasi_bekerja = sanitize_input($_POST['lokasi_bekerja']);
    $syarat_pekerjaan = sanitize_input($_POST['syarat_pekerjaan']);

    // Persiapkan statement
    $stmt_get_id = mysqli_stmt_init($koneksi);

    // Ambil ID perusahaan berdasarkan username
    $query_get_id = "SELECT id FROM users WHERE username = ?";
    if (mysqli_stmt_prepare($stmt_get_id, $query_get_id)) {
        mysqli_stmt_bind_param($stmt_get_id, "s", $username_perusahaan);
        mysqli_stmt_execute($stmt_get_id);
        mysqli_stmt_bind_result($stmt_get_id, $perusahaan_id);

        // Ambil hasil query
        mysqli_stmt_fetch($stmt_get_id);

        // Tutup pernyataan untuk query sebelumnya
        mysqli_stmt_close($stmt_get_id);

        // Query SQL untuk menyimpan data lowongan pekerjaan ke dalam database
        $stmt_insert_loker = mysqli_stmt_init($koneksi);
        $query_insert_loker = "INSERT INTO loker (user_id, kategori_pekerjaan_id, posisi, tingkat_pendidikan, gender, status_kerja, besaran_gaji, lokasi_bekerja, syarat_pekerjaan) 
                               VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
        if (mysqli_stmt_prepare($stmt_insert_loker, $query_insert_loker)) {
            mysqli_stmt_bind_param($stmt_insert_loker, "iisssdsss", $perusahaan_id, $kategori_pekerjaan_id, $posisi, $tingkat_pendidikan, $gender, $status_kerja, $besaran_gaji, $lokasi_bekerja, $syarat_pekerjaan);
            if (mysqli_stmt_execute($stmt_insert_loker)) {
                echo "<script>alert('Lowongan pekerjaan berhasil ditambahkan.'); window.location.href = 'dashboardPerusahaan.php';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan saat menambahkan lowongan pekerjaan: " . mysqli_error($koneksi) . "'); window.history.back();</script>";
            }
            mysqli_stmt_close($stmt_insert_loker);
        } else {
            echo "<script>alert('Terjadi kesalahan saat menyiapkan statement SQL.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Gagal mempersiapkan pernyataan SQL untuk mendapatkan ID perusahaan.'); window.history.back();</script>";
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
} else {
    echo "<script>alert('Metode pengiriman tidak valid.'); window.history.back();</script>";
}
?>
    