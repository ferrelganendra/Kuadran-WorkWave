<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
require __DIR__ . '/vendor/autoload.php';

use Dotenv\Dotenv;
use LucianoTonet\GroqPHP\Groq;

// Load environment variables
$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

$apiKey = getenv('GROQ_API_KEY');

// Fungsi untuk membaca CSV ke array
function readCsv($filename) {
    $csvData = array_map('str_getcsv', file($filename));
    $header = array_shift($csvData);
    $csv = [];
    foreach ($csvData as $row) {
        $csv[] = array_combine($header, $row);
    }
    return $csv;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $category = $_POST['category'];
    $date = $_POST['date'];

    $csvData = readCsv('data.csv');

    $filteredData = array_filter($csvData, function($row) use ($category) {
        return $row['Posisi'] == $category;
    });

    $messages = [
        [
            'role' => 'system',
            'content' => 'Kamu adalah asisten yang membantu pengguna dalam bahasa Indonesia.'
        ],
        [
            'role' => 'user',
            'content' => 'Saya memiliki data pekerjaan berikut: ' . json_encode($filteredData) . '. Berikan rekomendasi untuk tren pekerjaan di kategori ' . $category . ' pada tanggal ' . $date . '.'
        ],
    ];

    try {
        $groq = new Groq($apiKey);
        $chatCompletion = $groq->chat()->completions()->create([
            'model'    => 'mixtral-8x7b-32768', // pastikan model ID ini benar
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
    <link rel="stylesheet" href="style.css">
    <title>Job Recommendation Result</title>
</head>
<body>
    <h1>Recommendation Result for <?php echo htmlspecialchars($category); ?> on <?php echo htmlspecialchars($date); ?></h1>
    <p><?php echo nl2br(htmlspecialchars($recommendation)); ?></p>
    <a href="index.php">Back</a>
</body>
</html>
