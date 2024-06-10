<?php
  require '../koneksi.php';

  if (isset($_POST["regis"])) {
    
    if( register($_POST) > 0 ) {
      echo "<script>
              alert('user baru berhasil ditambahkan');
              document.location='login.php';
            </script>";
    } else {
      echo mysqli_error($conn);
    }

  }
?>

<!doctype html>
<html lang="en">

<head>

  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Title -->
  <title>Regis</title>

  <!-- Link -->
  <link rel="icon" href="../image/logo.jpg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/regis.css">

</head>

<body>
  <div class="container">
    <div class="content">
      <div class="profile"></div>
      <h2><i>Registrasi</i></h2>
      <form action="" method="POST">
        <label for="username">Username :</label>
        <input type="text" name="username" id="username" placeholder=" Masukkan username disini" autocomplete="off">
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" placeholder=" Masukkan password disini">
        <label for="password">Konfirmasi password :</label>
        <input type="password" name="password2" id="password2" placeholder=" Konfirmasi password disini">
        <button type="submit" name="regis">Registrasi</button>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>