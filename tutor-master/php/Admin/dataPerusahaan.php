<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
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
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="css/StData.css">
</head>
<body>
    <h1>Dashboard Admin</h1>
    <h2>Info Login</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Perusahaan</th>
                <th>Industri</th>
                <th>Username</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Panggil koneksi ke database
            include "koneksi.php";

            // Query SQL untuk mendapatkan data pengguna
            $sql = "SELECT * FROM users";
            $result = mysqli_query($koneksi, $sql);

            // Periksa apakah ada data pengguna
            if (mysqli_num_rows($result) > 0) {
                // Loop untuk menampilkan data pengguna dalam tabel
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['nama_perusahaan'] . "</td>";
                    echo "<td>" . $row['industri'] . "</td>";
                    echo "<td>" . $row['username'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td>";
                    echo "<button class='btn btn-accept' onclick='acceptUser(" . $row['id'] . ")'>Accept</button>";
                    echo "<button class='btn btn-reject' onclick='rejectUser(" . $row['id'] . ")'>Reject</button>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data pengguna</td></tr>";
            }

            // Tutup koneksi database
            mysqli_close($koneksi);
            ?>
        </tbody>
    </table>
    <h2>Data Perusahaan</h2>
    <table>
  <thead>
    <tr>
      <th>ID</th>
      <th>Nama Perusahaan</th>
      <th>Industri</th>
      <th>Deskripsi Perusahaan</th>
      <th>Media Sosial</th>
      <th>Website</th>
      <th>Alamat Perusahaan</th>
      <th>Logo Perusahaan</th>
    </tr>
  </thead>
  <tbody>
    <!-- PHP Script to Fetch and Display Data -->
    <?php
    // Sambungkan ke database
    include "koneksi.php";

    // Query untuk mengambil semua data dari tabel users
    $query = "SELECT * FROM users";
    $result = mysqli_query($koneksi, $query);

    // Loop through each row and display data in table rows
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>";
      echo "<td>" . $row['id'] . "</td>";
      echo "<td>" . $row['nama_perusahaan'] . "</td>";
      echo "<td>" . $row['industri'] . "</td>";
      echo "<td>" . $row['deskripsi_perusahaan'] . "</td>";
      echo "<td>" . $row['media_sosial'] . "</td>";
      echo "<td>" . $row['website'] . "</td>";
      echo "<td>" . $row['alamat_perusahaan'] . "</td>";
      echo "<td>" . $row['logo_perusahaan'] . "</td>";
      echo "</tr>";
    }
    ?>
  </tbody>
</table>


    <script>
        // Fungsi untuk menerima pengguna
        function acceptUser(userId) {
            if (confirm('Are you sure to accept this user?')) {
                // Kirim permintaan AJAX untuk memperbarui status pengguna menjadi "diterima"
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Refresh halaman setelah berhasil
                        window.location.reload();
                    }
                };
                xhttp.open("POST", "prosesTerima.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("userId=" + userId);
            }
        }

        // Fungsi untuk menolak pengguna
        function rejectUser(userId) {
            if (confirm('Are you sure to reject this user?')) {
                // Kirim permintaan AJAX untuk memperbarui status pengguna menjadi "ditolak"
                var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // Refresh halaman setelah berhasil
                        window.location.reload();
                    }
                };
                xhttp.open("POST", "prosesTolak.php", true);
                xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send("userId=" + userId);
            }
        }
    </script>
</body>
</html>
