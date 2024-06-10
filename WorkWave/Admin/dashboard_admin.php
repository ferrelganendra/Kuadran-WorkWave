<?php
// Start session
session_start();

// Periksa apakah admin sudah login
if (!isset($_SESSION['admin_username'])) {
    // Redirect ke halaman login jika admin belum login
    header("Location: login.php");
    exit();
}

// Panggil koneksi ke database
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/StAdm.css">
</head>
<body>
    <div class="container">
        <nav>
            <div class="menu-toggle" onclick="toggleMenu()">&#9776;</div>
            <ul class="menu">
                <li><a href="dataPerusahaan.php">Perusahaan</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>

        <section>
            <header>
                <h1>Selamat datang, Anda telah masuk sebagai admin.</h1>
            </header>
            <!-- Konten admin di sini -->
            <p>Ini adalah halaman admin Anda.</p>
        </section>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
