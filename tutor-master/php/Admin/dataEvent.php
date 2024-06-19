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

// Panggil koneksi ke database
include "koneksi.php";

// Ambil daftar event dari database
$sql = "SELECT id, nama_acara, deskripsi_acara, tanggal_acara, waktu_acara, tempat_acara, kategori_acara, biaya_pendaftaran, kontak_penyelenggara, url_pendaftaran, status FROM event";
$result = $koneksi->query($sql);

// Inisialisasi pesan status
$status_message = "";

// Proses permintaan admin (terima atau tolak acara)
if (isset($_POST['action']) && isset($_POST['event_id'])) {
    $action = $_POST['action'];
    $event_id = $_POST['event_id'];

    // Update status event berdasarkan action (diterima atau ditolak)
    if ($action == 'accept') {
        $update_sql = "UPDATE event SET status = 'diterima' WHERE id = ?";
        $stmt = $koneksi->prepare($update_sql);
        $stmt->bind_param("i", $event_id);
        $stmt->execute();
        $status_message = "Event telah diterima.";
    } elseif ($action == 'reject') {
        $update_sql = "UPDATE event SET status = 'ditolak' WHERE id = ?";
        $stmt = $koneksi->prepare($update_sql);
        $stmt->bind_param("i", $event_id);
        $stmt->execute();
        $status_message = "Event telah ditolak.";
    }

    // Redirect agar tidak ada resubmission saat refresh halaman
    header("Location: dataEvent.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <link rel="stylesheet" href="css/StDataEvent.css">
    <script>
        function updateStatus(eventId, status) {
            // Kirim request ke EventStatus.php dengan data yang diperlukan
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "EventStatus.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Tampilkan pesan atau tanggapan setelah berhasil atau gagal
                    var response = xhr.responseText.trim();
                    alert(response);
                    // Refresh halaman untuk memperbarui tabel
                    location.reload();
                }
            };
            xhr.send("id=" + eventId + "&status=" + status);
        }
    </script>
</head>
<body>
    <div class="container mt-4">
    <header>
            <h1>Data Event</h1>
            <?php if (!empty($status_message)) : ?>
                <div class="alert alert-success" role="alert">
                    <?php echo htmlspecialchars($status_message); ?>
                </div>
            <?php endif; ?>
        </header>
        <section>
            <p>Semangat ya <strong>Admin</strong></p>
            <div class="navigation">
                <a class="btn btn-primary" href="dataPerusahaan.php">Perusahaan</a>
                <a class="btn btn-primary" href="dataAI.php">CHAT AI</a>
                <a class="btn btn-primary" href="dataAdmin.php">Admin</a>
                <a class="btn btn-primary" href="dataEvent.php">Job Fair</a>
                <a class="btn btn-danger" href="logout.php">Keluar</a>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Acara</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Waktu</th>
                        <th>Tempat</th>
                        <th>Kategori</th>
                        <th>Biaya Pendaftaran</th>
                        <th>Kontak Penyelenggara</th>
                        <th>URL Pendaftaran</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['nama_acara']); ?></td>
                            <td><?php echo htmlspecialchars($row['deskripsi_acara']); ?></td>
                            <td><?php echo htmlspecialchars($row['tanggal_acara']); ?></td>
                            <td><?php echo htmlspecialchars($row['waktu_acara']); ?></td>
                            <td><?php echo htmlspecialchars($row['tempat_acara']); ?></td>
                            <td><?php echo htmlspecialchars($row['kategori_acara']); ?></td>
                            <td><?php echo htmlspecialchars($row['biaya_pendaftaran']); ?></td>
                            <td><?php echo htmlspecialchars($row['kontak_penyelenggara']); ?></td>
                            <td><a href="<?php echo htmlspecialchars($row['url_pendaftaran']); ?>" target="_blank">Link Pendaftaran</a></td>
                            <td><?php echo htmlspecialchars($row['status']); ?></td>
                            <td>
                                <?php if ($row['status'] == 'menunggu') : ?>
                                <?php else : ?>
                                <?php endif; ?>
                            </td>
                            <td>
                                <button class="btn btn-info" onclick="updateStatus('<?php echo $row['id']; ?>', 'diterima')">Terima</button>
                                <button class="btn btn-warning" onclick="updateStatus('<?php echo $row['id']; ?>', 'ditolak')">Tolak</button>
                            </td> <!-- Tombol Ubah Status -->
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </section>
    </div>

</body>
</html>
