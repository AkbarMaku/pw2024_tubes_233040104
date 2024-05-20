<?php 
if ( isset($_POST["submit"]) ) {
  if ($_POST["username"] == "admin" && $_POST["password"] == "akbar") {
    header("Location: ../index.php");
    exit;
  } else {
    $error = true;
  }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- My Style -->
    <link rel="stylesheet" href="login.css">
    
    <title>Login Dashboard</title>
  </head>
  <body>
    <div class="container">
        <div class="content">
            <div class="profile"></div>
            <h2><i>Login Session</i></h2>
            <?php if (isset($error)) : ?>
              <p style="color: red;">Eror command syntax use [.usage.zc] for info</p>
            <?php endif; ?>
            <form action="" method="post">
                <label for="username">Username :</label>
                <input type="text" name="username" id="username" placeholder="Insert username here">
                <br>
                <label for="password">Password :</label>
                <input type="password" name="password" id="password" placeholder="Insert password here">
                <br>
                <button type="submit" name="submit">Login</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>