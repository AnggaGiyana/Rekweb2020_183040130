<?php 
session_start();

if (!isset($_SESSION['username'])) {
	header("Location: login.php");
	exit;
}
require 'functions.php';

if (isset($_POST['tambah'])) {
	if (tambah($_POST) > 0) {
		echo "<script>
				alert('data berhasil ditambahkan!');
				document.location.href = 'index.php';
				</script>";
	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Tambah Elektronik</title>
	<style type="text/css">
	body{
		background-image: url('../img/tambah.jpg');
		background-size: cover;
	}
	.container{
		width:350px;
		height: 300px;
		background: skyblue;
		margin: 80px auto;
		padding: 30px 20px;
		text-align: center;
	}
	ul{
		box-sizing: border-box;
		width: 100%;
		padding: 10px;
		font-size: 11pt;
		margin-bottom: 20px;
	}
	</style>
</head>
<body>
<div class="container">
	<h3>Form Tambah Eektronik</h3>
	<form method="post" action="">
		<ul>
			<li>
				<label>Nama Barang :</label><br>
				<input type="text" name="nama_barang" required>
			</li>
			<li>
				<label>Merk :</label><br>
				<input type="text" name="merk" required>
			</li>
			<li>
				<label>Harga :</label><br>
				<input type="text" name="harga" required>
			</li>
			<li>
				<label>Foto :</label><br>
				<input type="text" name="foto" required>
			</li>
			<li>
				<button type="submit" name="tambah">Tambah Data!</button>
			</li>
		</ul>
	</form>
	</div>
</body>
</html>