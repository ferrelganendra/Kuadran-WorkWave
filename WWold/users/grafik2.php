<?php
include 'prosesGrafik2.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" type="text/css" href="css/grafik2.css">
<title>Grafik Tren Lowongan Pekerjaan</title>
</head>

<body>

<?php
include 'konten/header.php';
?>

<div class="container">
    <h2>Grafik Tren Lowongan Pekerjaan</h2>
    <div class="chart" id="line-chart"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
    var options = {
        chart: {
            type: 'line',
            height: 350
        },
        series: [],
        xaxis: {
            categories: [],
            title: {
                text: 'Bulan'
            }
        },
        colors: ['#008FFB', '#00E396', '#FEB019', '#FF4560', '#775DD0']
    };

    var chart = new ApexCharts(document.querySelector("#line-chart"), options);

    // Data dari PHP dimasukkan ke dalam variabel JavaScript
    var data = <?php echo json_encode($data_kategori); ?>;
    var bulan = <?php echo json_encode(array_keys($data_bulan)); ?>;

    // Mengonversi angka bulan menjadi nama bulan
    var namaBulan = bulan.map(function(bulanAngka) {
        var date = new Date();
        date.setMonth(bulanAngka - 1);
        return date.toLocaleString('default', { month: 'long' });
    });

    // Mengisi data seri dan kategori
    for (var kategori in data) {
        var seriesData = [];
        for (var i = 0; i < bulan.length; i++) {
            seriesData.push(data[kategori][bulan[i]] || 0);
        }
        options.series.push({ name: kategori, data: seriesData });
    }
    options.xaxis.categories = namaBulan;

    chart.render();
</script>
</body>
</html>

