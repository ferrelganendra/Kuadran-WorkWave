<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();

// Periksa apakah admin sudah login
if (!isset($_SESSION['admin_username'])) {
    // Redirect ke halaman login jika admin belum login
    header("Location: loginAdmin.php");
    exit();
}

include "koneksi.php";

$query = "SELECT * FROM users WHERE status = 'menunggu'";

// Atur jumlah data per halaman
$items_per_page = 5;

// Tentukan halaman saat ini untuk setiap tabel
$current_page_users = isset($_GET['page_users']) ? $_GET['page_users'] : 1;
$current_page_perusahaan = isset($_GET['page_perusahaan']) ? $_GET['page_perusahaan'] : 1;

// Hitung offset berdasarkan halaman saat ini untuk setiap tabel
$offset_users = ($current_page_users - 1) * $items_per_page;
$offset_perusahaan = ($current_page_perusahaan - 1) * $items_per_page;

// Query untuk mengambil total perusahaan, lowongan, admin, dan event
$totalPerusahaanQuery = "SELECT COUNT(*) FROM users";
$totalLowonganQuery = "SELECT COUNT(*) FROM loker";
$totalAdminQuery = "SELECT COUNT(*) FROM admin";
$totalEventQuery = "SELECT COUNT(*) FROM event";

// Menjalankan query dan mendapatkan hasil
$totalPerusahaan = $koneksi->query($totalPerusahaanQuery)->fetch_row()[0];
$totalLowongan = $koneksi->query($totalLowonganQuery)->fetch_row()[0];
$totalAdmin = $koneksi->query($totalAdminQuery)->fetch_row()[0];
$totalEvent = $koneksi->query($totalEventQuery)->fetch_row()[0];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Perusahaan</title>
    <link rel="stylesheet" href="css/adminpage2.css">
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="js/ScData.js"></script>
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-header">
            <h2><strong>W</strong>ork<strong>W</strong>ave</h2>
        </div>
        <ul class="sidebar-menu">
            <li><a href="AdminPage.php">Dashboard</a></li>
            <li><a href="dataPerusahaan.php">Data Perusahaan</a></li>
            <li><a href="dataLoker.php">Data Lowongan Pekerjaan</a></li> 
            <li><a href="dataAI.php">CHAT AI</a></li>
            <li><a href="dataAdmin.php">Admin</a></li>
            <li><a href="databursakerja.php">Job Fair</a></li>
            <li><a href="logout.php" class="btn btn-danger">Keluar</a></li>
        </ul>
    </div>
    <div class="main-content">
        <header>
            <div class="header-title">
                <h1>Data Perusahaan</h1>
                <p>Informasi users</p>
            </div>
            <div class="user-info">
                <p>Powered by <strong>Gusti</strong/p>
            </div>
        </header>
        <div class="content">
            <div class="cards">
            <div class="card bg-primary">
                    <h3>Total Perusahaan</h3>
                    <p><?php echo $totalPerusahaan; ?></p>
                </div>
                <div class="card bg-success">
                    <h3>Total Lowongan</h3>
                    <p><?php echo $totalLowongan; ?></p>
                </div>
                <div class="card bg-warning">
                    <h3>Total Admin</h3>
                    <p><?php echo $totalAdmin; ?></p>
                </div>
                <div class="card bg-danger">
                    <h3>Total Event</h3>
                    <p><?php echo $totalEvent; ?></p>
                </div>
            </div>
            <div class="data-section">
            <h2><strong>W</strong>ork<strong>W</strong>ave.com</h2>
                <table class="data-table">
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
                        // Query SQL untuk mendapatkan data pengguna dengan limit dan offset
                        $sql_users = "SELECT * FROM users LIMIT $items_per_page OFFSET $offset_users";
                        $result_users = mysqli_query($koneksi, $sql_users);

                        // Periksa apakah ada data pengguna
                        if (mysqli_num_rows($result_users) > 0) {
                            // Loop untuk menampilkan data pengguna dalam tabel
                            while ($row = mysqli_fetch_assoc($result_users)) {
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
                            echo "<tr><td colspan='6'>Tidak ada data pengguna</td></tr>";
                        }

                        // Hitung total data pengguna
                        $sql_count_users = "SELECT COUNT(*) AS total FROM users";
                        $result_count_users = mysqli_query($koneksi, $sql_count_users);
                        $row_count_users = mysqli_fetch_assoc($result_count_users);
                        $total_data_users = $row_count_users['total'];
                        ?>
                    </tbody>
                </table>
                <!-- Tombol Navigasi Halaman (Pengguna) -->
                <div class="pagination">
                    <?php if ($current_page_users > 1): ?>
                        <a href="?page_users=<?php echo ($current_page_users - 1); ?>">Previous</a>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= ceil($total_data_users / $items_per_page); $i++): ?>
                        <a href="?page_users=<?php echo $i; ?>" <?php echo ($current_page_users == $i) ? 'class="active"' : ''; ?>><?php echo $i; ?></a>
                    <?php endfor; ?>
                    <?php if ($current_page_users < ceil($total_data_users / $items_per_page)): ?>
                        <a href="?page_users=<?php echo ($current_page_users + 1); ?>">Next</a>
                    <?php endif; ?>
                </div>

                <h2>Data Perusahaan</h2>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Perusahaan</th>
                            <th>Industri</th>
                            <th>Deskripsi Perusahaan</th>
                            <th>Media Sosial</th>
                            <th>Website</th>
                            <th>Alamat Perusahaan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Query untuk mengambil data perusahaan dengan limit dan offset
                        $query_perusahaan = "SELECT * FROM users LIMIT $items_per_page OFFSET $offset_perusahaan";
                        $result_perusahaan = mysqli_query($koneksi, $query_perusahaan);

                        // Loop through each row and display data in table rows
                        while ($row = mysqli_fetch_assoc($result_perusahaan)) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['nama_perusahaan'] . "</td>";
                            echo "<td>" . $row['industri'] . "</td>";
                            echo "<td>" . $row['deskripsi_perusahaan'] . "</td>";
                            echo "<td>" . $row['media_sosial'] . "</td>";
                            echo "<td>" . $row['website'] . "</td>";
                            echo "<td>" . $row['alamat_perusahaan'] . "</td>";
                            echo "</tr>";
                        }

                        // Hitung total data perusahaan
                        $sql_count_perusahaan = "SELECT COUNT(*) AS total FROM users";
                        $result_count_perusahaan = mysqli_query($koneksi, $sql_count_perusahaan);
                        $row_count_perusahaan = mysqli_fetch_assoc($result_count_perusahaan);
                        $total_data_perusahaan = $row_count_perusahaan['total'];
                        ?>
                    </tbody>
                </table>
                <!-- Tombol Navigasi Halaman (Perusahaan) -->
                <div class="pagination">
                    <?php if ($current_page_perusahaan > 1): ?>
                        <a href="?page_perusahaan=<?php echo ($current_page_perusahaan - 1); ?>">Previous</a>
                    <?php endif; ?>
                    <?php for ($i = 1; $i <= ceil($total_data_perusahaan / $items_per_page); $i++): ?>
                        <a href="?page_perusahaan=<?php echo $i; ?>" <?php echo ($current_page_perusahaan == $i) ? 'class="active"' : ''; ?>><?php echo $i; ?></a>
                    <?php endfor; ?>
                    <?php if ($current_page_perusahaan < ceil($total_data_perusahaan / $items_per_page)): ?>
                        <a href="?page_perusahaan=<?php echo ($current_page_perusahaan + 1); ?>">Next</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
