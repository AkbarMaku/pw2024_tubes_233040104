<?php 
require '../koneksi.php';
$keywordKat = $_GET["keywordKat"];
$queryKategori = query("SELECT * FROM kategori WHERE nama_kategori LIKE '%$keywordKat%'");
$jumlahKategori = count($queryKategori);
?>

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