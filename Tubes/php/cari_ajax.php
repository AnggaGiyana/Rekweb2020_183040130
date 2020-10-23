 <?php 
 require 'functions.php';
$keyword = $_GET['keyword'];
	$query_cari = "SELECT * FROM elektronik WHERE
					nama_barang like '%$keyword%' OR
					merk like '%$keyword%' OR
					harga like '%$keyword%' 
					";
	$elektronik = query($query_cari);

  ?>
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