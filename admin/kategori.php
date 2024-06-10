<?php
session_start();

if (!isset($_SESSION["login"])) {
    header("location: ../login/login.php");
    exit;
}

require "../koneksi.php";

$queryKategori = query("SELECT * FROM kategori");
$jumlahKategori = count($queryKategori);

if (isset($_POST["cariKat"])) {
    $queryKategori = cariKat($_POST["keywordKat"]);
}
?>

<!doctype html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- End meta -->

    <title>Kategori</title>

    <!-- Link -->
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
                        <a class="nav-link active" href="kategori.php">Kategori</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="index.php">Beranda</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="produk.php">Produk</a>
                    </li>
                    <li class="nav-item me-4">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="" method="POST">
                    <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Search" name="keywordKat" autofocus autocomplete="off" id="keywordKat">
                    <button class="btn btn-outline-success" type="submit" name="cariKat" id="cariKat">Cari</button>
                </form>
            </div>
        </div>
    </nav>
    <!-- End navbar -->

    <!-- Table -->
    <div class="container mt-3" id="container">
        <h2>DAFTAR KATEGORI KENDERAAN HONDA</h2>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($jumlahKategori == 0) : ?>
                    <tr>
                        <td colspan=3 class="text-center">Data kategori tidak tersedia</td>
                    </tr>
                <?php endif; ?>
                <?php if ($jumlahKategori > 0) : ?>
                    <?php $i = 1; ?>
                    <?php foreach ($queryKategori as $data) : ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?php echo $data['nama_kategori'] ?></td>
                            <td>
                                <a href="ubah-kategori.php?id=<?php echo $data['id_kategori']; ?>" class="badge text-bg-warning text-decoration-none">ubah</a>
                                <a href="hapus-kategori.php?p=<?php echo $data['id_kategori']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?');" class="badge text-bg-danger text-decoration-none">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <!-- End table -->

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalTambah">
            Tambah Kategori
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Form tambah kategori</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" action="tambah-kategori.php">
                        <div class="modal-body">
                            <label class="form-label">Nama kategori</label>
                            <input class="form-control form-control-lg" type="text" placeholder="Masukkan nama kategori disini" name="tkat" required>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary" name="simpanKat">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- End modal -->

    <script src="../js/kategori.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>