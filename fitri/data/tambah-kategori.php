<?php
session_start();
if( !isset($_SESSION['login'])) {
 header("location: ../index.php");
 exit;
}

require '../config.php';


if( isset($_POST['kategori'])){
    if(kategori($_POST) > 0){
        echo "<script>
        alert('anda berhasil menambahkan album');
        document.location.href = 'index.php';
        </script>";
    }else{
       echo mysqli_error($conn);
    }
}

$title_web = 'Kategori';

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
        <div class="d-flex justify-content-center" style="margin-top: 100px;">
            <div class="row d-flex align-items-center">
                <div class="card">   
                    <h2 class="card-header">Tambah Kategori</h2>
                    <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="form-label" for="nama_kategori">Nama Kategori</label>
                            <input class="form-control" type="text" name="nama_kategori">
                        </div>
        
                        <div class="mb-2 text-center">
                            <button class="btn btn-info" type="submit" name="kategori">Tambah</button>
                        </div>
                    </form>
                </div>
                </div>
            </div>
        </div><br><br>

    <div class="container">
        <table border="1" class="table">
            <thead>
                <tr>
                    <th scope="col">Kategori</th>
                </tr>
            </thead>
            <tbody>
                <?php $result = mysqli_query($conn, "SELECT * FROM kategori");
                             while($data = mysqli_fetch_array($result)) {
                                ?>
                <tr>
                    <td><?php echo $data['nama_kategori'] ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </script>

</body>
</html>