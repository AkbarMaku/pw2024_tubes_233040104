<?php
require '../koneksi.php';

if (isset($_POST['tambahProduk'])) {
   if (tambahProduk($_POST) > 0) {
    echo "<script>
            alert('data berhasil ditambah');
            document.location.href = 'index.php';
          </script>";
   }
}
