<?php 
    require "../koneksi.php";

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
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Cari" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Cari</button>
            </form>
            </div>
        </div>
    </nav>
    <!-- End navbar -->

    <div class="container mt-5">
        
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100 ">
                    <img src="..." class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores nulla vel quis aut perspiciatis excepturi recusandae neque praesentium reiciendis officiis consequuntur numquam ipsam assumenda tenetur repudiandae error nesciunt sunt deleniti ex ad voluptatum, veritatis, magnam libero. A necessitatibus ab deserunt eos repellendus eius ea cum modi earum non alias officia dolore tempore consectetur rerum, asperiores quos magni similique architecto! Aperiam unde repellendus voluptatum facilis hic ipsam nostrum voluptatem mollitia eos assumenda, fugiat, quibusdam voluptate aut rem architecto repudiandae alias omnis. Magnam consectetur, voluptatibus quos recusandae esse ex optio consequuntur vitae? Quo cupiditate asperiores sapiente numquam facere deserunt facilis magnam non.</p>
                        <div class="go text-center">
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>

    </div>

    <!-- Footer -->
    <footer class="bg-primary text-center mt-3">
        <div class="container p-4 pb-0">
            <section class="mb-5">

                <a
                data-mdb-ripple-init
                class="btn text-white btn-floating m-1"
                style="background-color: #3b5998;"
                href="#!"
                role="button">
                <i class='bx bxl-facebook-circle bx-sm'></i>
                </a>

                <a
                data-mdb-ripple-init
                class="btn text-white btn-floating m-1"
                style="background-color: #ac2bac;"
                href="#!"
                role="button">
                <i class='bx bxl-instagram bx-sm'></i>
                </a>

                <a
                data-mdb-ripple-init
                class="btn text-white btn-floating m-1"
                style="background-color: #0082ca;"
                href="#!"
                role="button">
                <i class="bx bxl-linkedin bx-sm"></i>
                </a>
        
                <a
                data-mdb-ripple-init
                class="btn text-white btn-floating m-1"
                style="background-color: #333333;"
                href="#!"
                role="button">
                <i class="bx bxl-github bx-sm"></i>
                </a>
            </section>
        </div>

        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.05); color: white ;">© 2024 Copyright: NaoStore</div>

    </footer>
    <!-- End footer -->

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>