<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

include 'konten/header.php';
include 'php/Admin/prosesFormEvent.php';
include 'konten/isiEvent.php';
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
    <link rel="stylesheet" href="css/style.css">
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
                  <li class="active"><a href="blog.html" class="nav-link">Bursa Kerja</a></li>
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
      <button type="button" class="btn btn-primary d-flex justify-content-center" data-toggle="modal" data-target="#buatEventModal">Buat Event Baru</button>
        <div class="row">
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="single.html" class="thumbnail-link">
                <img src="images/JOBFAIR.png" alt="Image"
                 class="img-fluid">
              </a>

              <div class="post-entry-1-contents">  
                <h2><a href="single.html">Job Fair Offline UAJY</a></h2>
                <span class="meta d-inline-block mb-3">14-15 Mei 2024 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                <p>Universitas Atma Jaya Yogyakarta</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="single.html" class="thumbnail-link">
                <img src="images/jobfair1.png" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <h2><a href="single.html">JOBAIR CAREER EXPO 2024</a></h2>
                <span class="meta d-inline-block mb-3">18-19 Juni 2024 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                <p>JOBFAIRCOID Yogyakarta</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="single.html" class="thumbnail-link">
                <img src="images/jobfair2.png" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <h2><a href="single.html">Job Fair Virtual</a></h2>
                <span class="meta d-inline-block mb-3">22-24 Juli 2024 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                <p>Dinas Sosial Kerja Dan Transmigrasi Kota Yogyakarta</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="single.html" class="thumbnail-link">
                <img src="images/img_1.jpg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <h2><a href="single.html">Microsoft Azure Synapse for Developers</a></h2>
                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
              </div>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="single.html" class="thumbnail-link">
                <img src="images/img_2.jpg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <h2><a href="single.html">Microsoft Azure Synapse for Developers</a></h2>
                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="post-entry-1 h-100">
              <a href="single.html" class="thumbnail-link">
                <img src="images/img_3.jpg" alt="Image"
                 class="img-fluid">
              </a>
              <div class="post-entry-1-contents">
                
                <h2><a href="single.html">Microsoft Azure Synapse for Developers</a></h2>
                <span class="meta d-inline-block mb-3">July 17, 2019 <span class="mx-2">by</span> <a href="#">Admin</a></span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolores eos soluta, dolore harum molestias consectetur.</p>
              </div>
            </div>
          </div>

        </div>

        <div class="row">
          <div class="col-5">
            <div class="custom-pagination">
              <a href="#">1</a>
              <span>2</span>
              <a href="#">3</a>
              <a href="#">4</a>
              <a href="#">5</a>
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
                  <li><a href="registrasi.php">Registrasi</a></li>
                  <li><a href="login.php">Masuk</a></li>
                  <li><a href="#">Beli paket</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        

    </div>

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
    <script src="js/event.js"></script>
    <script src="js/main.js"></script>

    <!-- Modal -->
<div class="modal fade" id="buatEventModal" tabindex="-1" role="dialog" aria-labelledby="buatEventModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="buatEventModalLabel">Buat Event Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form action="prosesFormEvent.php" method="POST" enctype="multipart/form-data">
  <div class="form-group">
    <label for="nama_acara">Nama Acara:</label>
    <input type="text" class="form-control" id="nama_acara" name="nama_acara" required>
  </div>
  <div class="form-group">
    <label for="deskripsi_acara">Deskripsi Acara:</label>
    <textarea class="form-control" id="deskripsi_acara" name="deskripsi_acara" rows="3" required></textarea>
  </div>
  <div class="form-group">
    <label for="tanggal_acara">Tanggal Acara:</label>
    <input type="date" class="form-control" id="tanggal_acara" name="tanggal_acara" required>
  </div>
  <div class="form-group">
    <label for="waktu_acara">Waktu Acara:</label>
    <input type="time" class="form-control" id="waktu_acara" name="waktu_acara" required>
  </div>
  <div class="form-group">
    <label for="tempat_acara">Tempat Acara:</label>
    <input type="text" class="form-control" id="tempat_acara" name="tempat_acara" required>
  </div>
  <div class="form-group">
    <label for="kategori_acara">Kategori Acara:</label>
    <input type="text" class="form-control" id="kategori_acara" name="kategori_acara" required>
  </div>
  <div class="form-group">
    <label for="biaya_pendaftaran">Biaya Pendaftaran:</label>
    <input type="number" step="0.01" class="form-control" id="biaya_pendaftaran" name="biaya_pendaftaran" required>
  </div>
  <div class="form-group">
    <label for="kontak_penyelenggara">Kontak Penyelenggara:</label>
    <input type="text" class="form-control" id="kontak_penyelenggara" name="kontak_penyelenggara" required>
  </div>
  <div class="form-group">
    <label for="url_pendaftaran">URL Pendaftaran:</label>
    <input type="text" class="form-control" id="url_pendaftaran" name="url_pendaftaran" required>
  </div>
  <div class="form-group">
    <label for="instruksi_tambahan">Instruksi Tambahan:</label>
    <textarea class="form-control" id="instruksi_tambahan" name="instruksi_tambahan" rows="3"></textarea>
  </div>
  <div class="form-group">
    <label for="foto_poster">Foto/Poster Acara:</label>
    <input type="file" class="form-control-file" id="foto_poster" name="foto_poster">
  </div>
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" id="submitEvent">Simpan</button>
      </div>
    </div>
  </div>
</div>
  </body>
</html>