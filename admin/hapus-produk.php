<?php
    session_start();

    if(!isset($_SESSION["login"])) {
      header("location: ../login/login.php");
      exit;
    }

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