<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:login.php");
  exit;
}
require 'functions.php';
  if(isset($_POST["submit"])){
  if(tambah($_POST) > 0 ){
  echo "
  <script> 
    alert('Data Berhasil di Tambahkan');
    document.location.href= 'index.php';
  </script>
  ";
}
else {
  echo "
  <script> 
    alert('Data Gagal di Tambahkan');
    document.location.href= 'index.php';
  </script>
  ";
}
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

    <title>Tambah Data</title>
  </head>
  <body>
    <div class="container">
    <figure class="text-center">
        <blockquote class="blockquote">
        <p class="fs-1 fw-bold">Tambah Data</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          <cite title="Source Title">Unniversitas Pelita Bangsa</cite>
        </figcaption>
    </figure>
      <form action="" method= "post" enctype="multipart/form-data">

        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">Nim</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nim" id="nim"autocomplete="off" required></div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" id="nama" autocomplete="off"></div>
        </div>
        <div class="mb-3 row">
            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="kelas" id="kelas"></div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="jurusan" id="jurusan"></div>
        </div>
        <div class="mb-3 row">
            <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
            <input type="file" class="form-control" name="gambar" id="gambar"></div>
        </div>
        <div class="mb-3 row">
            <button type="submit" class="btn btn-primary" name="submit">Tambah Data</button>
        </div>
      </form>
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