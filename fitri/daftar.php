<?php 
session_start();

if( isset($_SESSION["login"])) {
    header("location: index.php");
    exit;
}

require 'config.php';

if( isset($_POST['daftar'])){
    if(register($_POST) > 0){
        echo "<script>
        alert('anda berhasil mendaftar');
        document.location.href = 'index.php';
        </script>";
    }else{
       echo mysqli_error($conn);
    }
}

 $title_web = 'Daftar';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery | <?php echo $title_web ?> </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="card-title  text-center"><br>
                            <h2  align="center">Daftar</h2>
                        </div>
                        <div class="card-body">
                            <div class="mb-md-5 mt-md-4 pb-5">
                                <form action="" method="post">
                                    <div class="card-body">

                                        <div class="row mb-3">  
                                            <label class="form-label " for="username">Username</label>
                                            <input class="form-control" type="text" name="username" autocomplete="off" required="required"/>
                                        </div>
                        
                                        <div class="row mb-3">  
                                            <label class="form-label " for="password">Password</label>
                                            <input class="form-control" type="text" name="password" autocomplete="off" required="required"/>
                                        </div>

                                        <div class="row mb-3"> 
                                            <label class="form-label " for="email">Email</label>
                                            <input class="form-control" type="email" name="email" autocomplete="off" required="required"/>
                                        </div>

                                        <div class="row mb-3"> 
                                            <label class="form-label " for="nama_lengkap">Nama Lengkap</label>
                                            <input class="form-control" type="text" name="nama_lengkap" autocomplete="off" required="required"/>
                                        </div>

                                        <div class="row mb-3"> 
                                            <label class="form-label " for="alamat">Alamat</label>
                                            <input class="form-control" type="text" name="alamat" autocomplete="off" required="required"/>
                                        </div>

                                        <div class="mb-2 text-center">
                                            <button class="btn btn-info" type="submit" name="daftar">Daftar</button>
                                        </div>

                                        <span>
                                            Sudah Punya Akun <a href="index.php" >Login</a>
                                        </span>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</body>
</html>