<?php

include 'config.php';

$id = $_GET['id'];  


mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = '$id'");
echo "
    <script>
        alert('Berhasil Edit Data!');
        window.location.href='mahasiswa.php'
    </script>
";
exit;


?>
