<?php 
require 'functions.php';
if(isset($_POST['registrasi'])) {
	if (registrasi($_POST) > 0) {
		echo "<script>
				alert('Registrasi Berhasil');
				document.location.href = 'login.php';
				</script>";
	}
}


 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Form Registrasi</title>
	<style>
	body{
		background-image: url('../img/registrasi.jpg');
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
	}</style>
</head>
<body>
<div class="container">
	<h3>Form Registrasi</h3>
	<form action="" method="post">
	<ul>
		<li>
			<label>Username :</label> <br>
			<input type="text" name="username" required>
		</li>
		<li>
			<label>Password :</label> <br>
			<input type="password" name="password1" required>
		</li>
		<li>
			<label>Konfirmasi Password</label> <br>
			<input type="password" name="password2" required>
		</li>
		<li>
			<button type="submit" name="registrasi">Registrasi</button>
		</li>
	</ul>
	</form>
</div>
</body>
</html>