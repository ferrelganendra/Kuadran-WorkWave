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

// Panggil koneksi ke database
include "koneksi.php";

// Ambil data admin dari database
$sql = "SELECT Username, Email, Nama FROM admin";
$result = $koneksi->query($sql);

// Inisialisasi pesan status
$status_message = "";

// Jika ada pesan dari halaman sebelumnya (misalnya setelah update atau insert)
if (isset($_SESSION['status_message'])) {
    $status_message = $_SESSION['status_message'];
    unset($_SESSION['status_message']); // Hapus pesan dari session setelah digunakan
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Admin</title>
    <link rel="stylesheet" href="css/StAdminpusing.css">
</head>
<body>

    <div class="container mt-4">
        <header>
            <h1>Dashboard Admin</h1>
            <?php if (!empty($status_message)) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo htmlspecialchars($status_message); ?>
                </div>
            <?php endif; ?>
        </header>
        <!-- Navigasi -->
        <div class="navigation">
            <a class="btn btn-primary" href="dataPerusahaan.php">Perusahaan</a>
            <a class="btn btn-primary" href="dataAI.php">CHAT AI</a>
            <a class="btn btn-primary" href="dataAdmin.php">Admin</a>
            <a class="btn btn-primary" href="dataEvent.php">Job Fair</a>
            <a class="btn btn-danger" href="logout.php">Keluar</a>
        </div>

        <!-- Tabel daftar admin -->
        <section>
            <h2>Data Admin</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Nama</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['Username']); ?></td>
                            <td><?php echo htmlspecialchars($row['Email']); ?></td>
                            <td><?php echo htmlspecialchars($row['Nama']); ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </div>

</body>
</html>
