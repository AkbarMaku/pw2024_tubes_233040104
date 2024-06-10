<?php
session_start();
if (isset($_SESSION["login"])) {
  header("location: ../admin/index.php");
  exit;
}

require '../koneksi.php';

if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  // Cek username
  if (mysqli_num_rows($result) === 1) {

    // Cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])) {

      $_SESSION["login"] = true;

      header("location: ../admin/index.php");
      exit;
    }
  }

  $error = true;
}
?>

<!doctype html>
<html lang="en">

<head>

  <!-- Meta -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Title -->
  <title>Login</title>

  <!-- Link -->
  <link rel="icon" href="../image/logo.jpg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/login.css">

</head>

<body>
  <div class="container">
    <div class="content">
      <div class="profile"></div>
      <h2><i>Login</i></h2>
      <?php if (isset($error)) : ?>
        <div class="alert alert-warning text-center" role="alert">
          Periksa kembali username dan password anda
        </div>
      <?php endif; ?>
      <form action="" method="post">
        <label for="username">Username :</label>
        <input type="text" name="username" id="username" placeholder=" Masukkan username disini">
        <br>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" placeholder=" Masukkan password disini">
        <br>
        <div class="tombol d-flex justify-content-between">
          <button type="submit" name="login">Login</button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>