<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Pelanggan</title>
    <link rel="stylesheet" href="Login.css">
    <link rel="stylesheet" href="login_k.css">
  </head>
  <body>
    <div class="loginBox">
      <img src="aset/gambar/iconfinder.png" class="user">
      <div class="card-header">
      <h2>LOG IN HERE</h2>
      </div>
      <div class="card-body">
        <?php
        if (isset($_SESSION["message"])): ?>
          <div class="alert alert-<?=($_SESSION["message"]["type"])?>">
            <?php echo $_SESSION["message"]["message"]; ?>
            <?php unset($_SESSION["message"]); ?>
          </div>
        <?php endif; ?>
      <form action="proses_pelanggan.php" method="post">
        <input type="hidden" action="proses_pelanggan.php" value="">
        <p>Username</p>
        <input type="text" name="username" placeholder="Username" required>
        <p>Password</p>
        <input type="password" name="password" placeholder="Password" required>
        <button type="submit" class="btn btn-success btn-block">LOGIN</button>
        <br>
        <br>
      </form>
    </div>
    </div>
  </body>
</html>
