<?php 

$conn = mysqli_connect('localhost', 'root', '', 'prakpw_183040130');

function query($query){
	global $conn; 
	$result = mysqli_query($conn, $query);

	$rows = [];
	while($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}

	return $rows;
}




function tambah($data){
	global $conn;

	
	$nama_barang = htmlspecialchars($data['nama_barang']);
	$merk = htmlspecialchars($data['merk']);
	$harga = htmlspecialchars($data['harga']);
	$foto = htmlspecialchars($data['foto']);

	$query = "INSERT INTO elektronik
	 			VALUES
	 			('', '$foto', '$nama_barang', '$merk', '$harga')";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}


function hapus($id){
	global $conn;

	mysqli_query($conn, "DELETE FROM elektronik WHERE id = $id");

	return mysqli_affected_rows($conn);
}

function ubah($data){
	global $conn;

	$id = $data['id'];
	$nama_barang = htmlspecialchars($data['nama_barang']);
	$merk = htmlspecialchars($data['merk']);
	$harga = htmlspecialchars($data['harga']);
	$foto = htmlspecialchars($data['foto']);

	$query = "UPDATE elektronik SET
				foto = '$foto',
				nama_barang = '$nama_barang',
				merk = '$merk',
				harga = '$harga'
				WHERE id = $id
				";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function registrasi($data){
	global $conn; // biar bisa konek ke database
	$username = $data['username'];
	$password1 = $data['password1'];
	$password2 = $data['password2'];

	// cek user
	$cek_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

	if(mysqli_num_rows($cek_user) > 0){
		echo "<script>
				alert('username sudah terdaftar!');
				document.location.href = 'registrasi.php';
				</script>";
			return false;
	}
	// password1 tidak sana dengan password2
if($password1 != $password2){
	echo "<script>
				alert('Konfirmasi password tidak sesuai!');
				document.location.href = 'registrasi.php';
				</script>";
				return false;
	}

	//username dan paswword sudah oke
	$password = password_hash($password1,PASSWORD_DEFAULT);

	$query = "INSERT INTO user VALUES
				('', '$username','$password')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);

}


?>
