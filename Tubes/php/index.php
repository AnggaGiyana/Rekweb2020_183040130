<?php 
session_start();

if (!isset($_SESSION['username'])) {
	header("location: login.php");
	exit;
}
require 'functions.php';

$elektronik = query("SELECT * FROM elektronik");

if(isset($_GET['cari'])){
	$keyword = $_GET['keyword'];
	$query_cari = "SELECT * FROM elektronik WHERE
					nama_barang like '%$keyword%' OR
					merk like '%$keyword%' OR
					harga like '%$keyword%' 
					";
	$elektronik = query($query_cari);
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar Elektronik</title>
	 <!--Import Google Icon Font-->
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>


<body>
<div class="navbar-fixed">
	<nav>
    <div class="nav-wrapper blue darken-1">
    <div class="container">
      <a href="#" class="brand-logo">Daftar Elektronik</a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
      <li>
      	<form action="" method="get">
		<input type="text" name="keyword" id="keyword" autocomplete="off">
		</form>
	</li>


        <li><a href="tambah.php">Tambah Elektronik</a></li>
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </div>
    </div>
  </nav>
  </div>

<div id="container">
<div class="container">


<table border="1" cellspacing="0" cellpadding="10" class="striped">
		<tr>
			<th>no.</th>
			<th>Nama barang</th>
			<th>Merk</th>
			<th>Harga</th>
			<th>Foto</th>
			<th>Aksi</th>
		</tr>

		<?php if(empty($elektronik)) : ?>
			<tr>
				<td colspan="6">data tidak dapat ditemukan!</td>
			</tr>
		<?php endif ?>

		<?php $i = 1; ?>
		<?php foreach ($elektronik as $el) : ?>
		<tr>
			<td><?= $i++; ?></td>
			<td><?= $el['nama_barang']; ?></td>
			<td><?= $el['merk']; ?></td>
			<td>Rp.<?= $el['harga']; ?></td>
			<td><img src="../img/<?= $el['foto']; ?>" width="100"></td>
			<td>
				 <a href="ubah.php?id=<?= $el['id']; ?>">ubah</a> | 
				 <a href="hapus.php?id=<?= $el['id']; ?>" onclick="return confirm('yakin?');">hapus</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
</div>
</div>
	<script type="text/javascript" src="../js/script.js"></script>

</body>
</html>