<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:login.php");
  exit;
}
require 'functions.php';
$mhs = query("SELECT * FROM data ORDER BY nama ASC");

if(isset($_POST["cari"])){
  $mhs= cari($_POST["keyword"]);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href= "styles.css" rel="stylesheet">
    <title>Admin</title>

  </head>
  <body>
  <div class="container">
  <figure class="text-center">
        <blockquote class="blockquote">
        <p class="fs-1 fw-bold">Data Mahasiswa</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          <cite title="Source Title">Unniversitas Pelita Bangsa</cite>
        </figcaption>
      </figure>
    <a href="tambah.php" type="button" class="btn btn-primary mb-3 tambah" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
  <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
  <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4"/>
</svg> Tambah</a>
<a href="cetak.php" target="_blank" type="button" class="btn btn-secondary mb-3 grafik"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bar-chart-line" viewBox="0 0 16 16">
  <path d="M11 2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v12h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h1V7a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v7h1zm1 12h2V2h-2zm-3 0V7H7v7zm-5 0v-3H2v3z"/>
</svg> Grafik</a>
<a href="logout.php" type="button" class="btn btn-danger mb-3 logout"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0z"/>
  <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
</svg> Log Out</a>
<div class="container-fluid form-cari">
  <form action="" class="d-flex mb-3 " method="post">
  <input class="form-control me-2" type="text" name="keyword" placeholder="Masukkan nama pencarian" aria-label="Search" autofocus autocomplete="off">
  <button class="btn btn-success" type="submit" name="cari">Cari</button>
</form>
</div>
</form>
    <table class="table table-success table-striped table-hover">
  <thead>
    <tr>
      <th>No</th>
      <th>Nim</th>
      <th>Nama</th>
      <th>Kelas</th>
      <th>Jurusan</th>
      <th>Foto</th>
      <th class="aksi">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $i =1; ?>
    <?php
    foreach($mhs as $row) :
    ?>
    <tr>
      <td><?= $i; ?></td>
      <td><?= $row["nim"]; ?></td>
      <td><?= $row["nama"]; ?></td>
      <td><?= $row["kelas"]; ?></td>
      <td><?= $row["jurusan"]; ?></td>
      <td><img src="gambar/<?= $row["gambar"];?> "style="width: 50px"></td>
      <td class="aksi">
      <a href="edit.php?id=<?= $row["id"];?>"><button type="button" class="btn btn-warning">Edit</button>
      <a href="hapus.php?id=<?= $row["id"];?>" onclick="return confirm ('Anda yakin ingin menghapus?');"><button type="button" class="btn btn-danger">Hapus</button>
      </td>
    </tr>
    <?php $i++;?>
    <?php endforeach; ?>
  </tbody>
</table>
</div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>