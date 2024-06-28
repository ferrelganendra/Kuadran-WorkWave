<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include 'koneksi.php';

$user_id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
?>
<!doctype html>
<html lang="en">
  <head>
    <title>WorkWave</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="fonts/brand/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.fancybox.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/stylepaket.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="SB-Mid-client-9zm0L8TLN8ymMiJv"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  </head>

  <body>
    <div class="site-wrap" id="home-section">
      <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
          <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
          </div>
        </div>
        <div class="site-mobile-menu-body"></div>
      </div>

      <header class="site-navbar light site-navbar-target" role="banner">
        <div class="container">
          <div class="row align-items-center position-relative">
            <div class="col-3">
              <div class="site-logo">
                <a href="utama.php"><strong>W</strong>ork<strong>W</strong>ave</a>
              </div>
            </div>
            <div class="col-9  text-right">
              <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>
              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li><a href="utama.php" class="nav-link">Utama</a></li>
                  <li><a href="grafik.php" class="nav-link">Grafik</a></li>
                  <li><a href="bursakerja.php" class="nav-link">Bursa Kerja</a></li>
                  <?php if (!$user_id): ?>
                    <li><a href="registrasi.php" class="nav-link">Registrasi</a></li>
                    <li><a href="login.php" class="nav-link">Masuk</a></li>
                  <?php endif; ?>
                  <?php if ($user_id): ?>
                    <li><a href="lowongan.php" class="nav-link">Lowongan</a></li>
                    <li class="active"><a href="paket.php" class="nav-link">Beli Paket</a></li>
                    <li><a href="profil.php" class="nav-link">Profil</a></li>
                    <li><a href="logout.php" class="nav-link">Keluar</a></li>
                  <?php endif; ?>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </header>

      <div class="site-section-cover overlay" style="background-image: url('images/hero_bg.jpg');">
        <div class="container">
          <div class="row align-items-center justify-content-center">
            <div class="col-lg-10 text-center">
              <h1>Paket <strong>Lowongan Pekerjaan</strong></h1>
            </div>
          </div>
        </div>
      </div>

      <div class="container1">
        <div class="package-item purchase-item">
          <div class="title"><img src="images/gold-icon.png" alt="Gold Package Icon" /></div>
          <div class="package-title">Gold</div>
          <div class="package-price">Rp200.000</div>
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
          </ul>
          <div class="">
            <button id="bayarsatu" type="button" class="purchase-button" data-package-id="gold">Beli sekarang</button>
          </div>
        </div>

        <div class="package-item purchase-item">
          <div class="title"><img src="images/silver-icon.png" alt="Silver Package Icon"/></div>
          <div class="package-title">Silver</div>
          <div class="package-price">Rp150.000</div>
          <ul class="package-benefits">
            <li>Kandidat lebih banyak</li>
            <li>3 kali publikasi di semua jaringan Lokerjogja.ID (publikasi 2 hari sekali)</li>
            <li>Website & Aplikasi</li>
            <li>Instagram Post & Story</li>
            <li>G Google Jobs & Bisnis</li>
            <li>Facebook Post & Story</li>
            <li>Twitter in Linkedin</li>
            <li>Telegram</li>
          </ul>
          <div class="">
            <button id="bayardua" type="button" class="purchase-button" data-package-id="silver">Beli sekarang</button>
          </div>
        </div>

        <div class="package-item purchase-item">
          <div class="title"><img src="images/bronze-icon.png" alt="Bronze Package Icon"/></div>
          <div class="package-title">Bronze</div>
          <div class="package-price">Rp100.000</div>
          <ul class="package-benefits">
            <li>Kandidat lebih banyak</li>
            <li>3 kali publikasi di semua jaringan Lokerjogja.ID (publikasi 2 hari sekali)</li>
            <li>Website & Aplikasi</li>
            <li>Instagram Post & Story</li>
            <li>G Google Jobs & Bisnis</li>
          </ul>
          <div class="">
            <button id="bayartiga" type="button" class="purchase-button" data-package-id="bronze">Beli sekarang</button>
          </div>
        </div>
      </div>

      <footer class="site-footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-3">
              <h2 class="footer-heading mb-4">WorkWave</h2>
              <p>WorkWave adalah platform interaktif terdepan yang memudahkan pencarian kerja, perekrutan, dan partisipasi komunitas di Yogyakarta. </p>
              <ul class="list-unstyled social">
                <li><a href="#"><span class="icon-facebook"></span></a></li>
                <li><a href="#"><span class="icon-instagram"></span></a></li>
                <li><a href="#"><span class="icon-twitter"></span></a></li>
                <li><a href="#"><span class="icon-linkedin"></span></a></li>
              </ul>
            </div>
            <div class="col-lg-8 ml-auto">
              <div class="row">
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4"></h2>
                  <ul class="list-unstyled">
                    <li><a href="utama.php">Lowongan Pekerjaan</a></li>
                    <li><a href="grafik.php">Grafik</a></li>
                  </ul>
                </div>
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4"></h2>
                  <ul class="list-unstyled">
                    <li><a href="blog.html">Bursa Kerja</a></li>
                    <li><a href="#">Partisipasi Bursa Kerja</a></li>
                  </ul>
                </div>
                <div class="col-lg-3">
                  <h2 class="footer-heading mb-4"></h2>
                  <ul class="list-unstyled">
                    <li><a href="registrasi.html">Registrasi</a></li>
                    <li><a href="login.html">Masuk</a></li>
                    <li><a href="#">Beli paket</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>

      <script src="js/jquery-3.3.1.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>
      <script src="js/jquery.sticky.js"></script>
      <script src="js/jquery.waypoints.min.js"></script>
      <script src="js/jquery.animateNumber.min.js"></script>
      <script src="js/jquery.fancybox.min.js"></script>
      <script src="js/jquery.easing.1.3.js"></script>
      <script src="js/bootstrap-datepicker.min.js"></script>
      <script src="js/aos.js"></script>
      <script src="js/main.js"></script>
      <script>
        $(document).ready(function() {
    $('.purchase-button').click(function() {
        var packageId = $(this).data('package-id');
        $.ajax({
            url: 'midtrans/vendor/midtrans/midtrans-php/Midtrans/payment.php', // Update to the correct path
            type: 'POST',
            data: {
                package_id: packageId
            },
            success: function(response) {
                console.log("Response from payment.php:", response);
                if (response.snapToken) {
                    snap.pay(response.snapToken, {
                        onSuccess: function(result){
                            alert("payment success!"); console.log(result);
                            window.location.href = 'lowongan.php';
                        },
                        onPending: function(result){
                            alert("waiting for your payment!"); console.log(result);
                        },
                        onError: function(result){
                            alert("payment failed!"); console.log(result);
                        },
                        onClose: function(){
                            alert('you closed the popup without finishing the payment');
                        }
                    });
                } else {
                    alert("Error: " + response.error);
                }
            },
            error: function(xhr, status, error) {
                console.error("AJAX Error:", status, error);
                alert("An AJAX error occurred. Please try again.");
            }
        });
    });
});

      </script>
  </body>
</html>
