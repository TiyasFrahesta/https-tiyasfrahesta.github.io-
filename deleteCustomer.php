<?php 
require 'function.php';
$idcust = $_GET['id'];
if ( hapusCustomer ($idcust) > 0 ) {
    echo "
        <script>
            alert ('Data berhasil dihapus');
            document.location.href = 'listCustomer.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus');
            document.location.href = 'listCustomer.php';
        </script>
    ";
}
