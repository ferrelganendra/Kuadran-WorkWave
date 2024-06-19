<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include koneksi database
include 'koneksi.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Escape user inputs for security (optional, but recommended)
    $nama_perusahaan = mysqli_real_escape_string($koneksi, $_POST['nama_perusahaan']);
    $industri = mysqli_real_escape_string($koneksi, $_POST['industri']);
    $deskripsi = mysqli_real_escape_string($koneksi, $_POST['deskripsi']);
    $media_sosial = mysqli_real_escape_string($koneksi, $_POST['media_sosial']);
    $website = mysqli_real_escape_string($koneksi, $_POST['website']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $username = mysqli_real_escape_string($koneksi, $_POST['username']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    // Handle file upload for logo_perusahaan
    if ($_FILES['logo_perusahaan']['error'] === UPLOAD_ERR_OK) {
        $file = $_FILES['logo_perusahaan'];
        $fileName = basename($file['name']);
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileType = $file['type'];

        // Specify upload directory
        $uploadDir = 'uploads/';

        // Generate unique filename to avoid overwriting existing files
        $uploadFile = $uploadDir . uniqid() . '_' . $fileName;

        // Move uploaded file to specified directory
        if (move_uploaded_file($fileTmpName, $uploadFile)) {
            // Query untuk memasukkan data ke dalam tabel users
            $sql = "INSERT INTO users (nama_perusahaan, industri, deskripsi_perusahaan, media_sosial, website, alamat_perusahaan, logo_perusahaan, username, password)
                    VALUES ('$nama_perusahaan', '$industri', '$deskripsi', '$media_sosial', '$website', '$alamat', '$uploadFile', '$username', '$password')";

            if ($koneksi->query($sql) === TRUE) {
                $_SESSION['register_success'] = true;
                // Menampilkan pesan alert dan mengarahkan ke halaman 
                
                echo "<script>alert('Pendaftaran berhasil!'); window.location.href = 'registrasi.php';</script>";
                exit;
            } else {
                echo "Error: " . $sql . "<br>" . $koneksi->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Upload file error: " . $_FILES['logo_perusahaan']['error'];
    }

    // Tutup koneksi
    $koneksi->close();
}
?>
