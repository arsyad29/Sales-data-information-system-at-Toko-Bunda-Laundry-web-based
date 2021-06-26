<!DOCTYPE html>
<html>

<head>
	<title>Status</title>
	<link rel="stylesheet" href="assets/css/status.css">
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
								<li><a href="#" class="menu-item">STATUS</a></li>
								<li><a href="../index.html#about" class="menu-item">ABOUT</a></li>
								<li><a href="../login/login.html" class="menu-item">LOGIN</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>

	<!-- <div class="pembungkus-status">
		<div class="container-atas">
			<h1>BUNDA LAUNDRY</h1>
			<br>
			<h1>STATUS PEMESANAN</h1>
		</div>
		<div class="container-tengah">
			<form action="">
				<table>
							<tr>
								<td>Nama</td>
								<td><input type="text" name="username" placeholder="Masukkan Nama Disini" value=""></td>
							</tr>
							<tr>
								<td>Nomor Nota</td>
								<td><input type="text" name="username" placeholder="Masukkan Nama Disini" value=""></td>
							</tr>
						</table>
				<div id="nama-status">
					<label>Nama</label>
					<input type="text" name="username" placeholder="Masukkan Nama Disini" value="">
				</div>
				<div id="nomor-status">
					<label>Nomor Nota</label>
					<input type="number" name="password" placeholder="Masukkan Nomor Nota Disini" value="">
				</div>
				<input type="submit" name="status" value="Check Status">
				<div class="container-bawah">
					<h1>CUCIAN TELAH SELESAI</h1>
				</div>
			</form>
		</div>
	</div> -->

	<div class="contoh-container">
		<div class="contoh-title">
			<H1>BUNDA LAUNDRY</H1>
			<BR></BR>
			<H1>STATUS PEMESANAN</H1>
		</div>
		<div class="contoh-content">
			<form action="" method="POST" autocomplete="off">
				<table>
					<tr>
						<td>
							<label class="form-contoh-content-label">Nama</label>
						</td>
						<td><input class="form-contoh-content-input" type="text" name="nama" placeholder="Masukkan Nama Disini" value=""></td>
					</tr>
					<tr>
						<td>
							<label class="form-contoh-content-label">Nomor Nota</label>
						</td>
						<td><input class="form-contoh-content-input" type="text" name="nomor_nota" placeholder="Masukkan Nama Disini" value=""></td>
					</tr>
					<tr>
						<td>
							<button type="submit" name="submit">
								Check Status
							</button>
						</td>
					</tr>
				</table>
			</form>
		</div>
		<div class="contoh-output">
			<H1>CUCIAN TELAH SELESAI</H1>
		</div>
	</div>
</body>

</html>

<?php 
	include "koneksi.php";

	$nama = isset($_POST['nama']) ? $_POST ['nama'] : '';
	$nota = isset($_POST['nomor_nota']) ? $_POST ['nomor_nota'] : '';

	// $nama = $_POST['nama'];
	// $nota = $_POST['nomor_nota'];
	$query = mysqli_query($koneksi, "SELECT * FROM tambah_pesanan WHERE nota='$nota'");
    $result = mysqli_fetch_array($query);
	$row = mysqli_num_rows($query);
	
	if(isset($_POST['submit'])) {
		if($row != 0) {
			if($nota == $result['nota']) {
				// print "<script>alert('Laundry Sudah Selesai')</script>";
				if($result['barang'] == "Belum Diambil") {
					print "<script>alert('Laundry belum Selesai')</script>";
				} 
				else {
					print "<script>alert('Laundry Sudah Selesai')</script>";
				}
			}
		}
	}
?>