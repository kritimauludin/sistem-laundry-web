<?php
session_start();
if (!isset($_SESSION["Login"])) {
	header("Location: ../index.php");
	exit;
}
include_once("../perpus/modul.php");

if (isset($_POST["TombolSimpan"])) {
	if (TambahDataPaket($_POST) > 0) {
		echo"
		 <script>
		 	alert('Data Berhasil Ditambahkan');
		 	document.location.href='IsiDataPaket.php';
		 </script>
		 ";
	} else{
		echo"
		<script>
			alert('Data Gagal Ditambahkan');
			document.alert.href='IsiDataPaket.php';
		</script>
		";
	}
};

$SQL		= "SELECT max(kode_paket) AS Kode FROM tb_paket";
$HasilSQL	= mysqli_query($Koneksi, $SQL);
$DataSQL	= mysqli_fetch_array ($HasilSQL);
$KodeBaru	= $DataSQL['Kode'];

$NoUrut		= (int) substr($KodeBaru, 5, 5);
$NoUrut++;

$Char		= "KDP.";
$KodeBaru	= $Char . sprintf("%05s", $NoUrut);
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php include_once("../perpus/judul.php") ?></title>

	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../datatables/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="../fontawesome/css/font-awesome.css">
	<link rel="stylesheet" href="../perpus/custom.css">
</head>
<body>
	<?php include_once("../perpus/navbar.php")?>;

	<div class="container">
		<div id="JudulForm">
			<h2>Tambah Data Member</h2>
			<hr>
		</div>		
	</div>

	<div class="container">
		<form action="" method="POST" id="FormTambah">
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Kode Paket</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="KodePaket" name="kode_paket" value="<?php echo $KodeBaru ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Paket</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="jenis" id="Jenis" placeholder="Masukan Jenis paket" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama Paket</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="nama_paket" id="NamaPaket" placeholder="Masukan Nama Paket" required>
				</div>
			</div>
			<div class="form-group row">
				<label for="NomorTelepon" class="col-sm-2 col-form-label">Harga</label>
				<div class="col-sm-4">
					<input type="number" class="form-control" id="Harga" name="harga" placeholder="Masukan Harga" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label"></label>
				<div class="col-sm-4">
					<button type="submit" id="TombolSimpan" name="TombolSimpan" class="btn btn-outline-success">Simpan</button>
					<a href="../item/IsiDataPaket.php"><button type="button" id="TombolBatal" name="TombolBatal" class="btn btn-outline-secondary">Batal</button></a>
				</div>	
			</div>
		</form>
	</div>
</body>
</html>