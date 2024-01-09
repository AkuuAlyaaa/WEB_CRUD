<?php
session_start();
if(!isset($_SESSION["login"])){
  header("Location:login.php");
  exit;
}
require 'functions.php';
$id= $_GET["id"];
$mahasiswa= query("SELECT * FROM data WHERE id= $id")[0];
  if(isset($_POST["submit"])){
  if(edit($_POST) > 0 ){
  echo "
  <script> 
    alert('Data Berhasil di Edit');
    document.location.href= 'index.php';
  </script>
  ";
}
else {
  echo "
  <script> 
    alert('Data Gagal di Edit!');
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

    <title>Edit Data</title>
  </head>
  <body>
    <div class="container">
    <figure class="text-center">
        <blockquote class="blockquote">
        <p class="fs-1 fw-bold">Edit Data</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          <cite title="Source Title">Unniversitas Pelita Bangsa</cite>
        </figcaption>
    </figure>
      <form action="" method= "post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $mahasiswa["id"];?>">
        <input type="hidden" name="gambarlama" value="<?= $mahasiswa["gambar"];?>">
        <div class="mb-3 row">
            <label for="nim" class="col-sm-2 col-form-label">Nim</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nim" id="nim" required value="<?= $mahasiswa["nim"]?>"></div>
        </div>
        <div class="mb-3 row">
            <label for="nama" class="col-sm-2 col-form-label">Nama</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="nama" id="nama" value="<?= $mahasiswa["nama"]?>"></div>
        </div>
        <div class="mb-3 row">
            <label for="kelas" class="col-sm-2 col-form-label">Kelas</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="kelas" id="kelas" value="<?= $mahasiswa["kelas"]?>"></div>
        </div>
        <div class="mb-3 row">
            <label for="jurusan" class="col-sm-2 col-form-label">Jurusan</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="jurusan" id="jurusan" value="<?= $mahasiswa["jurusan"]?>"></div>
        </div>
        <div class="mb-3 row">
            <label for="gambar" class="col-sm-2 col-form-label">Foto</label>
            <div class="col-sm-10">
              <img src="gambar/<?= $mahasiswa['gambar'];?>" width="50">
              <div class="mt-3"></div>
            <input type="file" class="form-control" name="gambar" id="gambar"></div>
        </div>
        <div class="mb-3 row">
            <button type="submit" class="btn btn-primary" name="submit">Edit Data</button>
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