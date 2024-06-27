<?php
// Mulai session
session_start();

// Periksa apakah perusahaan sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Dapatkan ID perusahaan dari session
$perusahaan_id = $_SESSION['username']; // pastikan ini sesuai dengan session yang Anda set

// Dapatkan paket dari query string
$package = isset($_GET['package']) ? $_GET['package'] : '';

// Include koneksi ke database
include 'koneksi.php';

// Ambil kategori pekerjaan dari database
$query = "SELECT * FROM kategori_pekerjaan";
$result = mysqli_query($koneksi, $query);
$kategori_pekerjaan = [];
while ($row = mysqli_fetch_assoc($result)) {
    $kategori_pekerjaan[] = $row;
}

// Tutup koneksi database
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Lowongan Pekerjaan</title>
    <link rel="stylesheet" type="text/css" href="css/tambah.css">
</head>
<body>
    <h1>Tambah Lowongan Pekerjaan</h1>
    <p>Paket yang dipilih: <strong><?php echo htmlspecialchars($package); ?></strong></p>
    <form action="prosesTambahLowongan.php" method="POST">
        <input type="hidden" name="package" value="<?php echo htmlspecialchars($package); ?>">
        <div>
            <label for="kategori_pekerjaan">Kategori Pekerjaan:</label>
            <select id="kategori_pekerjaan" name="kategori_pekerjaan_id" required>
                <?php foreach ($kategori_pekerjaan as $kategori): ?>
                    <option value="<?php echo $kategori['id']; ?>"><?php echo htmlspecialchars($kategori['nama_kategori']); ?></option>
                <?php endforeach; ?>
            </select>L
        </div>
        <div>
            <label for="posisi">Posisi:</label>
            <input type="text" id="posisi" name="posisi" required>
        </div>
        <div>
            <label for="tingkat_pendidikan">Tingkat Pendidikan:</label>
            <input type="text" id="tingkat_pendidikan" name="tingkat_pendidikan" required>
        </div>
        <div>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
                <option value="Semua">Semua</option>
            </select>
        </div>
        <div>
            <label for="status_kerja">Status Kerja:</label>
            <select id="status_kerja" name="status_kerja" required>
                <option value="Full-time">Full-time</option>
                <option value="Part-time">Part-time</option>
                <option value="Kontrak">Kontrak</option>
            </select>
        </div>
        <div>
            <label for="besaran_gaji">Besaran Gaji:</label>
            <input type="number" id="besaran_gaji" name="besaran_gaji" required>
        </div>
        <div>
            <label for="lokasi_bekerja">Lokasi Bekerja:</label>
            <input type="text" id="lokasi_bekerja" name="lokasi_bekerja" required>
        </div>
        <div>
            <label for="syarat_pekerjaan">Syarat Pekerjaan:</label>
            <textarea id="syarat_pekerjaan" name="syarat_pekerjaan" required></textarea>
        </div>
        <button type="submit">Tambah Lowongan</button>
    </form>
</body>
</html>
