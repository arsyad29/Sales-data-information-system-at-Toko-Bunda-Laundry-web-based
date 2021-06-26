<!DOCTYPE html>
<html>

<head>
	<title>Laporan</title>
	<link rel="stylesheet" href="assets/css/laporan.css">
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
								<li><a href="../Create Account/create account.html" class="menu-item">CREATE ACCOUNT</a></li>
								<li><a href="#" class="menu-item">LAPORAN</a></li>
								<li><a href="../index.html" class="menu-item">KELUAR</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</header>
	<div class="pembungkus-table">
		<div class="container-title"></div>
		<div class="main-table">
			<form action="" method="POST">
				<table border="1">
					<thead>
						<tr>
							<th id="title">Nama</th>
							<th id="title">Barang Masuk</th>
							<th id="title">Keluar Barang</th>
							<th id="title">Masuk Kas</th>
							<th id="title">Tanggal Masuk</th>
							<th id="title">Tanggal Keluar</th>
							<th id="title">Nomor Nota</th>
						</tr>
					</thead>
					<tbody>
						<?php
							include "koneksi.php";
							$laporan = mysqli_query($koneksi, "SELECT * FROM tambah_pesanan");
							?>
								<?php if (mysqli_num_rows($laporan) > 0) { ?>
								<?php while($data = mysqli_fetch_array($laporan))  { ?>
								<tr>
									<th><?php echo $data["nama"] ?></th>
									<th><?php echo $data["layanan"];?></th>
									<th><?php echo $data["barang"];?></th>
									<th><?php echo $data["harga"];?></th>
									<th><?php echo $data["tanggal_masuk"];?></th>
									<th><?php echo $data["tanggal_keluar"];?></th>
									<th><?php echo $data["nota"];?></th>
								</tr>
								<?php } ?>
								<?php } ?>
					</tbody>
				</table>
			</form>
		</div>
	</div>
</body>

</html>