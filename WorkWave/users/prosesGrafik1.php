<?php
// Menggunakan koneksi ke database
include 'koneksi.php';

// Query untuk mengambil data jumlah lowongan pekerjaan berdasarkan kategori pekerjaan
$query = "SELECT k.nama_kategori, COUNT(l.id) AS jumlah_lowongan
          FROM kategori_pekerjaan k
          LEFT JOIN loker l ON k.id = l.kategori_pekerjaan_id
          GROUP BY k.id";

$result = mysqli_query($koneksi, $query);

// Format data untuk digunakan dalam Chart.js
$labels = [];
$data = [];

while ($row = mysqli_fetch_assoc($result)) {
    $labels[] = $row['nama_kategori'];
    $data[] = $row['jumlah_lowongan'];
}

// Tutup koneksi database
mysqli_close($koneksi);
?>