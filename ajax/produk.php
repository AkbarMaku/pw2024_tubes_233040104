<?php
require '../koneksi.php';
$keywordPdk = $_GET["keywordPdk"];
$queryProduk = query("SELECT * FROM produk WHERE nama_produk LIKE '%$keywordPdk%'");
$jumlahProduk = count($queryProduk);
?>

<div class="container mt-3">
    <div class="row">
        <?php foreach ($queryProduk as $data) : ?>
            <div class="col-md-4 mb-3">
                <div class="card" style="width: 18rem;">
                    <img src="<?= $data['img'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $data['nama_produk'] ?></h5>
                        <p class="card-text"><?= "Rp " . number_format($data['harga_produk'], 2, ',', '.'); ?></p>
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