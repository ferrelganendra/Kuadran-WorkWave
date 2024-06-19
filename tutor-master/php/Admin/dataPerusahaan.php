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

// Atur jumlah data per halaman
$items_per_page = 5;

// Tentukan halaman saat ini untuk setiap tabel
$current_page_users = isset($_GET['page_users']) ? $_GET['page_users'] : 1;
$current_page_perusahaan = isset($_GET['page_perusahaan']) ? $_GET['page_perusahaan'] : 1;
$current_page_loker = isset($_GET['page_loker']) ? $_GET['page_loker'] : 1;

// Hitung offset berdasarkan halaman saat ini untuk setiap tabel
$offset_users = ($current_page_users - 1) * $items_per_page;
$offset_perusahaan = ($current_page_perusahaan - 1) * $items_per_page;
$offset_loker = ($current_page_loker - 1) * $items_per_page;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Perusahaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+6ayGg5r/um1rD0cP1fuHYKuB+qBpddk9alr2yQrSn6vMj/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/StDataPerusahaan.css">
    <script src="js/ScData.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-Dztdf4uGXH7jkpJq4WBnPcF+nDFP0szFEyHf4BtGTVB2tvxj9d5w4geYLqJfr5wG" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-1qV/Cj9+mSp/cM1T5AVHaI0W5FqV7ZvY+bT3LgNwhm+ouF8Ni8TO1IlUeYDdUj2X" crossorigin="anonymous"></script>
</head>
<body>
    <div class="navigation">
        <a class="btn btn-primary" href="dataPerusahaan.php">Perusahaan</a>
        <a class="btn btn-primary" href="dataAI.php">CHAT AI</a>
        <a class="btn btn-primary" href="dataAdmin.php">Admin</a>
        <a class="btn btn-primary" href="dataEvent.php">Job Fair</a>
        <a class="btn btn-danger" href="logout.php">Keluar</a>
    </div>
    <div class="container">
        <h1>Gini Amat jadi admin</h1>
        <h2>Info login perusahaan</h2>
            </form>
        </>
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

                // Tutup koneksi database untuk tabel pengguna
                mysqli_close($koneksi);
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
                    <th>Logo Perusahaan</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';

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
                    // MASIH ERROR echo "<td>". $row["logo_perusahaan"] . "</td>";
                    echo "</td>";

                    echo "</tr>";
                }

                // Hitung total data perusahaan
                $sql_count_perusahaan = "SELECT COUNT(*) AS total FROM users";
                $result_count_perusahaan = mysqli_query($koneksi, $sql_count_perusahaan);
                $row_count_perusahaan = mysqli_fetch_assoc($result_count_perusahaan);
                $total_data_perusahaan = $row_count_perusahaan['total'];

                // Tutup koneksi database untuk tabel perusahaan
                mysqli_close($koneksi);
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

        <h2>Data Lowongan Pekerjaan</h2>
        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Perusahaan</th>
                    <th>Kategori Pekerjaan</th>
                    <th>Posisi</th>
                    <th>Tingkat Pendidikan</th>
                    <th>Gender</th>
                    <th>Status Kerja</th>
                    <th>Besaran Gaji</th>
                    <th>Lokasi Bekerja</th>
                    <th>Syarat Pekerjaan</th>
                    <th>Tanggal Dipost</th>
                </tr>
            </thead>
        <tbody>
            <?php
            include 'koneksi.php';
                        // Query untuk mengambil data lowongan pekerjaan dengan limit dan offset
                        $query_loker = "SELECT l.*, u.nama_perusahaan, kp.nama_kategori
                        FROM loker l
                        INNER JOIN users u ON l.user_id = u.id
                        INNER JOIN kategori_pekerjaan kp ON l.kategori_pekerjaan_id = kp.id
                        LIMIT $items_per_page OFFSET $offset_loker";
        $result_loker = mysqli_query($koneksi, $query_loker);

        // Loop through each row and display data in table rows
        while ($row = mysqli_fetch_assoc($result_loker)) {
            echo "<tr>";
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nama_perusahaan'] . "</td>";
            echo "<td>" . $row['nama_kategori'] . "</td>";
            echo "<td>" . $row['posisi'] . "</td>";
            echo "<td>" . $row['tingkat_pendidikan'] . "</td>";
            echo "<td>" . $row['gender'] . "</td>";
            echo "<td>" . $row['status_kerja'] . "</td>";
            echo "<td>Rp " . number_format($row['besaran_gaji'], 0, ',', '.') . "</td>";
            echo "<td>" . $row['lokasi_bekerja'] . "</td>";
            echo "<td>" . $row['syarat_pekerjaan'] . "</td>";
            echo "<td>" . $row['tanggal_dipost'] . "</td>";
            echo "</tr>";
        }

        // Hitung total data lowongan pekerjaan
        $sql_count_loker = "SELECT COUNT(*) AS total FROM loker";
        $result_count_loker = mysqli_query($koneksi, $sql_count_loker);
        $row_count_loker = mysqli_fetch_assoc($result_count_loker);
        $total_data_loker = $row_count_loker['total'];

        // Tutup koneksi database untuk tabel lowongan pekerjaan
        mysqli_close($koneksi);
        ?>
    </tbody>
</table>

<!-- Tombol Navigasi Halaman (Lowongan Pekerjaan) -->
<div class="pagination">
    <?php if ($current_page_loker > 1): ?>
        <a href="?page_loker=<?php echo ($current_page_loker - 1); ?>">Previous</a>
    <?php endif; ?>
    <?php for ($i = 1; $i <= ceil($total_data_loker / $items_per_page); $i++): ?>
        <a href="?page_loker=<?php echo $i; ?>" <?php echo ($current_page_loker == $i) ? 'class="active"' : ''; ?>><?php echo $i; ?></a>
    <?php endfor; ?>
    <?php if ($current_page_loker < ceil($total_data_loker / $items_per_page)): ?>
        <a href="?page_loker=<?php echo ($current_page_loker + 1); ?>">Next</a>
    <?php endif; ?>
</div>

</div>
</body>
</html>
