<?php
require '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // Panggil fungsi tambah produk dengan data POST dan file
   tambahProduk($_POST, $_FILES['img']);
}

