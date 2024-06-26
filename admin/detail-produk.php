<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: ../login/login.php");
    exit;
}

require '../koneksi.php';

// Cek apakah id_produk tersedia di URL
if (isset($_GET['id_produk'])) {
    $id_produk = $_GET['id_produk'];
    $produk = getProdukById($id_produk);

    if (!$produk) {
        die('Produk tidak ditemukan.');
    }
} else {
    die('ID produk tidak disediakan.');
}

$kategori = getKategori()
?>


<!doctype html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Link -->
    <link rel="icon" href="../image/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Title -->
    <title>Detail produk</title>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand me-4" href="#">
                <img src="../image/logo.jpg" alt="Logo" width="50" height="50" class="d-inline-block align-text-center"> NaoStore
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-4">
                        <a class="nav-link" href="produk.php">Produk</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Detail produk -->
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h3>Detail Produk</h3>
            </div>
            <div class="card-body">
                <h4><?= ($produk['nama_produk']); ?></h4>
                <p>Harga: <?= "Rp " . number_format($produk['harga_produk'], 2, ',', '.'); ?></p>
                <p>Deskripsi: <?= ($produk['deskripsi_produk']); ?></p>
                <p>Kode Produk: <?= ($produk['kode_produk']); ?></p>
                <p>Kategori: <?= ($produk['id_kategori']); ?></p>
                <img src="<?= ($produk['img']); ?>" alt="<?= ($produk['nama_produk']); ?>" class="img-fluid">
                <br><br>
                <div class="d-flex justify-content-between">
                    <div>
                        <a href="produk.php" class="btn btn-primary">Kembali ke Daftar Produk</a>
                        <a href="ubah-produk.php?id_produk=<?= $produk['id_produk']; ?>" class="btn btn-primary">Ubah data produk</a>
                    </div>
                    <a href="hapus-produk.php?id=<?= $produk['id_produk']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?');" class="btn btn-danger">Hapus data produk</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Detail produk end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>