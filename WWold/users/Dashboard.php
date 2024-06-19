<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFO LOKER</title>
    <link rel="stylesheet" type="text/css" href="css/Dashbor.css">
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>

    <?php
    include 'konten/header.php';
    ?>
    <?php
    include 'konten/loker.php';
    ?>

</body>

</html>