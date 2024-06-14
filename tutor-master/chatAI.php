<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
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
    <style>
      .chat-container {
        position: fixed;
        bottom: 20px;
        right: 20px;
        width: 300px;
        border: 1px solid #ccc;
        border-radius: 10px;
        background-color: white;
        box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        z-index: 1000;
      }
      .chat-header {
        background-color: #007bff;
        color: white;
        padding: 10px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
      }
      .chat-body {
        height: 300px;
        overflow-y: auto;
        padding: 10px;
      }
      .chat-input {
        padding: 10px;
        border-top: 1px solid #ccc;
      }
      .chat-input input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 5px;
      }
      .message {
        margin: 10px 0;
      }
      .message.user {
        text-align: right;
      }
      .message.ai {
        text-align: left;
      }
    </style>
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

            <div class="col-9 text-right">
              <span class="d-inline-block d-lg-none"><a href="#" class="site-menu-toggle js-menu-toggle py-5"><span class="icon-menu h3 text-black"></span></a></span>

              <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
                <ul class="site-menu main-menu js-clone-nav ml-auto">
                  <li class="active"><a href="utama.html" class="nav-link">Utama</a></li>
                  <li><a href="lowongan.html" class="nav-link">Lowongan</a></li>
                  <li><a href="grafik.php" class="nav-link">Grafik</a></li>
                  <li><a href="bursakerja.html" class="nav-link">Event</a></li>
                  <li><a href="registrasi.html" class="nav-link">Registrasi</a></li>
                  <li><a href="login.html" class="nav-link">Masuk</a></li>
                </ul>
              </nav>
            </div>

          </div>
        </div>

      </header>

      <!-- Chat Feature -->
      <div class="chat-container" id="chat-container">
        <div class="chat-header">
          <h5>Chat with AI</h5>
        </div>
        <div class="chat-body" id="chat-body">
          <!-- Chat messages will appear here -->
        </div>
        <div class="chat-input">
          <input type="text" id="chat-input" placeholder="Type a message...">
        </div>
      </div>

      <script>
        $(document).ready(function() {
          const apiKey = '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';
          
          $('#chat-input').on('keypress', function(e) {
            if(e.which === 13) {
              const message = $(this).val();
              $(this).val('');
              
              $('#chat-body').append('<div class="message user">' + message + '</div>');

              $.ajax({
                url: 'https://api.groq.com/v1/messages',
                method: 'POST',
                headers: {
                  'Authorization': 'Bearer ' + apiKey,
                  'Content-Type': 'application/json'
                },
                data: JSON.stringify({ text: message }),
                success: function(response) {
                  $('#chat-body').append('<div class="message ai">' + response.text + '</div>');
                },
                error: function() {
                  $('#chat-body').append('<div class="message ai">Error: Unable to connect to AI service.</div>');
                }
              });
            }
          });
        });
      </script>

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
    <script src="js/main.js"></script>
  </body>

</html>
