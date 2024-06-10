<?php
session_start();

if(!isset($_SESSION["login"])) {
  header("location: ../login/login.php");
  exit;
}

require '../koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // Panggil fungsi tambah produk dengan data POST dan file
   tambahProduk($_POST, $_FILES['img']);
}

