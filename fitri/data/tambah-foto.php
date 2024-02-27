<?php
session_start();
if( !isset($_SESSION['login'])) {
 header("location: ../index.php");
 exit;
}

require '../config.php';


if( isset($_POST['tambah_foto'])){
    if(tambah_foto($_POST) > 0){
        echo "<script>
        alert('anda berhasil menambahkan foto');
        document.location.href = 'index.php';
        </script>";
    }else{
       echo mysqli_error($conn);
    }
}

$title_web = 'Foto';

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
                    
                        <h2 class="card-header" >Tambah Foto</h2>

                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">

                            <div class="mb-3">
                                <label class="form-label" for="nama_foto">Nama Foto</label>
                                <input class="form-control" type="text" name="nama_foto">
                            </div>
                            
                            <div class="mb-3">
                                <label class="form-label" for="deskripsi_foto">Deskripsi Foto</label>
                                <textarea class="form-control" name="deskripsi_foto" id="" cols="5" rows="5"></textarea>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="gambar_foto">Masukan Foto</label>
                                <input class="form-control" type="file" name="gambar_foto">
                            </div>

                            <div class="mb-3 row">
                                <label for="id_kategori" class="col-sm-5 col-form-label">Plih Kategori</label>
                                    <div class="col-sm-12">
                                        <select class="form-select" name="id_kategori" id="kategori" aria-label="default select example">
                                            <?php $result = mysqli_query($conn, "SELECT * FROM kategori");
                                                while($data = mysqli_fetch_array($result)) {
                                            ?>
                                            <option value="<?= $data['id_kategori'] ?>"><?php echo $data['nama_kategori'] ?></option>
                                            <?php
                                         }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                            <div class="mb-2 text-center">
                                <button class="btn btn-info" type="submit" name="tambah_foto">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>/
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
    </script>

</body>
</html>