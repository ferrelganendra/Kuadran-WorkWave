<?php
include "koneksi.php";

// Fetch data for lowongan chart
$lowonganQuery = "SELECT MONTH(tanggal_dipost) AS month, COUNT(*) AS count FROM loker GROUP BY MONTH(tanggal_dipost)";
$lowonganResult = $koneksi->query($lowonganQuery);
$lowonganData = [];
$lowonganLabels = [];
while ($row = $lowonganResult->fetch_assoc()) {
    $lowonganLabels[] = $row['month'];
    $lowonganData[] = $row['count'];
}

// Fetch data for perusahaan chart
$perusahaanQuery = "SELECT MONTH(tanggal_bergabung) AS month, COUNT(*) AS count FROM users GROUP BY MONTH(tanggal_bergabung)";
$perusahaanResult = $koneksi->query($perusahaanQuery);
$perusahaanData = [];
$perusahaanLabels = [];
while ($row = $perusahaanResult->fetch_assoc()) {
    $perusahaanLabels[] = $row['month'];
    $perusahaanData[] = $row['count'];
}

echo json_encode([
    'lowongan' => [
        'labels' => $lowonganLabels,
        'data' => $lowonganData,
    ],
    'perusahaan' => [
        'labels' => $perusahaanLabels,
        'data' => $perusahaanData,
    ],
]);
?>
