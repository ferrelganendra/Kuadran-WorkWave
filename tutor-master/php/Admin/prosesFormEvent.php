<?php
// Pastikan file ini dipanggil setelah form disubmit dengan metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'koneksi.php';
    try {
        $koneksi = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // Atur mode error untuk PDO ke exception
        $koneksi->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Tangkap data dari form
        $nama_acara = $_POST['nama_acara'];
        $deskripsi_acara = $_POST['deskripsi_acara'];
        $tanggal_acara = $_POST['tanggal_acara'];
        $waktu_acara = $_POST['waktu_acara'];
        $tempat_acara = $_POST['tempat_acara'];
        $kategori_acara = $_POST['kategori_acara'];
        $biaya_pendaftaran = $_POST['biaya_pendaftaran'];
        $kontak_penyelenggara = $_POST['kontak_penyelenggara'];
        $url_pendaftaran = $_POST['url_pendaftaran'];
        $instruksi_tambahan = $_POST['instruksi_tambahan'];

        // Proses upload foto/poster
        $target_dir = "./images"; // Direktori tempat menyimpan file
        $target_file = $target_dir . basename($_FILES["foto_poster"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["foto_poster"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File yang diunggah bukan gambar.";
                $uploadOk = 0;
            }
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Maaf, file tersebut sudah ada.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["foto_poster"]["size"] > 500000) {
            echo "Maaf, ukuran file terlalu besar.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Maaf, file Anda tidak diunggah.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["foto_poster"]["tmp_name"], $target_file)) {
                echo "File ". htmlspecialchars( basename( $_FILES["foto_poster"]["name"])). " berhasil diunggah.";
            } else {
                echo "Maaf, ada kesalahan saat mengunggah file.";
            }
        }
        // End upload foto/poster

        // Simpan path foto/poster ke dalam variabel untuk disimpan di database
        $foto_poster = $target_file; // Sesuaikan dengan cara Anda menyimpan lokasi foto/poster

        // Query untuk menyimpan data ke database
        $sql = "INSERT INTO event (nama_acara, deskripsi_acara, tanggal_acara, waktu_acara, tempat_acara, kategori_acara, biaya_pendaftaran, kontak_penyelenggara, url_pendaftaran, instruksi_tambahan, foto_poster, status)
                VALUES (:nama_acara, :deskripsi_acara, :tanggal_acara, :waktu_acara, :tempat_acara, :kategori_acara, :biaya_pendaftaran, :kontak_penyelenggara, :url_pendaftaran, :instruksi_tambahan, :foto_poster, 'menunggu')";
        $stmt = $koneksi->prepare($sql);
        $stmt->bindParam(':nama_acara', $nama_acara);
        $stmt->bindParam(':deskripsi_acara', $deskripsi_acara);
        $stmt->bindParam(':tanggal_acara', $tanggal_acara);
        $stmt->bindParam(':waktu_acara', $waktu_acara);
        $stmt->bindParam(':tempat_acara', $tempat_acara);
        $stmt->bindParam(':kategori_acara', $kategori_acara);
        $stmt->bindParam(':biaya_pendaftaran', $biaya_pendaftaran);
        $stmt->bindParam(':kontak_penyelenggara', $kontak_penyelenggara);
        $stmt->bindParam(':url_pendaftaran', $url_pendaftaran);
        $stmt->bindParam(':instruksi_tambahan', $instruksi_tambahan);
        $stmt->bindParam(':foto_poster', $foto_poster);
        $stmt->execute();

        echo "Acara berhasil disimpan dan menunggu verifikasi admin.";

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $koneksi = null;
}
?>
