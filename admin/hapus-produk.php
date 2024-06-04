<?php 
    require '../koneksi.php';

    $id = $_GET["id"];

    if(hapusProduk($id) > 0) {
        echo "<script>
            alert('Data berhasil dihapus');
            document.location='produk.php';
        </script>
        ";
    } else {
        echo "<script>
            alert('Gagal menghapus data');
            document.location='produk.php';
        </script>
        ";
    }
?>