<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Rekomendasi Loker</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <h1>Hasil Rekomendasi Loker</h1>
    <p>
        <?php
        if (isset($_SESSION['resultGroq'])) {
            echo nl2br($_SESSION['resultGroq']);
            unset($_SESSION['resultGroq']);
        } else {
            echo "No recommendations available.";
        }
        ?>
    </p>
    <a href="index.php">Kembali</a>
</body>
</html>
