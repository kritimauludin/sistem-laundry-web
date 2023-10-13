<?php
session_start();
if (!isset($_SESSION["Login"])) {
	header("Location: ../index.php");
	exit;
}
include_once("../perpus/modul.php");

$KodeMember = $_GET["kode_member"];

$UbahDataMember = Query("SELECT * FROM tb_member WHERE kode_member = '$KodeMember'")[0];
$JenisKelamin = 'jenis_kelamin';

if (isset($_POST["TombolUbah"])) {
	if (UbahDataMember($_POST) > 0) {
		echo "
		 <script>
		 	alert('Data Berhasil Diubah') ;
		 	document.location.href='IsiDataMember.php';
		 </script>
		 ";
	} else {
		echo "
		<script>
			alert('Data Gagagl Diubah');
			document.location.href='IsiDataMember.php';
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
	<link rel="stylesheet" href="../librari/custom.css">
</head>
<body>
	<?php include_once("../perpus/navbar.php"); ?>

	<div class="container">
		<div id="JudulForm">
			<h2>Ubah Data Member</h2>
			<hr>
		</div>
	</div>

	<div class="container">
		<form action="" method="POST" id="FormTambah">
			<div class="form-group row">
				<label class="col-sm-2 col-from-label">Kode Member</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="KodeMember" name="kode_member" value="<?php echo $UbahDataMember["kode_member"]; ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="nama" id="NamaMember" placeholder="Masukan Nama Member" value="<?php echo $UbahDataMember["nama"]; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-4">
					<textarea class="form-control" name="alamat" id="Alamat" cols="50" rows="2" required><?php echo $UbahDataMember["alamat"]; ?></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-4">
					<input type="radio" id="LK" name="jenis_kelamin" value="laki-laki" <?php if ($JenisKelamin=='Laki-laki'){echo "checked";}?>>
					<label for="LK">Laki-Laki</label><br>
					<input type="radio" id="P" name="jenis_kelamin" value="perempuan" <?php if ($JenisKelamin=='Perempuan'){echo "checked";}?>>
					<label for="P">Perempuan</label><br>
				</div>
			</div>
			<div class="form-group row">
				<label for="NomorTelepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="NomorTelepon" name="no_telepon" placeholder="Masukan Nomor Telepon" value="<?php echo $UbahDataMember["no_telepon"]; ?>" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label"></label>
				<div class="col-sm-4">
					<button type="submit" id="TombolUbah" name="TombolUbah" class="btn btn-outline-success">Simpan</button>
					<a href="../item/IsiDataMember.php"><button type="button" id="TombolBatal" name="TombolBatal" class="btn btn-outline-secondary">Batal</button></a>
				</div>	
			</div>
			</div>
		</form>
	</div>

</body>
</html>