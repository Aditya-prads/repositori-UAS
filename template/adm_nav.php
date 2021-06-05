<?php
session_start();
if (!isset($_SESSION["login"])){
    header('location: ../index.php');
    exit;
}
?>

<html>
<head>
  <title>SIM Pantauan covid</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../aset/bootstrap/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="../aset/bootstrap/js/bootstrap.min.js"></script>

  <!-- datatabel -->
  <link rel="stylesheet" type="text/css" href="../aset/datatabel/datatables.min.css"/>
  <script type="text/javascript" src="../aset/datatabel/datatables.min.js"></script>

</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <ul class="nav navbar-nav">
		</br>
<!--
      <form method="POST" name="search" action="">
        <select name="jenis_zakat[]" onchange='this.form.submit()'>
  			<option >- Pilih Zakat -</option>
  			<option value="Zakat Penghasilan">Zakat Penghasilan</option>
  			<option value="Zakat Maal">Zakat Maal</option>
  			<option value="Zakat Fitrah">Zakat Fitrah</option>
 		</select>
		  	</form>
-->
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
    </ul>
  </div>
</nav>