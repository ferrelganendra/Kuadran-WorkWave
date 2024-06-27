<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Job Prediction Form</title>
</head>
<body>
    <h1>Job Prediction Form</h1>
    <form action="groq.php" method="POST">
        <label for="kategori_pekerjaan_id">Kategori Pekerjaan:</label>
        <select name="kategori_pekerjaan_id" id="kategori_pekerjaan_id" required>
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
        <label for="date">Bulan:</label>
        <input type="month" name="date" id="date" required>
        <br>
        <button type="submit">Dapatkan Prediksi</button>
    </form>
</body>
</html>
