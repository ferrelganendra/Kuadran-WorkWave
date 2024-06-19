<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Periksa apakah admin sudah login
if (!isset($_SESSION['admin_username'])) {
    // Redirect ke halaman login jika admin belum login
    header("Location: loginAdmin.php");
    exit();
}

// Ambil nama admin dari session
$admin_username = $_SESSION['admin_username'];

// Panggil koneksi ke database
include "koneksi.php";

// Query untuk mengambil nama admin dari tabel admin
$sql = "SELECT Nama FROM admin WHERE Username = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("s", $admin_username);
$stmt->execute();
$stmt->bind_result($admin_nama);
$stmt->fetch();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/StWw.css">
</head>
<body>

    <div class="container mt-4">
        <header>
            <h1>Selamat datang, Admin <?php echo htmlspecialchars($admin_nama); ?></h1>
        </header>
        
        <section>
            <p>Ruang Kerja Kamu.</p>
            <div class="navigation">
                <a class="btn btn-primary" href="dataPerusahaan.php">Perusahaan</a>
                <a class="btn btn-primary" href="dataAI.php">CHAT AI</a>
                <a class="btn btn-primary" href="dataAdmin.php">Admin</a>
                <a class="btn btn-primary" href="dataEvent.php">Job Fair</a>
                <a class="btn btn-danger" href="logout.php">Keluar</a>
            </div>
        </section>
    </div>

</body>
</html>
