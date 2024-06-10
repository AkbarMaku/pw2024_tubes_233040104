<?php
require '../koneksi.php';
$keywordUsr = $_GET["keywordUsr"];
$queryProduk = query("SELECT * FROM produk WHERE nama_produk LIKE '%$keywordUsr%'");
$jumlahProduk = count($queryProduk);
?>

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
<!-- End modal -->