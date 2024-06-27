<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

// Ambil parameter dari POST request
$kategori = isset($_POST['kategori']) ? (int)$_POST['kategori'] : '';
$status = isset($_POST['status']) ? $_POST['status'] : '';

// Bangun kueri SQL dengan filter
$sql = "SELECT loker.*, users.logo_perusahaan 
        FROM loker 
        LEFT JOIN users ON loker.user_id = users.id 
        WHERE 1=1";
$params = [];
$types = "";

if ($kategori) {
    $sql .= " AND kategori_pekerjaan_id = ?";
    $params[] = $kategori;
    $types .= "i";
}

if ($status) {
    $sql .= " AND status_kerja = ?";
    $params[] = $status;
    $types .= "s";
}

$stmt = $koneksi->prepare($sql);

// Gunakan call_user_func_array untuk mengikat parameter secara dinamis
if ($params) {
    $stmt->bind_param($types, ...$params);
}

$stmt->execute();
$loker_result = $stmt->get_result();

// Bangun HTML untuk hasil pencarian
$output = '';

if ($loker_result->num_rows > 0) {
    while ($row = $loker_result->fetch_assoc()) {
        $output .= '
            <div class="d-flex tutorial-item mb-4">
                <div class="img-wrap">
                    <a href="#"><img src="images/' . (!empty($row['logo_perusahaan']) ? htmlspecialchars($row['logo_perusahaan']) : 'default.png') . '" alt="Image" class="img-fluid"></a>
                </div>
                <div>
                    <h3><a href="#">' . htmlspecialchars($row['posisi']) . '</a></h3>
                    <p>' . htmlspecialchars($row['syarat_pekerjaan']) . '</p>
                    <p class="meta">
                        <span class="mr-2 mb-2">' . htmlspecialchars($row['tingkat_pendidikan']) . '</span>
                        <span class="mr-2 mb-2">' . htmlspecialchars($row['gender']) . '</span>
                        <span class="mr-2 mb-2">' . htmlspecialchars($row['tanggal_dipost']) . '</span>
                    </p>
                    <p><a href="details.php?id=' . htmlspecialchars($row['id']) . '" class="btn btn-primary custom-btn">View</a></p>
                </div>
            </div>';
    }
} else {
    $output .= '<p>Tidak ada data lowongan kerja.</p>';
}

echo $output;
?>
