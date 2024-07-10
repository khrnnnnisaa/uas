<?php

include 'config.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM dosen WHERE id = '$id'");

echo "
    <script>
        alert('Berhasil Hapus Data!');
        window.location.href='dosen.php'
    </script>
";
