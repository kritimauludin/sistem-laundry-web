<?php
session_start();
if (!isset($_SESSION["Login"])) {
	header("Location: ../index.php");
	exit;
}
include_once("../perpus/modul.php");

$KodePaket = $_GET["kode_paket"];

$UbahDataPaket = Query("SELECT * FROM tb_paket WHERE kode_paket = '$KodePaket'")[0];

if (isset($_POST["TombolUbah"])) {
	if (UbahDataPaket($_POST) > 0) {
		echo "
		 <script>
		 	alert('Data Berhasil Diubah') ;
		 	document.location.href='IsiDataPaket.php';
		 </script>
		 ";
	} else {
		echo "
		<script>
			alert('Data Gagal Diubah');
			document.location.href='IsiDataPaket.php';
		</script>
		";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php include_once("../perpus/judul.php"); ?></title>

	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../datatables/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="../fontawesome/css/font-awesome.css">
	<link rel="stylesheet" href="../perpus/custom.css">
</head>
<body>
	<?php include_once("../perpus/navbar.php"); ?>
	<div class="container">
			<div id="JudulForm">
				<h2>Ubah Data Paket</h2>
				<hr>
			</div>
		</div>

		<div class="container">
			<form action="" method="POST" id="FormTambah">
				<div class="form-group row">
					<label class="col-sm-2 col-from-label">Kode Paket</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" id="KodePaket" name="kode_paket" value="<?php echo $UbahDataPaket["kode_paket"];?>" readonly>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Jenis Paket</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="jenis" id="Jenis" placeholder="Masukan Nama Paket" value="<?php echo $UbahDataPaket["jenis"]; ?>" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Nama Paket</label>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="nama_paket" id="NamaPaket" placeholder="Masukan Nama Paket" value="<?php echo $UbahDataPaket["nama_paket"]; ?>" required>
					</div>
				</div>
				<div class="form-group row">
					<label for="NomorTelepon" class="col-sm-2 col-form-label">Harga</label>
					<div class="col-sm-4">
						<input type="number" class="form-control" id="Harga" name="harga" placeholder="Masukan Harga" value="<?php echo $UbahDataPaket["harga"]; ?>" required>
					</div>
				</div>
				<div class="form-group row">
					<label class="col-sm-2 col-form-label"></label>
					<div class="col-sm-4">
						<button type="submit" id="TombolUbah" name="TombolUbah" class="btn btn-outline-success">Simpan</button>
						<a href="../item/IsiDataPaket.php"><button type="button" id="TombolBatal" name="TombolBatal" class="btn btn-outline-secondary">Batal</button></a>
					</div>	
				</div>
				</div>
			</form>
		</div>

</body>
</html>