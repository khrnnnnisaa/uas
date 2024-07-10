<?php

include 'config.php';

$id = $_GET['id'];  
$mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id = '$id' LIMIT 1");
$data = mysqli_fetch_assoc($mahasiswa);

if(isset($_POST['edit'])){
    $npm = $_POST['npm'];
    $nama = $_POST['nama'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];

    mysqli_query($conn, "UPDATE mahasiswa SET npm = '$npm', nama = '$nama', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir', jenis_kelamin = '$jenis_kelamin', alamat = '$alamat', telp = '$telp' WHERE id = '$id'");
    echo "
        <script>
            alert('Berhasil Edit Data!');
            window.location.href='mahasiswa.php'
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
        <h4>Edit Data Mahasiswa</h4>
        <a href="mahasiswa.php" class="btn btn-primary">Kembali</a>
        <form action="" method="POST" class="my-3 p-3">
            <label>NPM</label> <br>
            <input type="number" value="<?= $data['npm']; ?>" name="npm" class="form-control mb-3 required">
            <label>Nama</label> <br>
            <input type="text" value="<?= $data['nama']; ?>" name="nama" class="form-control mb-3 required">
            <label>Tempat Lahir</label> <br>
            <input type="text" value="<?= $data['tempat_lahir']; ?>" name="tempat_lahir" class="form-control mb-3 required">
            <label>Tanggal Lahir</label> <br>
            <input type="date" value="<?= $data['tgl_lahir']; ?>" name="tgl_lahir" class="form-control mb-3 required">
            <label>Jenis Kelamin</label> <br>
            <select name="jenis_kelamin" class="form-control mb-3 required">
                <option value="perempuan" <?= $data['jenis_kelamin'] == 'perempuan' ? 'selected' : '' ?>>perempuan</option>
                <option value="laki-laki" <?= $data['jenis_kelamin'] == 'laki-laki' ? 'selected' : '' ?>>laki-laki</option>
            </select>
            <label>Alamat</label> <br>
            <input type="text" value="<?= $data['alamat'];?>" name="alamat" class="form-control mb-3 required">
            <label>Telp</label> <br>
            <input type="number" value="<?= $data['telp'];?>" name="telp" class="form-control mb-3 required">
            <button type="submit" name="edit" class="btn btn-success w-100">Edit</button>
        </form>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>