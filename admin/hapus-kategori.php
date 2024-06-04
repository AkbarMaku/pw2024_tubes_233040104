<?php 
    require '../koneksi.php';

    $id = $_GET["p"];

    if(hapusKategori($id) > 0) {
        echo "<script>
            alert('Data berhasil dihapus');
            document.location='kategori.php';
        </script>
        ";
    } else {
        echo "<script>
            alert('Gagal menghapus data');
            document.location='kategori.php';
        </script>
        ";
    }
?>