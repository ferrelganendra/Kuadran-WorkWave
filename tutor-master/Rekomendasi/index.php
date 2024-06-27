<!DOCTYPE html>
<html>
<head>
    <title>Rekomendasi Loker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Form Rekomendasi Loker</h1>
    <form action="groq.php" method="post">
        <label for="kategori_pekerjaan">Kategori Pekerjaan:</label>
        <select name="kategori_pekerjaan" id="kategori_pekerjaan">
            <option value="" disabled selected>Pilih Kategori Pekerjaan</option>
            <?php
                include 'koneksi.php';
                $result = $koneksi->query("SELECT id, nama_kategori FROM kategori_pekerjaan");

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['id'] . "'>" . $row['nama_kategori'] . "</option>";
                    }
                }
            ?>
        </select>
        <br>
        <label for="posisi">Posisi:</label>
        <select name="posisi" id="posisi" required>
            <option value="" disabled selected>Pilih Posisi</option>
            <?php
                $result = $koneksi->query("SELECT DISTINCT posisi FROM loker");

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['posisi'] . "'>" . $row['posisi'] . "</option>";
                    }
                }
            ?>
        </select>
        <br>
        <label for="lokasi_bekerja">Lokasi Bekerja:</label>
        <select name="lokasi_bekerja" id="lokasi_bekerja" required>
            <option value="" disabled selected>Pilih Lokasi Bekerja</option>
            <?php
                $result = $koneksi->query("SELECT DISTINCT lokasi_bekerja FROM loker");

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['lokasi_bekerja'] . "'>" . $row['lokasi_bekerja'] . "</option>";
                    }
                }
                $koneksi->close();
            ?>
        </select>
        <br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
