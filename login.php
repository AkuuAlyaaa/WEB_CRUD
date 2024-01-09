<?php
session_start();

if(isset($_COOKIE['login'])){
  if($_COOKIE['login'] ==  'true'){
    $_SESSION['login'] = true;
  }
}
if(isset($_SESSION["login"])){
  header("Location:index.php");
  exit;
}
require 'functions.php';
if(isset($_POST["login"])){
    $username = $_POST["username"];
    $password = $_POST["password"];

$result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

if(mysqli_num_rows($result) === 1 ){
    $row = mysqli_fetch_assoc($result);

    if(password_verify($password, $row["password"])){
      $_SESSION["login"]= true;
      if(isset($_POST['remember'])){
        setcookie('login', 'true', time() +60);
      }
        header("Location:index.php");
        exit;
    }
  }
  $error= true;
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
    <link href ="styles.css" rel="stylesheet">
    <title>Log In</title>
  </head>
  <body>
    <div class="global-container">
      <div class="card login-form">
        <div class="card-body">
            <span class="BorderTopBottom"></span>
            <span class="BorderLeftRight"></span>
          <h1 class="card-title text-center">L O G I N</h1>
        </div>
    <?php
      if(isset($error)):?>
        <div class="alert alert-danger" role="alert">
          username / password salah !!!
        </div>
    <?php endif; ?>
      <div class="card-text">  
        <form action="" method= "post" enctype="multipart/form-data">
          <div class="mb-2">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" id="username" autocomplete="off">
          </div>
          <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password" id="password">
          </div>
          <div>
            <input type="checkbox"name="remember" id="remember">
            <label for="remember">Remember me</label>
          </div>
          </div>
            <button type="submit" class="btn btn-success" name="login">Login</button>
          <div>
            <p class="fst-italic">Tidak ada akun ? <a href="registrasi.php" type="text">Registrasi</a>  </p>
          </div>
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