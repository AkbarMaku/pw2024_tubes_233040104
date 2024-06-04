<?php
// Include koneksi
include '../koneksi.php';

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
?>


<!doctype html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Link -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Title -->
    <title>Detail produk</title>

</head>

<body>

    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h3>Detail Produk</h3>
            </div>
            <div class="card-body">
                <h4><?= ($produk['nama_produk']); ?></h4>
                <p>Harga: <?= ($produk['harga_produk']); ?></p>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>