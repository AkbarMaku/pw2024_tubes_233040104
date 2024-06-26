<?php
require 'koneksi.php';

$queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
?>

<!doctype html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Link -->
    <link rel="icon" href="image/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/kategori-user.css">

    <!-- Title -->
    <title>NaoStore</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar sticky-top navbar-expand-lg bg-transperant" data-bs-theme="dark">
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
                        <a class="nav-link active" href="kategori-user.php">Kategori</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="produk-user.php">Produk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End navbar -->

    <!-- Card -->
    <div class="container mt-3 text-center">
        <h2>Semua Kategori di NaoStore</h2>
        <div class="row">
            <?php foreach ($queryKategori as $kategori) : ?>
                <div class="col-md-6 mb-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title"><?= $kategori['nama_kategori'] ?></h5>
                            <a href="produk-kategori.php?kategori=<?= $kategori['id_kategori'] ?>" class="btn btn-primary">Lihat Produk</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- End card -->

    <!-- Footer -->
    <?php include "footer.php"; ?>
    <!-- End footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>