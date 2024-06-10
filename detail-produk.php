<?php
require 'koneksi.php';

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
    <link rel="stylesheet" href="css/detail-produk-user.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Title -->
    <title>Detail produk</title>

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-transparent" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand me-4" href="#">
                <img src="image/logo.jpg" alt="Logo" width="50" height="50" class="d-inline-block align-text-center"> NaoStore
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item me-4">
                        <a class="nav-link beranda" href="user.php">Beranda</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="produk-user.php">Produk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- Navbar end -->

    <!-- Detail produk -->
    <div class="container container-detail mt-5">
        <div class="text-center text">
            <h3>Detail produk</h3>
        </div>
        <div class="text-center detail">
            <h4><?= ($produk['nama_produk']); ?></h4>
            <img src="admin/<?= ($produk['img']); ?>" alt="<?= ($produk['nama_produk']); ?>" class="img-fluid">
            <h4>Harga: <?= "Rp " . number_format($produk['harga_produk'], 2, ',', '.'); ?></h4>
        </div>
        <div class="deskripsi">
            <p>Deskripsi: <?= ($produk['deskripsi_produk']); ?></p>
            <p>Kode Produk: <?= ($produk['kode_produk']); ?></p>
            <p>Kategori: <?= ($produk['id_kategori']); ?></p>
        </div>
        <div class="tombol d-flex justify-content-between">
            <a href="produk-user.php" class="btn btn-back">Kembali ke beranda</a>
            <a href="https://www.instagram.com/direct/t/117386922984911" class="btn btn-buy">Beli barang ini</a>
        </div>
    </div>
    <!-- Detail produk end -->

    <!-- Footer -->
    <?php include "footer.php"; ?>
    <!-- End footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>