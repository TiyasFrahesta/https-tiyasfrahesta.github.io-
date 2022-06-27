<?php 
require 'function.php';
if (isset($_POST['submit'])) {
    // inisisasi  var
    if (tambah($_POST) > 0) {
        echo " <script>
                    alert('Data Berhasil Ditambahkan!');
                    document.location.href = 'listBarang.php';
                </script>";
    } else {
        echo " <script>
                    alert('Data Gagal Ditambahkan!');
                    document.location.href = 'listBarang.php';
                </script>";

    }
}
?>