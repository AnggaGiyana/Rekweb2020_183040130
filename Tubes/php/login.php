<?php 

session_start(); // untuk mengaktifkan atau memulai session

if (isset($_SESSION['username'])) {
	header("Location: index.php");
	exit;
}

require 'functions.php';

 if(isset($_POST['login'])){
 	$username = $_POST['username'];
 	$password = $_POST['password'];
 	$cek_user = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

 	if (mysqli_num_rows($cek_user) == 1 ) { // mengecek jika data true maka satu
			
			$user = mysqli_fetch_assoc($cek_user);
			if( password_verify($password, $user['password'])){
				//login berhasil,masuk ke index
				$_SESSION['username'] = $username;
				header('Location: index.php');
				exit;
				}else{
					$error = 'Password salah';
				}
 	}else{
 		//Login gagal
 		$error = 'username belum terdaftar!';
 	}
 }

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<style type="text/css">
	body{
		background-image: url('../img/welcome1.jpg');
		background-size: cover;
	}
	.container{
		width: 350px;
		background: skyblue;
		margin: 80px auto;
		padding: 30px 20px;
	}
	.masuk{
		box-sizing: border-box;
		width: 100%;
		padding: 10px;
		font-size: 11pt;
		margin-bottom: 20px;
	}
	.login{
		background:#46de4b;
		color:white;
		font-size: 11pt;
		width: 100%;
		border:none;
		border-radius: 3px;
		padding: 10px 20px; 
	}

	</style>
</head>
<body>
<div class="container">
	<h2>Login</h2>

	<?php if(isset($error)) : ?>
		<p><?= $error ?></p>
	<?php endif; ?>

	<form action="" method="post">
		<ul>
			<li>
			<label>Username : </label><br>
				<input type="text" name="username" class="masuk" autocomplete="off">
			</li>
			<li>
				<label>Password : </label><br>
				<input type="password" name="password"	class="masuk">
			</li>
			<li>
				<button type="submit" name="login" class="login">Login</button>
			</li>
		</ul>
	</form>
<p>Not Registered?<a href="registrasi.php">Registrasi</a>
</div>
</body>
</html>