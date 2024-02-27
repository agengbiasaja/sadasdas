<?php 
session_start();
if( !isset($_SESSION['login'])) {
 header("location: ../index.php");
 exit;
}

require '../config.php';

$username = $_SESSION['username'];
$userid = $_SESSION['user_id'];

$hasil = mysqli_query($conn, "SELECT * FROM foto");
$title_web = 'Home';

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
    <?php include'nav.php'; ?>

    <style type="text/css">
        .card-text-tgl{
            font-size: 10px;
        }
    </style>

    <div class="container">
    <h1 class="text-center" style="margin-top: 100px;">Selamat Datang <?= $username ?></h1>

    <br>

    <div class="container">
        <div class="row">
            <?php foreach($hasil as $gambar) : ?>
            <div class="col-md-4">
                <div class="card" style="width: 20rem; height: 20rem;">
                    <img src="../img/<?= $gambar['gambar_foto'] ?>" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text-tgl"><?= $gambar['created_at'] ?></p>
                        <h5 align="center" class="card-title"><?= $gambar['nama_foto'] ?></h5>
                        <p class="card-text"><?= $gambar['deskripsi_foto'] ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </script>

</body>
</html>