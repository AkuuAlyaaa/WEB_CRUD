<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Laporan</title>
</head>
<body>
<div class="container">
  <nav class="navbar  navbar-dark bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Laporan Grafik</a>
    </div>
  </nav>
  <br><br>
  <div class="row" >
    <div class="col-6">
      <div>
        <canvas id="myChart"></canvas>
      </div>
    </div>
  </div>
  <div class="col-6 text-center fw-bolder">
    <h3>Laporan Mahasiswa Fakultas Teknik Unniversitas Pelita Bangsa</h3>
  </div>
</div>
  
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'line',
    data: {
      labels: ['T.Sipil', 'T.Industri', 'Arsitektur', 'T.Informatika', 'T.Lingkungan', 'T.Hasil Pertanian'],
      datasets: [{
        label: 'FAKULTAS TEKNIK UNNIVERSITAS PELITA BANGSA ',
        data: [4455, 5000, 3345, 5450, 2150, 1455],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
</script>
</body>
</html>