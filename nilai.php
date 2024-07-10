<?php
include 'config.php';
$nilai = mysqli_query($conn, "SELECT nilai.id, makul.nama_makul, mahasiswa.nama, nilai.nilai FROM nilai 
JOIN makul ON nilai.makul_id = makul.id 
JOIN mahasiswa ON nilai.mahasiswa_id = mahasiswa.id");
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
        <h4>Data Nilai</h4>
        <a href="tambah_nilai.php" class="btn btn-primary">Tambah Nilai</a>
        <table class="table my-3">
            <thead>
                <tr>
                    <th>Nama Mata Kuliah</th>
                    <th>Nama Mahasiswa</th>
                    <th>Nilai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($nilai as $data) : ?>
                    <tr>
                        <td><?= $data['nama_makul'] ?></td>
                        <td><?= $data['nama'] ?></td>
                        <td><?= $data['nilai'] ?></td>
                        <td>
                            <a href="edit_nilai.php?id=<?= $data['id'];?>" class="btn btn-warning">Edit</a>
                            <br>
                            <a href="delete_nilai.php?id=<?= $data['id'];?>" onclick="return confirm('Apakah anda yakin ingin hapus data ini ?')" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>    
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>
