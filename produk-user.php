<?php
require 'koneksi.php';

$queryProduk = query("SELECT * FROM produk");
$jumlahProduk = count($queryProduk);

$kategori = getKategori();

if (isset($_POST["cariPdk"])) {
    $queryProduk = cariPdk($_POST["keywordPdk"]);
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
    <link rel="icon" href="image/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/produk-user.css">
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
                <form class="d-flex" role="search" action="" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Search" name="keywordPdk" autofocus autocomplete="off" id="keywordUsr">
                    <button class="btn btn-outline-success" type="submit" name="cariPdk" id="cariUsr">Cari</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- End navbar -->

    <!-- Card -->
    <div class="container mt-3" id="containerUsr">
        <div class="row">
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
        </div>
    </div>
    <!-- End card -->

    <!-- Footer -->
    <footer class="text-center footer">
        <!-- Grid container -->
        <div class="container p-4 pb-0 container-footer">
            <!-- Section: Social media -->
            <section class="mb-4">
                <!-- Facebook -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #3b5998;" href="https://www.facebook.com/akbar.maku.71/?locale=id_ID" role="button"><i class='bx bxl-facebook-square bx-sm'></i></a>

                <!-- Instagram -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #ac2bac;" href="https://www.instagram.com/aakbarmaku/" role="button"><i class="bx bxl-instagram bx-sm"></i></a>

                <!-- Linkedin -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #0082ca;" href="https://www.linkedin.com/in/akbar-maku-a5a627298?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app" role="button"><i class="bx bxl-linkedin bx-sm"></i></a>

                <!-- Github -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1" style="background-color: #333333;" href="https://github.com/AkbarMaku" role="button"><i class="bx bxl-github bx-sm"></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05);">
            © 2024 Copyright: NaoStore
        </div>
        <!-- Copyright -->
    </footer>
    <!-- End footer -->

    <script src="./js/produkuser.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>