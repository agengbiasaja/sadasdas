<?php

$conn = mysqli_connect("localhost","root","","gallery");

$url = 'http://localhost/gallery/';
global $url;

function register($data){
    global $conn;

    $username = $data['username'];
    $password = $data['password'];
    $email = $data['email'];
    $nama_lengkap = $data['nama_lengkap'];
    $alamat = $data['alamat'];

    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");

    //seleksi
    if(mysqli_fetch_assoc($result)) {
        echo "<script>alert('username sudah digunakan')</script>";
        return false;
    }

    //password hash
    $password = password_hash($password, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','$email','$nama_lengkap','$alamat')");
    return mysqli_affected_rows($conn);
    
}

function kategori($data){
    global $conn;
    $nama_kategori = $data['nama_kategori'];
    

    mysqli_query($conn, "INSERT INTO kategori VALUES('','$nama_kategori')");
    return mysqli_affected_rows($conn);

}

function upload() {
    $namaFile = $_FILES['gambar_foto']['name'];
    $ukuranFile = $_FILES['gambar_foto']['size'];
    $error = $_FILES['gambar_foto']['error'];
    $tmpName = $_FILES['gambar_foto']['tmp_name'];


    if ($error === 4) {
        echo "<script>
        alert('pilih gambar terlebih dahulu!!');
        </script>";
        return false;
    }

    $ekstensiGambarValid = ['jpg', 'png', 'jpeg'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if ( !in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
        alert('yang anda upload bukan gambar!!');
        </script>";
        return false;
    }

    if ($ukuranFile > 1000000) {
        echo "<script>
        alert('ukuran gambar terlalu besar');
        </script>";
        return false;
    }

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../img/' . $namaFileBaru);

    return $namaFileBaru;
}


function tambah_foto($data){
    global $conn;
    $id_kategori = $data['id_kategori'];
    $nama_foto = $data['nama_foto'];
    $deskripsi_foto = $data['deskripsi_foto'];

    //foto
      // gambar
      $gambar_foto = upload();
      if( !$gambar_foto) {
          return false;
      }

    mysqli_query($conn, "INSERT INTO foto VALUES('','$id_kategori','$nama_foto','$deskripsi_foto','$gambar_foto',NOW(),NOW())");
    return mysqli_affected_rows($conn);
}


?>