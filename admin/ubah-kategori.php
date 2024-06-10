<?php
    session_start();

    if(!isset($_SESSION["login"])) {
      header("location: ../login/login.php");
      exit;
    }
    
    require '../koneksi.php';

    $id = $_GET['id'];

    $query = mysqli_query($conn, "SELECT * FROM kategori WHERE id_kategori='$id'");
    $data = mysqli_fetch_array($query);

?>

<!doctype html>
<html lang="en">
  <head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- End meta -->
    <title>Ubah Kategori</title>

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
                <a class="nav-link active" href="kategori.php">Kategori</a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <!-- End navbar -->

    <!-- Change -->
    <div class="container mt-5">
        <h2>Ubah Nama Kategori</h2>

        <div class="col-12 col-md-3">
            <form action="" method="POST">
                <div class="mb-3">
                <label for="kategori" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" name="kategori" id="kategori" value=" <?php echo $data['nama_kategori']; ?>">
                </div>

                <div class="mt-3">
                    <button type="submit" class="btn btn-primary" name="ubahBtn">Ubah</button>
                </div>
            </form>

            <?php 
                if(isset($_POST['ubahBtn'])) {
                    $kategori = htmlspecialchars($_POST['kategori']);

                    if($data['nama_kategori']==$kategori) {
                        ?>
                            <meta http-equiv="refresh" content="0; url=kategori.php" />
                        <?php
                    } else {
                        $query = mysqli_query($conn, "SELECT * FROM kategori WHERE nama_kategori='$kategori'");
                        $jumlahData = mysqli_num_rows($query);

                        if($jumlahData > 0) {
                            ?>
                                <div class="alert alert-warning mt-3" role="alert">
                                    Kategori sudah ada
                                </div>
                            <?php
                        } else {
                            $queryUbah = mysqli_query($conn, "UPDATE kategori SET nama_kategori='$kategori' WHERE id_kategori='$id'");

                            if($queryUbah) {
                                ?>
                                    <div class="alert alert-primary mt-3" role="alert">
                                        Kategori berhasil diubah
                                    </div>

                                    <meta http-equiv="refresh" content="2; url=kategori.php" />
                                <?php
                            } else {
                                echo mysqli_error($conn);
                            }
                        }
                    }
                }
            ?>
        </div>
    </div>
    <!-- End Change -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>