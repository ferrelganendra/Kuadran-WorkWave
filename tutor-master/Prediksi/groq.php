<?php
require __DIR__ . '/vendor/autoload.php';
include 'koneksi.php';

use LucianoTonet\GroqPHP\Groq;

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

$apiKey = getenv('GROQ_API_KEY');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $kategori = $_POST['kategori_pekerjaan_id'];
    $date = $_POST['date'];

    // Ekstrak bulan dan tahun dari input tanggal
    $month = date('m', strtotime($date . '-01'));
    $year = date('Y', strtotime($date . '-01'));

    // Query untuk mendapatkan data historis pekerjaan dari database
    $sql = "SELECT * FROM loker WHERE kategori_pekerjaan_id = ? ORDER BY tanggal_dipost";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $kategori);
    $stmt->execute();
    $result = $stmt->get_result();
    $data = $result->fetch_all(MYSQLI_ASSOC);

    // Buat array untuk menyimpan data per bulan
    $historicalData = [];
    foreach ($data as $row) {
        $bulan = date('m', strtotime($row['tanggal_dipost']));
        $tahun = date('Y', strtotime($row['tanggal_dipost']));
        $key = $tahun . '-' . $bulan;
        if (!isset($historicalData[$key])) {
            $historicalData[$key] = 0;
        }
        $historicalData[$key]++;
    }

    // Buat model prediksi sederhana
    $currentMonth = intval(date('m'));
    $currentYear = intval(date('Y'));

    // Prediksi jumlah pekerjaan untuk bulan yang dipilih
    $futureKey = $year . '-' . $month;
    $totalJobs = 0;
    $count = 0;
    foreach ($historicalData as $key => $value) {
        if (intval(substr($key, 5, 2)) == $currentMonth && intval(substr($key, 0, 4)) < $currentYear) {
            $totalJobs += $value;
            $count++;
        }
    }

    $predictedJobs = ($count > 0) ? $totalJobs / $count : 0;

    $messages = [
        [
            'role' => 'system',
            'content' => 'Kamu adalah asisten yang membantu pengguna dalam bahasa Indonesia.'
        ],
        [
            'role' => 'user',
            'content' => 'Saya memiliki data pekerjaan berikut: ' . json_encode($data) . '. Berikan rekomendasi untuk tren pekerjaan di kategori ' . $kategori . ' pada bulan ' . $month . '-' . $year . '. Juga, beri tahu saya jumlah pekerjaan yang tersedia di kategori tersebut untuk bulan ini.
            berikan juga saya saran untuk mempersiapkan diri agar dapat diterima dalam pekerjaan di kategori ' . $kategori . '.'
        ],
    ];

    try {
        $groq = new Groq($apiKey);
        $chatCompletion = $groq->chat()->completions()->create([
            'model'    => 'mixtral-8x7b-32768', // Pastikan ID model ini benar
            'messages' => $messages,
        ]);

        $recommendation = $chatCompletion['choices'][0]['message']['content'];
    } catch (\Exception $e) {
        $recommendation = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Job Recommendation Result</title>
</head>
<body>
    <h1>Recommendation Result for <?php echo htmlspecialchars($kategori); ?> on <?php echo htmlspecialchars($date); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($recommendation)); ?></p>
    <a href="index.php">Back</a>
</body>
</html>
