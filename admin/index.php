<?php 
    require "../koneksi.php";

    $queryKategori = mysqli_query($conn, "SELECT * FROM kategori");
    $jumlahKategori = mysqli_num_rows($queryKategori);

    $queryProduk = mysqli_query($conn, "SELECT * FROM produk");
    $jumlahProduk = mysqli_num_rows($queryProduk);
?>

<!doctype html>
<html lang="en">
  <head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- End meta -->

    <title>NaoStore</title>

    <!-- Link -->
    <link rel="stylesheet" href="footer.css">
    <link rel="icon" href="../image/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- End link -->

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
              <a class="nav-link active" href="../admin">Beranda</a>
            </li>
            <li class="nav-item me-4">
              <a class="nav-link" href="kategori.php">Kategori</a>
            </li>
            <li class="nav-item me-4">
              <a class="nav-link" href="produk.php">Produk</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar end -->

    <!-- Card -->
    <div class="container">
      <h1>SELAMAT DATANG DI NAOSTORE MARKETPLACE HONDA</h1>
    <div class="row row-cols-4 row-cols-md-3 g-4 ms-5">
      <div class="col">
        <div class="card mt-5 text-center text-bg-info" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title fs-3">Kategori</h5>
            <p class="card-text fs-7">
              <?php echo $jumlahKategori; ?> Kategori
            </p>
            <a href="kategori.php" class="btn btn-primary">Lihat detail</a>
          </div>
        </div>
      </div>
      <div class="col">
        <div class="card mt-5 text-center text-bg-info" style="width: 18rem;">
          <div class="card-body">
            <h5 class="card-title fs-3">Produk</h5>
            <p class="card-text fs-7">
              <?php echo $jumlahProduk; ?> Produk
            </p>
            <a href="produk.php" class="btn btn-primary">Lihat detail</a>
          </div>
        </div>
      </div>
    </div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>