<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include "koneksi.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Periksa apakah ada pesan sukses pendaftaran
if (isset($_SESSION['register_success']) && $_SESSION['register_success'] === true) {
    echo "<script>alert('Pendaftaran berhasil! Verifikasi akun sedang diproses. Harap menunggu.');</script>";
    // Hapus pesan sukses dari sesi
    unset($_SESSION['register_success']);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INFO LOKER</title>
    <link rel="stylesheet" type="text/css" href="css/Dashbor.css">
    <script src="js/ScDashboard.js"></script>
    <script src="https://unpkg.com/scrollreveal"></script>
</head>

<body>
    <header>
        <img id='img-click' src="users/assets/reject.png">
        <ul>
            <li><button id="home" onclick="keevent()">Event</button></li>
            <li><button id="home" onclick="keloker()">LOKER</button></li>
            <li><button onclick="kelogin()">Login</button></li>
            <li><button id="registerbaru" onclick="registerhead()">Register</button></li>
        </ul>
    </header>

    <div id="masking" class="mask"></div>

    <!-- LOGIN -->
    <div id="log" class="form">
        <form method="post" action="login.php">
            <img onclick="exit()" src="css/assets/reject.png">
            <h3>Please Sign In</h3>
            <input name="log-username" type="text" placeholder="Username"><br>
            <input name="log-password" type="password" placeholder="Password"><br>
            <input id="login" type="submit" value="Login"><br>
        </form>
    </div>

    

<!-- REGISTER -->
    <div id="reg-info-perusahaan" class="form">
        <form method="post" action="register.php">
            <img onclick="exitRegister()" src="css/assets/reject.png">
            <h3>Please Sign Up</h3>
            <input name="nama_perusahaan" type="text" placeholder="Nama Perusahaan"><br>
            <input name="industri" type="text" placeholder="Industri"><br>
            <textarea name="deskripsi_perusahaan" placeholder="Deskripsi Perusahaan"></textarea><br>
            <input name="media_sosial" type="text" placeholder="Media Sosial"><br>
            <input name="website" type="text" placeholder="Website"><br>
            <textarea name="alamat_perusahaan" placeholder="Alamat Perusahaan"></textarea><br>
            <input name="logo_perusahaan" type="text" placeholder="Logo Perusahaan"><br>
            <input name="username" type="text" placeholder="Username"><br>
            <input name="password" type="password" placeholder="Password"><br>
            <input id="register" onclick="mendaftar()" type="submit" value="Daftar"><br>
        </form>
    </div>


    <div id="loker">
        <?php
        // Include the connection file to establish a database connection
        include 'koneksi.php';

        // Check if the connection is successful
        if ($koneksi) {
            // Prepare statement to retrieve data from the 'loker' table
            $stmt = $koneksi->prepare("SELECT * FROM `loker`");

            // Check if the statement preparation was successful
            if ($stmt) {
                // Execute the prepared statement
                $stmt->execute();

                // Get the result set from the executed statement
                $result = $stmt->get_result();

                // Check if there are rows in the result set
                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        // Display the data in card format
                        echo '<div class="card mb-3">';
                        echo '<div class="row g-0">';
                        echo '<div class="col-md-4">';
                        echo '</div>';
                        echo '<div class="col-md-8">';
                        echo '<div class="card-body">';
                        echo '<h5 class="card-title">' . $row["posisi"] . '</h5>';
                        echo '<p class="card-text">' . $row["syarat_pekerjaan"] . '</p>';
                        echo '<span class="badge rounded-pill text-bg-secondary">' . $row["besaran_gaji"] . '</span>';
                        echo '</div>';
                        echo '<div class="card-footer text-end text-muted">Last updated today.</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    }
                } else {
                    echo "Tidak ada data lowongan kerja.";
                }

                // Close the prepared statement
                $stmt->close();
            } else {
                echo "Error in preparing SQL statement.";
            }

            // Close the database connection
            $koneksi->close();
        } else {
            echo "Error in establishing database connection.";
        }
        ?>
    </div>

    
</body>

</html>