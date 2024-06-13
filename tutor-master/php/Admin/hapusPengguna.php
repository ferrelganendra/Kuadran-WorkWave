<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

include 'koneksi.php';

// Tombol aksi 'Hapus Pengguna' diklik
if(isset($_POST['delete_user'])) {
    $id = $_POST['id'];
    hapusPengguna($id);
    // Refresh halaman setelah penghapusan
    echo "<meta http-equiv='refresh' content='0'>";
}

// Fungsi PHP untuk menghapus pengguna
function hapusPengguna($id) {
    global $conn;
    $sql = "DELETE FROM users WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Pengguna berhasil dihapus.";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
