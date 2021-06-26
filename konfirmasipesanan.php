<!DOCTYPE html>
<html>

<head>
	<title>Konfirmasi Pesanan</title>
	<link rel="stylesheet" href="assets/css/konfirmasipesanan.css">
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
								<li><a href="#" class="menu-item">KONFIRMASI PESANAN</a></li>
								<li><a href="../Create Account/create account.html" class="menu-item">CREATE ACCOUNT</a></li>
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
			<H1>KONFIRMASI PESANAN</H1>
		</div>
		<div class="contoh-content">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<table>
					<tr>
						<td>
                            <label class="form-contoh-content-label">Nama</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="form-contoh-content-input" type="text" name="nama" placeholder="" value="">
                        </td>
                    </tr>

					<tr>
						<td>
							<label class="form-contoh-content-label">Nomor Nota</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="form-contoh-content-input" type="text" name="nomor_nota" placeholder="" value="">
                        </td>
                    </tr>
					<tr>
						<td>
							<button type="submit" class="butt-tambah" name='siap' value='submit'>
								Siap Diambil
							</button>
							<button type="submit" class="butt-tambah" name='sudah' value='submit'>
								Sudah Diambil
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

	<?php 
		include "koneksi.php";

		if(isset($_POST['siap'])) {
			$nama = $_POST['nama'];
			$nota = $_POST['nomor_nota'];
			$barang = true;
				if($barang == true){
					$barang = 'Siap Diambil';
				}

			// echo "$barang";
			// $insert = "UPDATE tambah_pesanan SET nota='$nota' WHERE nama='$nama'";
			$insert = mysqli_query($koneksi,"UPDATE tambah_pesanan SET barang = '$barang' WHERE nota = '$nota'");
			// $insert = mysqli_query($koneksi,"UPDATE tambah_pesanan SET 'barang'='$barang' WHERE 'nota'='$nota'");
			$hasil = mysqli_query($koneksi, $db);
		}

		if(isset($_POST['sudah'])) {
			$nama = $_POST['nama'];
			$nota = $_POST['nomor_nota'];
			$barang = 'Sudah Diambil';

			$insert = mysqli_query($koneksi,"UPDATE tambah_pesanan SET barang = '$barang' WHERE nota = '$nota'");
			$hasil = mysqli_query($koneksi, $db);
		}
	?>	
</body>

</html>