<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';
include 'php/Admin/prosesFormEvent.php';

// Number of records to display per page
$records_per_page = 6;

// Get the current page number from the URL, if not set default to 1
$current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($current_page - 1) * $records_per_page;
?>
<!doctype html>
<html lang="en">

  <head>
    <title>Work Wave</title>
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

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="css/bursastyle.css">
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
                <a href="utama.php"><strong>Work</strong>Wave</a>
              </div>
            </div>

            <div class="col-9  text-right">
              
              <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li><a href="utama.php" class="nav-link">Utama</a></li>
                  <li><a href="lowongan.html" class="nav-link">Lowongan</a></li>
                  <li><a href="grafik.php" class="nav-link">Grafik</a></li>
                  <li class="active"><a href="bursakerja.php" class="nav-link">Bursa Kerja</a></li>
                  <li><a href="registrasi.php" class="nav-link">Registrasi</a></li>
                  <li><a href="login.php" class="nav-link">Masuk</a></li>
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
              <h1>Bursa <strong>Kerja</strong></h1>
            </div>
          </div>
        </div>
      </div>

      <div class="site-section bg-light">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="post-entry-1 h-100">
                <a href="konten/uiicareer.html" class="thumbnail-link">
                  <img src="konten/img/uiievent.jpeg" alt="Image" class="img-fluid">
                </a>
                <div class="post-entry-1-contents">
                  <h2><a href="konten/uiicareer.html">UII Integrated Career Days Yogyakarta</a></h2>
                  <span class="meta d-inline-block mb-3">Jun 08 - 09, 2024</span>
                  <p>Universitas Islam Indonesia</p>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="post-entry-1 h-100">
                <a href="konten/kalijaga.html" class="thumbnail-link">
                  <img src="konten/img/kalijaga.jpg" alt="Image" class="img-fluid">
                </a>
                <div class="post-entry-1-contents">
                  <h2><a href="konten/kalijaga.html">Kalijaga Job Fair 2024 Yogyakarta</a></h2>
                  <span class="meta d-inline-block mb-3">Mei 21 - 24, 2024</span>
                  <p>UIN Sunan Kalijaga Yogyakarta</p>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="post-entry-1 h-100">
                <a href="konten/jobfairuajy.html" class="thumbnail-link">
                  <img src="konten/img/JOBFAIR.png" alt="Image" class="img-fluid">
                </a>
                <div class="post-entry-1-contents">
                  <h2><a href="konten/jobfairuajy.html">Job Fair Offline UAJY</a></h2>
                  <span class="meta d-inline-block mb-3">14-15 Mei 2024 </span>
                  <p>Universitas Atma Jaya Yogyakarta</p>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="post-entry-1 h-100">
                <a href="konten/jobfaircareer.html" class="thumbnail-link">
                  <img src="konten/img/jobfair1.png" alt="Image" class="img-fluid">
                </a>
                <div class="post-entry-1-contents">
                  <h2><a href="konten/jobfaircareer.html">JOB FAIR CAREER EXPO 2024</a></h2>
                  <span class="meta d-inline-block mb-3">18-19 Juni 2024</span>
                  <p>JOBFAIRCOID Yogyakarta</p>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="post-entry-1 h-100">
                <a href="konten/jobfairvirtual.html" class="thumbnail-link">
                  <img src="konten/img/jobfair2.png" alt="Image" class="img-fluid">
                </a>
                <div class="post-entry-1-contents">
                  <h2><a href="konten/jobfairvirtual.html">Job Fair Virtual</a></h2>
                  <span class="meta d-inline-block mb-3">22-24 Juli 2024 </span>
                  <p>Dinas Sosial Kerja Dan Transmigrasi Kota Yogyakarta</p>
                </div>
              </div>
            </div>
  
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="post-entry-1 h-100">
                <a href="konten/ugmcareer.html" class="thumbnail-link">
                  <img src="konten/img/ugmevent.jpg" alt="Image" class="img-fluid">
                </a>
                <div class="post-entry-1-contents">
                  <h2><a href="konten/ugmcareer.html">UGM Integrated Career Days 2023 Yogyakarta</a></h2>
                  <span class="meta d-inline-block mb-3">November 11 - 12, 2023 </span>
                  <p>Universitas Gajah Mada</p>
                </div>
              </div>
            </div>
          </div>
        </div>
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
    <a href="uploadbk.php" class="fixed-button">Tambah Event</a>

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

  </body>

</html>

