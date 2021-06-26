<!DOCTYPE html>
<html>

<head>
	<title>Tambah Pesanan</title>
	<link rel="stylesheet" href="assets/css/tambahpesanan.css">
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
								<li><a href="#home" class="menu-item">TAMBAH PESANAN</a></li>
								<li><a href="#info" class="menu-item">KONFIRMASI PESANAN</a></li>
								<li><a href="#" class="menu-item">CREATE ACCOUNT</a></li>
								<li><a href="#about" class="menu-item">LAPORAN</a></li>
								<li><a href="#" class="menu-item">KELUAR</a></li>
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
			<H1>TAMBAH PEMESANAN</H1>
		</div>
		<div class="contoh-content">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
				<table>
					<tr>
						<td>
                            <label class="form-contoh-content-label">Nama</label>
                        </td>
                        <td>
                            <label class="form-contoh-content-label">Tanggal Masuk</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="form-contoh-content-input" type="text" name="nama" placeholder="Masukkan Nama Disini" value="">
                        </td>
                        <td>
                            <input class="form-contoh-content-input" type="text" name="tgl_masuk" placeholder="Masukkan Tanggal Masuk" value="">
                        </td>
                    </tr>

					<tr>
						<td>
							<label class="form-contoh-content-label">Tanggal keluar</label>
                        </td>
                        <td>
							<label class="form-contoh-content-label">Berat</label>
						</td>
                    </tr>
                    <tr>
                        <td>
                            <input class="form-contoh-content-input" type="text" name="tgl_keluar" placeholder="Masukkan Tanggal Keluar" value="">
                        </td>
                        <td>
                            <input class="form-contoh-content-input" type="text" name="berat" placeholder="Masukkan Berat Disini /kg" value="">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label class="form-contoh-content-label">Layanan</label>
                        </td>
                        <td>
                            <label class="form-contoh-content-label">Jumlah Harga</label>
                        </td>
                    </tr>
                    <tr>
						<td>
							<select name="layanan" id="option-layanan" class="form-contoh-content-input">
								<option value="service1">Service 1</option>
								<option value="service2">Service 2</option>
								<option value="service3">Service 3</option>
							</select>
						</td>
                        <td>
                            <input class="form-contoh-content-input" type="text" name="harga" placeholder="Masukkan Harga" value="">
                        </td>
                    </tr>

                    <!-- <tr>
                        <td>
                            <label class="form-contoh-content-label">Nomor Nota</label>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input class="form-contoh-content-input" type="text" name="nomor_nota" placeholder="Masukkan Nomor Nota" value="">
                        </td>
                    </tr> -->
					<tr>
						<td>
							<button type="submit" class="butt-tambah" name="submit" value="submit">
								TAMBAH PESANAN
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


	<!-- php BERHASIL -->
	<?php
		include "koneksi.php";


		// mengambil data barang dengan kode paling besar
		$query = mysqli_query($koneksi, "SELECT max(nota) as kodeTerbesar FROM tambah_pesanan");
		$data = mysqli_fetch_array($query);
		$kodeBarang = $data['kodeTerbesar'];
		 
		// mengambil angka dari kode barang terbesar, menggunakan fungsi substr
		// dan diubah ke integer dengan (int)
		$urutan = (int) substr($kodeBarang, 3, 3);
		 
		// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
		$urutan++;
		 
		// membentuk kode barang baru
		// perintah sprintf("%03s", $urutan); berguna untuk membuat string menjadi 3 karakter
		// misalnya perintah sprintf("%03s", 15); maka akan menghasilkan '015'
		// angka yang diambil tadi digabungkan dengan kode huruf yang kita inginkan, misalnya BRG 
		$huruf = "DRY";
		$kodeBarang = $huruf . sprintf("%03s", $urutan);
		// echo $kodeBarang;



		if(isset($_POST['submit'])) {
			// $nota = $_POST['nomor_nota'];
			$nama = $_POST['nama'];
			$tanggal_masuk = $_POST['tgl_masuk'];
			$tanggal_keluar = $_POST['tgl_keluar'];
			$berat = $_POST['berat'];
			$layanan = $_POST['layanan'];
			$harga = $_POST['harga'];
			// $total = $berat * $harga;
			$barang = false;
				if($barang == false) {
					$barang = 'Belum Diambil';
				}

			//$sql = "INSERT INTO tambah_pesanan (nota, nama, tanggal_masuk, tanggal_keluar, berat, layanan, harga) VALUES ('$nota', '$nama', '$tanggal_masuk', '$tanggal_keluar', '$berat', '$layanan' ,'$harga')";
			//$sql = "INSERT INTO `tambah_pesanan`(`nota`, `nama`, `tanggal_masuk`, `tanggal_keluar`, `berat`, `layanan`, `harga`) VALUES ([$nota],[$nama],[$tanggal_masuk],[$tanggal_keluar],[$berat],[$layanan],[$harga])";
			$insert = mysqli_query($koneksi,"INSERT INTO tambah_pesanan SET nota='$kodeBarang', nama='$nama', tanggal_masuk='$tanggal_masuk', tanggal_keluar='$tanggal_keluar', berat='$berat', layanan='$layanan', harga='$harga', barang='$barang' "); 
			$hasil = mysqli_query($koneksi, $db);

			// kondisi apakah berhasil atau tidak
			// if ($hasil) {
			// 	echo "berhasil input data";
			// 	exit;
			// } else {
			// 	echo "gagal input data";
			// 	exit;
			// }

			// echo "<h4>$nota</h4>";
			// echo "<h4>$nama</h4>";
			// echo "<h4>$tanggal_masuk</h4>";
			// echo "<h4>$tanggal_keluar</h4>";
			// echo "<h4>$berat</h4>";
			// echo "<h4>$layanan</h4>";
			// echo "<h4>$harga</h4>";
		}
	?>


</body>

</html>