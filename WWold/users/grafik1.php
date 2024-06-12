<?php
include 'prosesGrafik1.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Grafik Kebutuhan Pasar Tenaga Kerja</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" type="text/css" href="css/grafik1.css">
</head>
<body>

<?php
include 'konten/header.php';
?>

    <canvas id="KebutuhanTopLoker" width="800" height="400"></canvas>

    <script>
        // Mendapatkan elemen canvas
        var ctx = document.getElementById('KebutuhanTopLoker').getContext('2d');

        // Membuat data untuk grafik
        var data = {
            labels: <?php echo json_encode($labels); ?>,
            datasets: [{
                label: 'Jumlah Lowongan Pekerjaan',
                data: <?php echo json_encode($data); ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.2)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        };

        // Menggambar grafik
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: data,
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
     <li><a href="grafik2.php">Grafik 2</a></li>
</body>
</html>
