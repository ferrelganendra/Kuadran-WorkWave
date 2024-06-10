<?php
$host = "localhost"; // Lokasi server database
$user = "root"; // Username database
$password = ""; // Password database
$database = "kuadran"; // Nama database

// Buat koneksi
$koneksi = new mysqli($host, $user, $password, $database);

// Periksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
