<?php
session_start();

if(!isset($_SESSION["login"])) {
  header("location: ../login/login.php");
  exit;
}

require '../koneksi.php';

$id = $_GET['id_produk'];

$query = mysqli_query($conn, "SELECT * FROM produk WHERE id_produk='$id'");
$data = mysqli_fetch_array($query);

$kategori = getKategori();

if(isset($_POST["ubahBtn"])) {
    if(ubahPdk($_POST) > 0) {
        echo "<script>
            alert('Data berhasil diubah');
            document.location='produk.php';
        </script>
        ";
    } else {
        echo "<script>
            alert('Gagal mengubah data');
            document.location='produk.php';
        </script>
        ";
    }
}
?>

<!doctype html>
<html lang="en">

<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- End meta -->
    <title>Ubah Produk</title>

    <!-- Link -->
    <link rel="icon" href="../image/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                        <a class="nav-link active" href="produk.php">Produk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End navbar -->

    <!-- Change -->
    <div class="container mt-3">
        <h2>Ubah data produk</h2>

        <div class="">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <input type="hidden" name="id" value="<?= $data['id_produk']; ?>">
                    <label for="kategori" class="form-label">Nama Produk</label>
                    <input type="text" class="form-control" name="namaPdk" id="namaPdk" value=" <?= $data['nama_produk']; ?>">
                    <label for="kategori" class="form-label">Harga Produk</label>
                    <input type="text" class="form-control" name="hargaPdk" id="hargaPdk" value=" <?= $data['harga_produk']; ?>">
                    <label for="kategori" class="form-label">Deskripsi Produk</label>
                    <textarea class="form-control" name="deskPdk" id="deskPdk" rows="3" value=" <?= $data['deskripsi_produk']; ?>"></textarea>
                    <label for="kategori" class="form-label">Kode Produk</label>
                    <input type="text" class="form-control" name="kodePdk" id="kodePdk" value=" <?= $data['kode_produk']; ?>">
                    <label for="kategori" class="form-label">Gambar produk</label>
                    <input type="file" class="form-control" name="img" id="img" value=" <?= $data['img']; ?>">
                    <img src="<?= $data['img']; ?>" alt="Gambar Produk" width="100">
                    <select class="form-select mt-3" aria-label="Default select example" name="id_kategori">
                        <option selected>Kategori</option>
                        <?php foreach ($kategori as $kat) : ?>
                        <option value="<?= $kat['id_kategori']; ?>"><?= htmlspecialchars($kat['nama_kategori']); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary" name="ubahBtn">Ubah</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End Change -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>