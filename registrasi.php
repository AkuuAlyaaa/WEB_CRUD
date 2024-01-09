<?php
require 'functions.php';
if(isset($_POST["register"])){
    if(registrasi($_POST) > 0 ){
        echo"<script> 
                alert('User baru berhasil di tambahkan'); 
             </script>";
    } else{
        echo mysqli_error($conn);
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
    <link href="styles.css" rel="stylesheet"> 
    <title>Register</title>
  </head>
  <body>
    <div class="global-container">
      <div class="card regis-form">
        <div class="card-body">
            <span class="BorderTopBottom"></span>
            <span class="BorderLeftRight"></span>
          <h1 class="card-title text-center">REGISTRASI</h1>
        </div>
    <div class="regis-card-text">  
      <form action="" method= "post" enctype="multipart/form-data">
        <div class="mb-2">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" required autocomplete="off">
        </div>
        <div class="mb-2">
            <label for="nohp" class="form-label">No.Hp</label>
            <input type="text" class="form-control" name="nohp" id="nohp" autocomplete="off">
        </div>
        <div class="mb-2">
            <label for="email" class="form-label">E-mail</label>
            <input type="text" class="form-control" name="email" id="email" autocomplete="off">
        </div>
        <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password" >
        </div>
        <div class="mb-2">
            <label for="password2" class="form-label">Konfirmasi Password</label>
            <input type="password" class="form-control" name="password2" id="password2">
        </div> 
          <button type="submit" class="btn btn-success" name="register">Registrasi</button>
        <p class="fst-italic">Sudah punya akun : <a href="login.php" type="text">Log in</a></p>    
        </form>
    </div>
  </div>
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
