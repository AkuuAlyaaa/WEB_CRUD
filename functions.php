<?php
$conn= mysqli_connect("localhost", "root", "", "contohphp");
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
     $rows[] = $row;
    }
    return $rows;
   }
function tambah($data){
    global $conn;
    $nim= htmlspecialchars($data["nim"]);
    $nama= htmlspecialchars($data["nama"]);
    $kelas= htmlspecialchars($data["kelas"]);
    $jurusan= htmlspecialchars($data["jurusan"]);
    $gambar= upload();
    if(!$gambar){
        return false;
    }
    $query= "INSERT INTO data VALUES ('', '$nim', '$nama', '$kelas', '$jurusan', '$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
   }
function upload(){
    $namaFile= $_FILES['gambar']['name'];
    $ukuranFile= $_FILES['gambar']['size'];
    $error= $_FILES['gambar']['error'];
    $tmpName= $_FILES['gambar']['tmp_name'];

    if($error === 4){
        echo "<script> alert('Silahkan upload gambar!');</script>";
        return false;
    }
    $ekstensiGambarValid= ['jpg', 'jpeg', 'png'];
    $ekstensiGambar= explode('.', $namaFile);
    $ekstensiGambar= strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar, $ekstensiGambarValid)){
        echo "<script> alert('Mohon upload gambar yang sesuai');</script>";
        return false;
    }
    if($ukuranFile > 1000000 ){
        echo "<script> alert('Ukuran gambar terlalu besar!');</script>";
        return false;
    }
    $namaFileBaru= uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'gambar/' . $namaFileBaru);
    return $namaFileBaru;


}
function hapus($id){
    global $conn;
    mysqli_query($conn, "DELETE FROM data WHERE id = $id");

    return mysqli_affected_rows($conn);
}
function edit($data){
    global $conn;
    $id= $data["id"];
    $nim= htmlspecialchars($data["nim"]);
    $nama= htmlspecialchars($data["nama"]);
    $kelas= htmlspecialchars($data["kelas"]);
    $jurusan= htmlspecialchars($data["jurusan"]);
    $gambarLama= htmlspecialchars($data["gambarlama"]);

    if($_FILES['gambar']['error'] === 4 ){
        $gambar= $gambarLama;
    } else{
        $gambar= upload();
    }
    $query= "UPDATE data SET nim='$nim', nama='$nama', kelas='$kelas', jurusan='$jurusan', gambar='$gambar' WHERE id=$id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
   }
function cari($keyword){
    $query= "SELECT * FROM data WHERE nim LIKE '%$keyword%' OR  nama LIKE '%$keyword%' OR kelas LIKE '%$keyword%' OR jurusan LIKE '%$keyword%'";
    return query($query);
}
function registrasi($data){
    global $conn;
    $username= strtolower(stripslashes($data["username"]));
    $nohp= ($data["nohp"]);
    $email= ($data["email"]);
    $password= mysqli_real_escape_string($conn, $data["password"]);
    $password2= mysqli_real_escape_string($conn, $data["password2"]);

    $result= mysqli_query($conn, "SELECT username FROM user WHERE username='$username'");
        if(mysqli_fetch_assoc($result)){
            echo "
            <script> 
              alert('Username sudah terdaftar!');
            </script>
            ";
        return false;
        } 
    if($password !== $password2){
        echo"<script>
                alert('Konfirmasi password tidak sesuai');
            </script>";

        return false;
    }
    $password= password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($conn, "INSERT INTO user VALUES ('', '$username', '$nohp', '$email', '$password')");

    return mysqli_affected_rows($conn);
}
?>