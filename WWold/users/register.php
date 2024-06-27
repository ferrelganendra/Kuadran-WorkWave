<?php
session_start();

// Include koneksi database
include 'koneksi.php';

// Periksa apakah permintaan dikirimkan dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari formulir pendaftaran
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $industri = $_POST['industri'];
    $deskripsi_perusahaan = $_POST['deskripsi_perusahaan'];
    $media_sosial = $_POST['media_sosial'];
    $website = $_POST['website'];
    $alamat_perusahaan = $_POST['alamat_perusahaan'];
    $logo_perusahaan = $_POST['logo_perusahaan'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memasukkan data ke dalam tabel pengguna (users)
    $sql = "INSERT INTO users (nama_perusahaan, industri, deskripsi_perusahaan, media_sosial, website, alamat_perusahaan, logo_perusahaan, username, password)
    VALUES ('$nama_perusahaan', '$industri', '$deskripsi_perusahaan', '$media_sosial', '$website', '$alamat_perusahaan', '$logo_perusahaan', '$username', '$password')";

    if ($koneksi->query($sql) === TRUE) {

        $_SESSION['register_success'] = true;
        // Menampilkan pesan alert dan mengarahkan ke dashboardPerusahaan.php
        echo "<script>alert('Pendaftaran berhasil!'); window.location.href = 'dashboardPerusahaan.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    // Tutup koneksi
    $koneksi->close();
} else {
    // Jika permintaan tidak dikirimkan dengan metode POST, lakukan tindakan yang sesuai
    echo "Pendaftaran Anda belum berhasil";
}
?>
