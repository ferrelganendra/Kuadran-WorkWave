<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();
include 'koneksi.php';

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    // Redirect ke halaman login jika pengguna belum login
    header("Location: ../users/Dashboard.php");
    exit();
}


// Ambil username dari session
$username = $_SESSION['username'];


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Perusahaan</title>
    <link rel="stylesheet" type="text/css" href="css/aaaa.css">
</head>

<body>

    <div class="navbar">
        <a href="#home">Home</a>
        <a href="#news">News</a>
        <a href="#contact">Contact</a>
        <div>
            <span style="color: #f2f2f2;">Hai <?php echo $username; ?></span>
            <a href="logout.php">Logout</a>
        </div>
    </div>
    <div class="container">
        <div class="package-item purchase-item">
            <img src="img/gold-icon.png" alt="Gold Package Icon" />
            <div class="package-title">Gold</div>
            <div class="package-price">Rp 200.000</div>
            <ul class="package-benefits">
                <li>Paket super efektif</li>
                <li>4 kali publikasi di semua jaringan Lokerjogja.ID (publikasi 2 hari sekali)</li>
                <li>Website & Aplikasi</li>
                <li>Instagram Post & Story</li>
                <li>Highlight Story Favorit</li>
                <li>G Google Jobs & Bisnis</li>
                <li>Facebook Post & Story</li>
                <li>Twitter in Linkedin</li>
                <li>Telegram</li>
                <div class="">
                    <a id="bayarsatu" 
                    href="https://app.sandbox.midtrans.com/payment-links/EPAY-1715331285058" class="purchase-button">Beli sekarang</a>
                </div>
            </ul>
            
        </div>
    
    
        <div class="package-item purchase-item">
            <img src="img/silver-icon.png" alt="Silver Package Icon"/>
            <div class="package-title">Silver</div>
            <div class="package-price">Rp 150.000</div>
            <ul class="package-benefits">
                <li>Kandidat lebih banyak</li>
                <li>3 kali publikasi di semua jaringan Lokerjogja.ID (publikasi 2 hari sekali)</li>
                <li>Website & Aplikasi</li>
                <li>Instagram Post & Story</li>
                <li>G Google Jobs & Bisnis</li>
                <li>Facebook Post & Story</li>
                <li>Twitter in Linkedin</li>
                <li>Telegram</li>
                <div class="">
                    <a id="bayardua"   href="https://app.sandbox.midtrans.com/payment-links/EPAY-1715331331827" class="purchase-button">Beli sekarang</a>
                </div>
            </ul>
        
            
        </div>
    
        <div class="package-item purchase-item">
            <img src="img/bronze-icon.png" alt="Bronze Package Icon" />
            <div class="package-title">Bronze</div>
            <div class="package-price">Rp 100.000 </div>
            <ul class="package-benefits">
                <li>Kandidat lebih banyak</li>
                <li>3 kali publikasi di semua jaringan Lokerjogja.ID (publikasi 2 hari sekali)</li>
                <li>Website & Aplikasi</li>
                <li>Instagram Post & Story</li>
                <li>G Google Jobs & Bisnis</li>
                <li>  <div class="">
                    <a id="bayartiga" href="https://app.sandbox.midtrans.com/payment-links/EPAY-1715331368006" class="purchase-button">Beli sekarang</a>
                </div></li>
            </ul>
          
        </div>
    </div>
    

</body>

</html>
