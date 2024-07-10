<?php
include 'config.php';

$id = $_GET['id'];  
$nilai = mysqli_query($conn, "SELECT * FROM nilai WHERE id = '$id' LIMIT 1");
$data = mysqli_fetch_assoc($nilai);

$makul = mysqli_query($conn, "SELECT * FROM makul");
$mahasiswa = mysqli_query($conn, "SELECT * FROM mahasiswa");

if(isset($_POST['edit'])){
    $makul_id = $_POST['makul_id'];
    $mahasiswa_id = $_POST['mahasiswa_id'];
    $nilai = $_POST['nilai'];

    mysqli_query($conn, "UPDATE nilai SET makul_id = '$makul_id', mahasiswa_id = '$mahasiswa_id', nilai = '$nilai' WHERE id = '$id'");
    echo "
        <script>
            alert('Berhasil Edit Data!');
            window.location.href='nilai.php'
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
        <h4>Edit Data Nilai</h4>
        <a href="nilai.php" class="btn btn-primary">Kembali</a>
        <form action="" method="POST" class="my-3 p-3">
            <label>Mata Kuliah</label> <br>
            <select name="makul_id" class="form-control mb-3 required">
                <?php foreach($makul as $m) : ?>
                    <option value="<?= $m['id'] ?>" <?= $data['makul_id'] == $m['id'] ? 'selected' : '' ?>><?= $m['nama_makul'] ?></option>
                <?php endforeach; ?>
            </select>
            <label>Mahasiswa</label> <br>
            <select name="mahasiswa_id" class="form-control mb-3 required">
                <?php foreach($mahasiswa as $mhs) : ?>
                    <option value="<?= $mhs['id'] ?>" <?= $data['mahasiswa_id'] == $mhs['id'] ? 'selected' : '' ?>><?= $mhs['nama'] ?></option>
                <?php endforeach; ?>
            </select>
            <label>Nilai</label> <br>
            <input type="number" name="nilai" value="<?= $data['nilai'] ?>" class="form-control mb-3 required" step="0.01">
            <button type="submit" name="edit" class="btn btn-success w-100">Edit</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
