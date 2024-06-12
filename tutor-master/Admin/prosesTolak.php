<?php
// Panggil koneksi ke database
include "koneksi.php";

// Periksa apakah data yang diperlukan telah disubmit melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["userId"])) {
    // Ambil ID pengguna dari permintaan POST
    $userId = $_POST["userId"];

    // Query SQL untuk memperbarui status pengguna menjadi "ditolak"
    $sql = "UPDATE users SET status='ditolak' WHERE id=$userId";

    // Eksekusi query
    if (mysqli_query($koneksi, $sql)) {
        // Kirim respons berhasil
        http_response_code(200);
        exit();
    } else {
        // Kirim respons gagal
        http_response_code(500);
        exit();
    }

    // Tutup koneksi database
    mysqli_close($koneksi);
} else {
    // Kirim respons jika data tidak lengkap
    http_response_code(400);
    exit();
}
?>
