<?php session_start();

$username = $_POST["username"];
$password = md5($_POST["password"]);

// koneksi database
$koneksi = mysqli_connect("localhost","root","","sewa_mobil");
$sql = "select * from pelanggan where username='$username' and password='$password'";
$result = mysqli_query($koneksi,$sql);
$jumlah = mysqli_num_rows($result);

if ($jumlah == 0) {
  $_SESSION["message"] = array (
    "type" => "danger",
    "message" => "Username / Password Salah"
  );
  // jika jumlah datanya = 0 berarti username/password salah
  header("location:login_pelanggan.php");
} else {
  // login berhasil
  // buat variabel session
  $_SESSION["session_pelanggan"] = mysqli_fetch_array($result);
  $_SESSION["session_sewa"] = array();
  // ini buat tempat menampung data buku yang dipinjam
  // ala ala cart (keranjang belanja)
  header("location:template_pelanggan.php?page=list_mobil");
}

if (isset($_GET["logout"])) {
  // hapus session-nya
  session_destroy();
  header("location:login_pelanggan.php");
}
?>
<!--

if (isset($_POST["username"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $koneksi = mysqli_connect("localhost","root","","sewa_mobil");
    $sql = "select * from pelanggan where username='$username' and password='$password'";
    $result = mysqli_query($koneksi,$sql);
    $jumlah = mysqli_num_rows($result);
    if ($jumlah == 0) {
        $_SESSION["message"] = array(
        "type" => "danger",
        "message" => "Username/Password Salah"
        );
        header("location:login_pelanggan.php");
    } else {
        $_SESSION["session_pelanggan"]=mysqli_fetch_array($result);
        // $_SESSION["session_sewa"] = array();

        header("location:template_pelanggan.php");
    }
    if (isset($_GET["logout"])) {
        session_destroy();
        header("location:template_pelanggan.php");
    }
}
?> -->
