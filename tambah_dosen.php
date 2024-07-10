<?php

include 'config.php';

if(isset($_POST['tambah'])){
    $nidn = $_POST['nidn'];
    $nama_dosen = $_POST['nama_dosen'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $alamat = $_POST['alamat'];

    mysqli_query($conn, "INSERT INTO dosen VALUES (NULL, '$nidn', '$nama_dosen', '$tempat_lahir', '$tgl_lahir', '$alamat')");
    echo "
        <script>
            alert('Berhasil Tambah Data!');
            window.location.href='dosen.php'
        </script>
    ";
    exit;
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>UAS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mahasiswa.php">Mahasiswa</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="nilai.php">Nilai</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="makul.php">Makul</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dosen.php">Dosen</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
   
    <div class="container p-5">
        <h4>Tambah Data Dosen</h4>
        <a href="dosen.php" class="btn btn-primary">Kembali</a>
        <form action="" method="POST" class="my-3 p-3">
            <label>NIDN</label> <br>
            <input type="text" name="nidn" class="form-control mb-3 required">
            <label>Nama Dosen</label> <br>
            <input type="text" name="nama_dosen" class="form-control mb-3 required">
            <label>Tempat Lahir</label> <br>
            <input type="text" name="tempat_lahir" class="form-control mb-3 required">
            <label>Tanggal Lahir</label> <br>
            <input type="date" name="tgl_lahir" class="form-control mb-3 required">
            <label>Alamat</label> <br>
            <input type="text" name="alamat" class="form-control mb-3 required">
            <button type="submit" name="tambah" class="btn btn-success w-100">Tambah</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
