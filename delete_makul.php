<?php
include 'config.php';

$id = $_GET['id'];

mysqli_query($conn, "DELETE FROM makul WHERE id = '$id'");
echo "
    <script>
        alert('Berhasil Hapus Data!');
        window.location.href='makul.php'
    </script>
";
?>
