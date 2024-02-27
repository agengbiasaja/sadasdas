<?php
session_start();

if( isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}
require 'config.php';

if ( isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    //cek username
    if(mysqli_num_rows($result) === 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"]) ) {

            //set session
            $_SESSION["login"] = true;
            $_SESSION["username"] = $username;
            $_SESSION["user_id"] = $row["user_id"];

            header("location: data/index.php?pesan=login");
            exit;
        }
    }

    $error = true;
}

if( isset($error)){
  echo "<script> alert('Username / password anda salah!'); </script>";
 }
 $title_web = 'Login';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery | <?php echo $title_web ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> 
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

  <section class="vh-100 gradient-custom">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card" style="border-radius: 1rem;">

            <div class="card-title  text-center"><br>
              <h2  align="center">Login</h2>
            </div>

            <div class="card-body">
              <div class="mb-md-5 mt-md-4 pb-5">
                <form action="" method="post">
                  <div class="mb-3">
                    <label class="form-label" for="username">Username</label>
                    <input class="form-control" type="text" name="username">
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="password">Password</label>
                    <input  class="form-control" type="password" name="password">
                  </div>

                  <div class="mb-2 text-center">
                    <button class="btn btn-info" type="submit" name="login">Login</button>
                  </div>

                  <span>
                    Belum Punya Akun <a href="daftar.php" >Daftar</a>
                  </span>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </script>

</body>

</html>