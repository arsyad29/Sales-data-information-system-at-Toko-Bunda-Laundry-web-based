<!DOCTYPE html>
<html>

<head>
	<title>Create Account</title>
	<link rel="stylesheet" href="assets/css/createaccount.css">
</head>

<body>
	<!--NAVBAR-->
	<header class="header-site">
		<div class="pembungkus-header">
			<!-- <div class="navbar-kiri"><img src="../assets/image/wash.png" style="width: 40px;"></div> -->
			<div class="navbar-kanan">
				<div class="pembungkus-navbar-kanan">
					<div class="navbar-menu">
						<nav>
							<ul>
								<li><a href="../Tambah Pesanan/tambahpesanan.html" class="menu-item">TAMBAH PESANAN</a></li>
								<li><a href="../Konfirmasi Pesanan/Konfirmasi Pesanan.html" class="menu-item">KONFIRMASI PESANAN</a></li>
								<li><a href="#" class="menu-item">CREATE ACCOUNT</a></li>
								<li><a href="../laporan/laporan.html" class="menu-item">LAPORAN</a></li>
								<li><a href="../index.html" class="menu-item">KELUAR</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>

	<div class="contoh-container">
		<div class="contoh-title">
			<H1>BUNDA LAUNDRY</H1>
			<BR></BR>
			<H1>CREATE ACCOUNT</H1>
		</div>
		<div class="contoh-content">
			<form action="" method="POST">
				<table>
					<tr>
						<td>
                            <label class="form-contoh-content-label">First Name</label>
                        </td>
                        <td>
                            <label class="form-contoh-content-label">Last Name</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="form-contoh-content-input" type="text" name="firstname" placeholder="" value="">
                        </td>
                        <td>
                            <input class="form-contoh-content-input" type="text" name="lastname" placeholder="" value="">
                        </td>
                    </tr>

					<tr>
						<td>
							<label class="form-contoh-content-label">Username</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="form-contoh-content-input" type="text" name="username" placeholder="" value="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-contoh-content-label">Password</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="form-contoh-content-input" type="password" name="password" placeholder="" value="">
                        </td>
                    </tr>

					<tr>
						<td>
							<button type="submit" class="butt-tambah" name="submit">
								CREATE
							</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div class="contoh-output">
			<!-- <H1>CUCIAN TELAH SELESAI</H1> -->
		</div>
	</div>
</body>

</html>

<?php 
	include "koneksi.php";

	if(isset($_POST['submit'])) {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
	$password = $_POST['password'];
	// $insert = mysqli_query($koneksi, "INSERT INTO user ('first_name', 'last_name', 'username', 'passowrd') VALUES ([$firstname], [$lastname], [$username], [$password])");
	if((!empty($firstname)) && (!empty($lastname)) &&(!empty($username)) && (!empty($password))) {
		$insert = mysqli_query($koneksi,"INSERT INTO user SET first_name = '$firstname', last_name = '$lastname', username = '$username', password = '$password' ");
		$hasil = mysqli_query($koneksi, $db);
		print "Registrasi success<br>";
		print "<script>alert('Registrasi Success')</script>";
        }
        
        else {
            print "<script>alert('Maaf, tidak boleh ada field yang kosong !');
            javascript:history.go(-1);</script>";
		}
	}
?>
<?php mysqli_close($koneksi); ?>