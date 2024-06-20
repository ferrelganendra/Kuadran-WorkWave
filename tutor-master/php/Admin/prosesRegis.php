<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'koneksi.php';

if (isset($_POST['register'])) {
    $nama_perusahaan = $_POST['nama_perusahaan'];
    $industri = $_POST['industri'];
    $deskripsi_perusahaan = $_POST['deskripsi_perusahaan'];
    $media_sosial = $_POST['media_sosial'];
    $website = $_POST['website'];
    $alamat_perusahaan = $_POST['alamat'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Penanganan upload file
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["logo_perusahaan"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["logo_perusahaan"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["logo_perusahaan"]["size"] > 500000) {
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br>";
    // if everything is ok, try to upload file
    } else {
        // Debugging tambahan
        echo "Trying to move uploaded file to: " . $target_file . "<br>";
        if (move_uploaded_file($_FILES["logo_perusahaan"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars(basename($_FILES["logo_perusahaan"]["name"])). " has been uploaded.<br>";

            // Set status default 'menunggu'
            $status = 'menunggu';

            $query = "INSERT INTO users (nama_perusahaan, industri, deskripsi_perusahaan, media_sosial, website, alamat_perusahaan, logo_perusahaan, username, password, status) 
                      VALUES ('$nama_perusahaan', '$industri', '$deskripsi_perusahaan', '$media_sosial', '$website', '$alamat_perusahaan', '$target_file', '$username', '$password', '$status')";

            if (mysqli_query($koneksi, $query)) {
                // Menggunakan JavaScript untuk menampilkan alert
                echo "<script>
                        alert('Akun anda berhasil registrasi harap menunggu Admin');
                        window.location.href='login.php';
                      </script>";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($koneksi) . "<br>";
            }
        } else {
            // Debugging tambahan untuk error
            echo "Sorry, there was an error uploading your file.<br>";
            echo "Error details: " . print_r(error_get_last(), true) . "<br>";
        }
    }
}
?>

