<?php
require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/functions.php';
include 'koneksi.php';

use LucianoTonet\GroqPHP\Groq;
use Dotenv\Dotenv;

// Load environment variables
$dotenv = Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

$apiKey = getenv('GROQ_API_KEY');

session_start();

try {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $kategori_pekerjaan = filter_input(INPUT_POST, 'kategori_pekerjaan', FILTER_SANITIZE_NUMBER_INT);
        $posisi = filter_input(INPUT_POST, 'posisi', FILTER_SANITIZE_STRING);
        $lokasi_bekerja = filter_input(INPUT_POST, 'lokasi_bekerja', FILTER_SANITIZE_STRING);
        
        if (empty($kategori_pekerjaan) || empty($posisi) || empty($lokasi_bekerja)) {
            throw new Exception("All form fields must be filled out.");
        }

        $loker = getLokerDetails($koneksi);

        if ($loker === false) {
            throw new Exception("Failed to fetch loker details from database.");
        }

        $groq = new Groq($apiKey);
        $lokerDetails = "Here are the loker details:\n";
        
        if ($loker->num_rows > 0) {
            while ($row = $loker->fetch_assoc()) {
                $lokerDetails .= "ID: " . $row['id'] . "\n";
                $lokerDetails .= "Posisi: " . $row['posisi'] . "\n";
                $lokerDetails .= "Tingkat Pendidikan: " . $row['tingkat_pendidikan'] . "\n";
                $lokerDetails .= "Gender: " . $row['gender'] . "\n";
                $lokerDetails .= "Status Kerja: " . $row['status_kerja'] . "\n";
                $lokerDetails .= "Besaran Gaji: " . $row['besaran_gaji'] . "\n";
                $lokerDetails .= "Lokasi Bekerja: " . $row['lokasi_bekerja'] . "\n";
                $lokerDetails .= "Syarat Pekerjaan: " . $row['syarat_pekerjaan'] . "\n";
                $lokerDetails .= "Foto Lowongan Pekerjaan: " . $row['foto_loker'] . "\n";
                $lokerDetails .= "Kategori Pekerjaan: " . $row['nama_kategori'] . "\n";
                $lokerDetails .= "-----------------------------------\n";
            }
        } else {
            $lokerDetails = "No loker details available.";
        }

        $messages = [
            [
                'role'    => 'system',
                'content' => 'Kamu adalah asisten yang memberikan rekomendasi loker berdasarkan data pengguna dan loker yang tersedia dalam bahasa indonesia.' . $lokerDetails
            ],
            [
                'role'    => 'user',
                'content' => 'Data saya: Kategori Pekerjaan: ' . $kategori_pekerjaan . ', Posisi: ' . $posisi . ', Lokasi Bekerja: ' . $lokasi_bekerja . '. Tolong berikan rekomendasi loker yang sesuai dengan detail loker yang tersedia di atas.'
            ],
        ];

        $chatCompletion = $groq->chat()->completions()->create([
            'model'    => 'mixtral-8x7b-32768', // Ensure this model ID is correct
            'messages' => $messages,
        ]);

        if (!is_null($chatCompletion)) {
            $_SESSION['resultGroq'] = $chatCompletion['choices'][0]['message']['content'];
            header("Location: rekomendasi_loker.php");
            die();
        } else {
            $_SESSION['resultGroq'] = "Something went wrong with the API call.";
        }
    } else {
        throw new Exception("Invalid request method.");
    }
} catch (\Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
