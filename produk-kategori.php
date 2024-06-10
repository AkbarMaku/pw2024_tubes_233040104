<?php
require 'koneksi.php';

// Ambil ID kategori dari URL
$id_kategori = isset($_GET['kategori']) ? $_GET['kategori'] : null;

if ($id_kategori) {
    // Ambil produk berdasarkan ID kategori
    $queryProduk = query("SELECT * FROM produk WHERE id_kategori = '$id_kategori'");
} else {
    // Jika tidak ada ID kategori, ambil semua produk
    $queryProduk = query("SELECT * FROM produk");
}
?>

<!doctype html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- End meta -->

    <title>Produk</title>

    <!-- Link -->
    <link rel="icon" href="../image/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/produk.kategori.css">
    <!-- End link -->

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar sticky-bottom navbar-expand-lg bg-transparent" data-bs-theme="dark">
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
                        <a class="nav-link" href="user.php">Beranda</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="kategori-user.php">Kategori</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link active" href="produk-user.php">Produk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End navbar -->

    <div class="container mt-3" id="container">
        <div class="row">
            <?php if ($queryProduk) : ?>
                <?php foreach ($queryProduk as $data) : ?>
                    <div class="col-md-4 mb-3">
                        <div class="card" style="width: 18rem;">
                            <img src="admin/<?= $data['img'] ?>" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $data['nama_produk'] ?></h5>
                                <p class="card-text"><?= "Rp " . number_format($data['harga_produk'], 2, ',', '.'); ?></p>
                                <a href="detail-produk.php?id_produk=<?= $data['id_produk'] ?>" class="btn btn-primary">Lihat detail produk</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="alert alert-info" role="alert">
                    Maaf produk dalam kategori ini belum tersedia
                </div> <?php endif; ?>
        </div>
    </div>

    <!-- Footer -->
    <?php include "footer.php"; ?>
    <!-- End footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>