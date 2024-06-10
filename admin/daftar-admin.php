<?php 
require '../koneksi.php';

$queryAdmin = query("SELECT * FROM user");
$jumlahAdmin = count($queryAdmin);
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
                        <a class="nav-link active" href="index.php">Beranda</a>
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
        <h2>DAFTAR ADMIN</h2>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Username admin</th>
                    <th scope="col">Password admin</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($jumlahAdmin == 0) : ?>
                    <tr>
                        <td colspan=3 class="text-center">Data kategori tidak tersedia</td>
                    </tr>
                <?php endif; ?>
                <?php if ($jumlahAdmin > 0) : ?>
                    <?php $i = 1; ?>
                    <?php foreach ($queryAdmin as $data) : ?>
                        <tr>
                            <td><?php echo $i; ?></td>
                            <td><?= $data['username'] ?></td>
                            <td><?= $data['password'] ?></td>
                            <td>
                                <a href="ubah-admin.php?id_user=<?= $data['id_user']; ?>" class="badge text-bg-warning text-decoration-none">ubah</a>
                                <a href="hapus-admin.php?id_user=<?= $data['id_user']; ?>" onclick="return confirm('Yakin ingin menghapus data ini?');" class="badge text-bg-danger text-decoration-none">Hapus</a>
                            </td>
                        </tr>
                        <?php $i++; ?>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <!-- End table -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>