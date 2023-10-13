<?php
session_start();
if (!isset($_SESSION["Login"])) {
	header("Location: ../index.php");
	exit;
}
include_once("../perpus/modul.php");

if (isset($_POST["TombolSimpan"])) {
	if (TambahDataMember($_POST) > 0) {
		 echo "
		<script>
			alert('Data Berhasil Ditambahkan');
			document.location.href='IsiDataMember.php'
		</script>
		 ";
		}else {
		 echo "
			<script>
				alert('Data Gagal Ditambahkan');
				document.location.href='IsiDataMember.php';
			</script>
			";
	}	
};

$SQL		= "SELECT max(kode_member) AS Kode FROM tb_member";
$HasilSQL	= mysqli_query ($Koneksi, $SQL);
$DataSQL	= mysqli_fetch_array ($HasilSQL);
$KodeBaru	= $DataSQL['Kode'];

$NoUrut		= (int) substr($KodeBaru, 5, 5);
$NoUrut++ ;

$Char		= "KDM.";
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
				<label class="col-sm-2 col-form-label">Kode Member</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="KodeMember" name="kode_member" value="<?php echo $KodeBaru ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Nama</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" name="nama" id="NamaMember" placeholder="Masukan Nama Member" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Alamat</label>
				<div class="col-sm-4">
					<textarea class="form-control" name="alamat" id="Alamat" cols="50" rows="2" required></textarea>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label">Jenis Kelamin</label>
				<div class="col-sm-4">
					<input type="radio" id="LK" name="jenis_kelamin" value="laki-laki">
					<label for="LK">Laki-Laki</label><br>
					<input type="radio" id="P" name="jenis_kelamin" value="perempuan">
					<label for="P">Perempuan</label><br>
				</div>
			</div>
			<div class="form-group row">
				<label for="NomorTelepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="NomorTelepon" name="no_telepon" placeholder="Masukan Nomor Telepon" required>
				</div>
			</div>
			<div class="form-group row">
				<label class="col-sm-2 col-form-label"></label>
				<div class="col-sm-4">
					<button type="submit" id="TombolSimpan" name="TombolSimpan" class="btn btn-outline-success">Simpan</button>
					<a href="../item/IsiDataMember.php"><button type="button" id="TombolBatal" name="TombolBatal" class="btn btn-outline-secondary">Batal</button></a>
				</div>	
			</div>
		</form>
	</div>
</body>
</html>