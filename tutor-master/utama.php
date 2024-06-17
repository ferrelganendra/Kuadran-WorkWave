<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();


include 'koneksi.php';

// Fetch job categories
$query = "SELECT id, nama_kategori FROM kategori_pekerjaan";
$result = $koneksi->query($query);
$categories = $result->fetch_all(MYSQLI_ASSOC);
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
    <link rel="stylesheet" href="css/style.css">
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
                <a href="utama.html"><strong>Work Wave</strong></a>
              </div>
            </div>

            <div class="col-9  text-right">
              
              <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto ">
                  <li class="active"><a href="utama.html" class="nav-link">Utama</a></li> 
                  <li><a href="grafik.php" class="nav-link">Grafik</a></li>
                  <li><a href="bursakerja.html" class="nav-link">Bursa Kerja</a></li>
                  <li><a href="registrasi.html" class="nav-link">Registrasi</a></li>
                  <li><a href="login.html" class="nav-link">Masuk</a></li>
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
              <h1><strong>Work</strong>Wave</h1>
            </div>
          </div>
        </div>
      </div>

      <div class="site-section bg-light pb-0">
        <div class="container">
          <div class="row align-items-stretch overlap">
            <div class="col-lg-8">
              <div class="box h-100">
              <form action="#" class="d-flex search-form" id="basic-search-form">
        <input type="search" class="form-control mr-2" id="keyword" placeholder="Cari Pekerjaan">
    </form>
    <br>
    <div id="search-results"></div>
    <div class="form-container">
        <form id="advanced-search-form" method="post">
            <div class="form-group">
                <label for="kategori">Jenis Pekerjaan:</label>
                <select id="kategori" name="kategori">
                    <option value="">Pilih Kategori</option>
                    <?php
                    // Assume $categories is populated from the database
                    include 'get_categories.php'; // This should set $categories
                    foreach ($categories as $category): ?>
                        <option value="<?= htmlspecialchars($category['id']) ?>"><?= htmlspecialchars($category['nama_kategori']) ?></option>
                    <?php endforeach; ?>
                </select>
                <label for="status">Status Kerja:</label>
                <select id="status" name="status">
                    <option value="">Pilih Status</option>
                    <option value="Full-time">Full-time</option>
                    <option value="Part-time">Part-time</option>
                    <option value="Kontrak">Kontrak</option>
                </select>
                <input type="submit" class="btn btn-primary px-4" value="Cari">
            </div>
        </form>
    </div>
    </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="site-section bg-light">
        <div class="container">
          <div class="row mb-5 align-items-center">
          </div>
          <div class="row">
            <div class="col-12">
              <div class="heading mb-4">
                <h2>Rekomendasi Lowongan Pekerjaan</h2>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="d-flex tutorial-item mb-4">
                <div class="img-wrap">
                  <a href="#"><img src="images/INDO BERUANG.png" alt="Image" class="img-fluid"></a>
                </div>
                <div>
                  <h3><a href="#">TELEMARKETING</a></h3>
                  <p>Indo Beruang sedang membuka lowongan kerja untuk posisi sebagai Telemarketing</p>
                
                  <p class="meta">
                    <span class="mr-2 mb-2">1hr 24m</span>
                    <span class="mr-2 mb-2">Advanced</span>
                    <span class="mr-2 mb-2">Jun 18, 2024</span>
                  </p>
                  
                  <p><a href="indoberuang.html" class="btn btn-primary custom-btn">View</a></p>
                </div>
              </div>

              <div class="d-flex tutorial-item mb-4">
                <div class="img-wrap">
                  <a href="#"><img src="images/bowling.png" alt="Image" class="img-fluid"></a>
                </div>
                <div>
                  <h3><a href="#">Gardener & Cleaning Service</a></h3>
                  <p>Bowl-Ling Fruit Bar & Kitchen merupakan resto dengan menu ikonik sup 
                    buah di Indonesia dan berkembang menyajikan berbagai makanan utama 
                    (tradisional food, western food dan oriental food).</p>

                  <p class="meta">
                    <span class="mr-2 mb-2">3hr 21m</span>
                    <span class="mr-2 mb-2">Advanced</span>
                    <span class="mr-2 mb-2">Jun 19, 2024</span>
                  </p>
                  
                  <p><a href="bowling.html" class="btn btn-primary custom-btn">View</a></p>
                </div>
              </div>

              <div class="d-flex tutorial-item mb-4">
                <div class="img-wrap">
                  <a href="#"><img src="images/cabinhotel.png" alt="Image" class="img-fluid"></a>
                </div>
                <div>
                  <h3><a href="#">Staff Front Office - House Keeping</a></h3>
                  <p>The Cabin Hotel merupakan perusahaan penyedia jasa akomodasi dan management 
                    hotel yang terus berekspansi dibeberapa kota. Hingga saat ini kami memiliki total 17 cabang.</p>

                  <p class="meta">
                    <span class="mr-2 mb-2">11hr 14m</span>
                    <span class="mr-2 mb-2">Advanced</span>
                    <span class="mr-2 mb-2">Jun 19, 2024</span>
                  </p>
                  <p><a href="cabinhotel.html" class="btn btn-primary custom-btn">View</a></p>
                </div>
              </div>

              <div class="d-flex tutorial-item mb-4">
                <div class="img-wrap">
                  <a href="#"><img src="images/laundry.png" alt="Image" class="img-fluid"></a>
                </div>
                <div>
                  <h3><a href="#">Karyawati Laundry</a></h3>
                  <p>Prime Wash Laundry Management adalah Usaha Layanan Jasa Laundry yang sedang berkembang 
                     di Area Yogyakarta, melayani berbagai kebutuhan jasa laundry. Saat ini membuka lowongan 
                     kerja untuk posisi sebagai Karyawati Laundry.</p>
                  
                  <p class="meta">
                    <span class="mr-2 mb-2">12hr 24m</span>
                    <span class="mr-2 mb-2">Advanced</span>
                    <span class="mr-2 mb-2">Jun 20, 2024</span>
                  </p>
                  <p><a href="laundry.html" class="btn btn-primary custom-btn">View</a></p>
                </div>
              </div>

              <div class="d-flex tutorial-item mb-4">
                <div class="img-wrap">
                  <a href="#"><img src="images/apotek.png" alt="Image" class="img-fluid"></a>
                </div>
                <div>
                  <h3><a href="#">Account Executive (Sales Staff)</a></h3>
                  <p>PT. Indah Medika Indonesia merupakan sebuah perusahaan yang 
                     sedang berkembang dan memiliki beberapa unit bisnis.</p>
                  
                  <p class="meta">
                    <span class="mr-2 mb-2">10hr 24m</span>
                    <span class="mr-2 mb-2">Advanced</span>
                    <span class="mr-2 mb-2">Jun 21, 2024</span>
                  </p>
                  <p><a href="apotek.html" class="btn btn-primary custom-btn">View</a></p>
                </div>
              </div>


              <div class="custom-pagination">
                <ul class="list-unstyled">
                  <li><a href="#"><span>1</span></a></li>
                  <li><span>2</span></li>
                  <li><a href="#"><span>3</span></a></li>
                  <li><a href="#"><span>4</span></a></li>
                  <li><a href="#"><span>5</span></a></li>
                </ul>
              </div>
            </div>


            <div class="col-lg-4">
              <h4>Bursa Kerja</h4>
              <div class="box-side mb-3">
                <a href="#"><img src="images/JOBFAIR.png" alt="jobfair" class="img-fluid"></a>
                <h3><a href="bursakerja.html">Job Fair Offline UAJY</a></h3>
              </div>  
              <div class="box-side mb-3">
                <a href="#"><img src="images/jobfair1.png" alt="jobfair" class="img-fluid"></a>
                <h3><a href="bursakerja.html">JOBFAIR CAREER EXPO 2024</a></h3>
              </div>  
              <div class="box-side">
                <a href="#"><img src="images/jobfair2.png" alt="jobfair" class="img-fluid"></a>
                <h3><a href="bursakerja.html">Job Fair Virtual</a></h3>
              </div>  
            </div>
          </div>
        </div>
      </div>
      
      <div class="site-section bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7 text-center mb-5">
            <div class="heading">
              <span class="caption">Testimonials</span>
              <h2>User Reviews</h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <h3 class="h5">Website Pencari Kerja Terbaik di Yogyakarta!</h3>
              <div>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star-o text-warning"></span>
              </div>
              <blockquote class="mb-4">
                <p>"Memiliki banyak lowongan kerja dari berbagai perusahaan ternama, tampilan website mudah digunakan dan informatif, tersedia fitur filter yang lengkap untuk mempermudah pencarian lowongan kerja, proses pendaftaran dan lamaran kerja mudah dilakukan."</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="images/person_1.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Joko</span>
                  <span>Owner, Ford</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <h3 class="h5">Mantul!</h3>
              <div>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star-o text-warning"></span>
              </div>
              <blockquote class="mb-4">
                <p>"Menyediakan informasi gaji dan benefit yang transparan, memiliki fitur untuk pengembangan karir seperti bursa kerja dan konsultasi, tampilan website modern dan profesional."</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="images/person_2.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Citra</span>
                  <span>Traveler</span>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-4 mb-4 mb-lg-0">
            <div class="testimonial-2">
              <h3 class="h5">Terima Kasih WorkWave!</h3>
              <div>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star text-warning"></span>
                <span class="icon-star-o text-warning"></span>
              </div>
              <blockquote class="mb-4">
                <p>"Memiliki jumlah lowongan kerja yang sangat banyak dari berbagai sumber, tampilan website sederhana dan mudah dinavigasi, tersedia fitur filter yang lengkap dan sistem pencocokan lowongan kerja dengan profil pengguna, proses pendaftaran dan lamaran kerja mudah dilakukan."</p>
              </blockquote>
              <div class="d-flex v-card align-items-center">
                <img src="images/person_3.jpg" alt="Image" class="img-fluid mr-3">
                <div class="author-name">
                  <span class="d-block">Sari</span>
                  <span >Customer</span>
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
                  <li><a href="bursakerja.html">Bursa Kerja</a></li>
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
    <script src="js/search.js"></script>
    <script src="js/main.js"></script>
  </body>

</html>

