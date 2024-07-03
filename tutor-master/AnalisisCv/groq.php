<?php
require __DIR__ . '/vendor/autoload.php';

use Smalot\PdfParser\Parser;
use LucianoTonet\GroqPHP\Groq;

$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__);
$dotenv->load();

$apiKey = getenv('GROQ_API_KEY');

function pdfToText($filePath) {
    $parser = new Parser();
    $pdf = $parser->parseFile($filePath);
    return $pdf->getText();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cvFile = $_FILES['cv']['tmp_name'];
    $coverLetterFile = $_FILES['cover_letter']['tmp_name'];

    $cvText = pdfToText($cvFile);
    $coverLetterText = pdfToText($coverLetterFile);

    try {
        $groq = new Groq($apiKey);

        $sysPrompt = "Analisis CV dan surat lamaran yang disediakan. Soroti kekuatan dan kelemahan yang terdapat pada lamaran. 
        Manfaatkan konteks yang disediakan untuk informasi yang akurat dan spesifik dan pertimbangan menurut kamu tentang dia jika ingin masuk kedalam perusahaan ini.
        berikan juga persentase % dia dari 100% kemampuannya DALAM BAHASA INDONESIA";
        $userPrompt = "CV: $cvText\nCover Letter: $coverLetterText";

        $chatCompletion = $groq->chat()->completions()->create([
            'model'    => 'mixtral-8x7b-32768', // Sesuaikan dengan model yang Anda gunakan
            'messages' => [
                [
                    'role'    => 'system',
                    'content' => $sysPrompt
                ],
                [
                    'role'    => 'user',
                    'content' => $userPrompt
                ],
            ],
        ]);
        $answer = nl2br($chatCompletion['choices'][0]['message']['content']);
        echo "<div class='analysis-result'><h1>Hasil Analisis</h1><p>" . $answer . "</p></div>";
    } catch (\Exception $e) {
        echo "<div class='analysis-result'><h1>Error</h1><p>" . $e->getMessage() . "</p></div>";
    }
} else {
    include 'form.html';
}
?>
