<?php
// Panggil koneksi ke database
include "koneksi.php";

// Periksa apakah data yang diperlukan telah disubmit melalui metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["id"])) {
    // Ambil ID event dari permintaan POST
    $event_id = $_POST["id"];

    // Query SQL untuk memperbarui status event menjadi "diterima"
    $sql = "UPDATE event SET status='diterima' WHERE id=?";

    // Persiapkan statement SQL
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $event_id);

    // Eksekusi statement
    if ($stmt->execute()) {
        // Kirim respons berhasil
        http_response_code(200);
    } else {
        // Kirim respons gagal
        http_response_code(500);
    }

    // Tutup statement
    $stmt->close();

    // Tutup koneksi database
    $koneksi->close();
} else {
    // Kirim respons jika data tidak lengkap
    http_response_code(400);
}
?>

