<?php 
session_start();

if (!isset($_SESSION['username'])) {
	header("Location: login.php");
	exit;
}
require 'functions.php';

$id = $_GET['id'];
$el = query("SELECT * FROM elektronik WHERE id = $id")[0];



if (isset($_POST['ubah']) ) {
	if (ubah($_POST) > 0) {
		echo "<script>
				alert('data berhasil diubah!');
				document.location.href = 'index.php';
				</script>";
	}
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Ubah Elektronik</title>
	<style>
	body{
		background-image: url('../img/ubah.jpg');
		background-size: cover;
	}
		.container{
		width:350px;
		height: 300px;
		background: grey;
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
	<h3>Form Ubah Elektronik</h3>
	<form method="post" action="">    
		<input type="hidden" name="id" value="<?= $el['id']; ?>">
		<ul>
			<li>
				<label>Nama Barang :</label><br>
				<input type="text" name="nama_barang" required value="<?= $el['nama_barang'];?>">
			</li>
			<li>
				<label>Merk :</label><br>
				<input type="text" name="merk" required value="<?= $el['merk'];?>">
			</li>
			<li>
				<label>Harga :</label><br>
				<input type="text" name="harga" required value="<?= $el['harga'];?>">
			</li>
			<li>
				<label>Foto :</label><br>
				<input type="text" name="foto" required value="<?= $el['foto'];?>">
			</li>
			<li>
				<button type="submit" name="ubah">Ubah Data!</button>
			</li>
		</ul>
	</form>
</div>
</body>
</html>