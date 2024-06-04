<?php
    require "../koneksi.php";

    $queryProduk = query("SELECT * FROM produk");
    $jumlahProduk = count($queryProduk);

    $kategori = getKategori();

    if(isset($_POST["cariPdk"])) {
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
    <link rel="icon" href="../image/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- End link -->

</head>

<body>

    <!-- Navbar -->
    <nav class="navbar sticky-bottom navbar-expand-lg bg-primary" data-bs-theme="dark">
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
                        <a class="nav-link active" href="produk.php">Produk</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="kategori.php">Kategori</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Search" name="keywordPdk" autofocus autocomplete="off">
                    <button class="btn btn-outline-success" type="submit" name="cariPdk">Cari</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- End navbar -->

    <div class="container mt-3">
        <div class="row">
            <?php foreach ($queryProduk as $data) : ?>
                <div class="col-md-4">
                    <div class="card" style="width: 18rem;">
                        <img src="<?= $data['img'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['nama_produk'] ?></h5>
                            <p class="card-text"><?= $data['harga_produk'] ?></p>
                            <a href="detail-produk.php?id_produk=<?= $data['id_produk'] ?>" class="btn btn-primary">Lihat detail produk</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
            Tambah Produk
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form tambah produk</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" action="tambah-produk.php" enctype="multipart/form-data">
                        <div class="modal-body">

                            <label class="form-label">Nama produk</label>
                            <input class="form-control form-control-lg" type="text" placeholder="Masukkan nama produk disini" name="namaPdk">

                            <label class="form-label">Harga produk</label>
                            <input class="form-control form-control-lg" type="text" placeholder="Masukkan nama produk disini" name="hargaPdk">

                            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi produk</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskPdk"></textarea>

                            <label class="form-label">Kode produk</label>
                            <input class="form-control form-control-lg mb-3" type="text" placeholder="Masukkan nama produk disini" name="kodePdk">

                            <select class="form-select" aria-label="Default select example" name="id_kategori">
                                <option selected>Kategori</option>
                                <?php foreach ($kategori as $kat) : ?>
                                    <option value="<?= $kat['id_kategori']; ?>"><?= htmlspecialchars($kat['nama_kategori']); ?></option>
                                <?php endforeach; ?>
                            </select>

                            <label class="form-label mt-3">Foto produk</label>
                            <input class="form-control form-control-lg" type="file" placeholder="Masukkan nama produk disini" name="img">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" name="tambahProduk">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End modal -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>