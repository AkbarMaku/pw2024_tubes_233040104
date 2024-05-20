<?php 
require 'functions.php';
$kategori = mysqli_query($conn, "SELECT * FROM kategori");

?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nao Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="index.css">
  </head>
  <body>
    <!-- Navbar -->
    <nav class="navbar bg-primary" data-bs-theme="dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
        <img src="login/logo.jpg" alt="" width="50" height="50"> Nao Store
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Pricing</a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled" aria-disabled="true">Disabled</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <!-- Table categories -->
    <div class="container">
        <h1>Daftar Kategori Mobil Honda</h1>


    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Kategori Mobil</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php $i = 1 ?>
        <?php foreach($kategori as $kat) : ?>
            <tr>
                <th scope="row"><?= $i++; ?></th>
                <td><?= $kat['nama_kategori']; ?></td>
                <td><a href="#" class="badge text-bg-warning text-decoration-none">ubah</a>
                <a href="hapus.php?id=<?= $kat['id']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?');" class="badge text-bg-danger text-decoration-none" >Hapus</a></td>
            </tr>
        <?php endforeach ?>
        </tbody>
        </table>
        <!-- End Table categories -->

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

          <form method="POST" action="tambah.php">
            <div class="modal-body">
              <label class="form-label">Nama kategori</label>
              <input class="form-control form-control-lg" type="text" placeholder="Masukkan nama kategori disini" name="tkat" required>
            </div>
          
          
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
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