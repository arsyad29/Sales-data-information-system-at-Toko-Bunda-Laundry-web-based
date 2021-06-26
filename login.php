<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="assets/css/login.css">
</head>
	<body>
		<!--NAVBAR-->
		<header class="header-site">
			<div class="pembungkus-header">
				<div class="navbar-kiri"><img src="../assets/image/wash.png" style="width: 40px;"></div>
				<div class="navbar-kanan">
					<div class="pembungkus-navbar-kanan">
						<div class="navbar-menu">
							<nav>
								<ul> 
									<li><a href="../index.html#home" class="menu-item">HOME</a></li>
									<li><a href="../index.html#info" class="menu-item">INFO</a></li>
									<li><a href="../status/status.html" class="menu-item">STATUS</a></li>
									<li><a href="../index.html#about" class="menu-item">ABOUT</a></li>
									<li><a href="#" class="menu-item">LOGIN</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</header>

		<div class="pembungkus-login">
			<div class="login-container">
				<form action="" method="POST">
					<h1>LOGIN</h1>
					<div>
						<label>Username</label>
						<input type="text" name="username" placeholder="Enter your username here" value="">
					</div>
					<div>
						<label>Password</label>
						<input type="password" name="password" placeholder="Enter your password here" value="">
					</div>
					<input type="submit" name="login" value="LOGIN">
					<!-- <a href="#">Forgot Password?</a>
					<a href="#">Forgot Username?</a> -->
				</form>
			</div>
		</div>
	</body>
</html>

<?php
	include "koneksi.php";

    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username'");
    $result = mysqli_fetch_array($query);
	$row = mysqli_num_rows($query);
	if(isset($_POST['login'])) {	
		if(($username == "") && ($password == "")) {
			// print "<center>Anda belum memasukkan username dan password !";
			print "<script>alert('Anda belum memasukkan username dan password')</script>";
			exit;
		}
		if($row != 0) {
		if($password != $result['password']) {
		// print "<center>Password salah !";
			print "<script>alert('Password Salah')</script>";
		}
			else {
			setcookie("username",$username);
			// print "<center>Anda telah berhasil login";
			print "<script>alert('Login Success')</script>";
			header("location:tambahpesanan.php");
		}		
	}

		else {
		// print "<center>Maaf, Username tidak terdaftar";
		print "<script>alert('Username tidak terdaftar')</script>";
		}
	}
?>
<?php mysqli_close($koneksi); ?>