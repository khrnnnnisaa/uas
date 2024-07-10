<?php
include 'config.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM nilai WHERE id = '$id'");
echo "
    <script>
        alert('Berhasil Hapus Data!');
        window.location.href='nilai.php'
    </script>
";
?>
