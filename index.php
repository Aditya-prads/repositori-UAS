<?php
session_start();
require "koneksi.php";

//cek cookie
if( isset($_COOKIE['id']) && isset($_COOKIE['key'])){
  $id = $_COOKIE['id']; 
  $key = $_COOKIE['key'];

  ///ambil username
  $result = mysqli_query($koneksi, "SELECT username FROM tb_user WHERE id_user = $id");
  $row = mysqli_fetch_assoc($result);

  //cek username
  if($key == hash('sha256', $row['username'])){
    $_SESSION['login'] = true;
  }
}

if (isset($_SESSION["login"])){
  header("location: admin/adm_covid.php");
  exit;
}

if(isset($_POST["login"])){
  
  $username = $_POST["username"];
  $password = $_POST["password"];

  $result = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username = '$username'");

  //check user
  if( mysqli_num_rows($result) === 1){

    //cek password
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row["password"])){

      //cek session
      $_SESSION["login"] = true;

      //cek remember me
      if(isset($_POST["remember"])){
        //buat coookie
        //setcookie('login', 'true', time()+ 60);
        setcookie('id', $row['id_user'], time()+60);
        setcookie('key', hash('sha256',$row['username']), time()+60);
      }
      
      header('Location: admin/adm_covid.php');
      exit;
    }
  }
  $error = true;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Halaman Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="aset/bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="aset/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container" align="center">
  <div align="center" style="width:400px;margin-top:5%;">
    <form method="post" class="well well-lg" action="" style="-webkit-box-shadow: 0px 0px 30px #788788;"> 
    <h3 align="center"><span class="glyphicon glyphicon-home"></span> Sistem Pemantauan COVID 19</h3>
    <hr>
    <?php if(isset($error)){
    ?>
      <p style="color: red; font-style: italic;">Username / Password Salah</p>
    <?php }
    ?>
      <div class="form-group" align="left">
        <label for="username"><span class="glyphicon glyphicon-user"></span> Username:</label>
        <input type="text" class="form-control" id="username" placeholder="ketikkan username anda" name="username" autocomplete="off" required>
      </div>
      <div class="form-group" align="left">
        <label for="password"><span class="glyphicon glyphicon-cog"></span> Password:</label>
        <input type="password" class="form-control" id="password" placeholder="ketikkan password anda" name="password">
      </div>
      <div class="checkbox" align="left">
        <label><input type="checkbox" name="remember"> Remember me</label>
      </div>
      <button type="submit" name="login" class="btn btn-block btn-success">LOGIN ADMIN</button>
      <a href="registrasi.php" type="button" class="btn btn-block btn-primary">Register User Baru</a>
      <button type="button" class="btn btn-link"><span class="glyphicon glyphicon-eye-open"></span> Lupa Password ?</button>  
    </form>
  </div>
</div>

</body>
</html>