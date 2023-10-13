<?php
		session_start();
		if(!isset($_SESSION["Login"])){
			header("Location: ../index.php");
			exit;
		}
		include_once("../perpus/modul.php");

	$TampilDataMember = Query("SELECT kode_member, nama, alamat, jenis_kelamin, no_telepon FROM tb_member ORDER BY kode_member ASC");
?>
<html>
<head>
	<title><?php include_once("../perpus/judul.php"); ?> </title>

<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../fontawesome/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="../datatables/css/datatables.bootstrap4.css">
<link rel="stylesheet" type="text/css" href="../perpus/custom.css">
</head>
<body>
	<?php include_once("../perpus/navbar.php"); ?>

	<div class="container-fluid">
		<div id="JudulForm">
			<h2>Data Member Cuci</h2>
			<hr>
		</div>
	</div>

	<div class="container-fluid" id="TampilDataMember">
		<div class="container-fluid" id="TambahData">
			<a href="../item/TambahDataMember.php"><button type="button" class="btn btn-outline-success"><i class="fa fa-plus-circle">Tambah Member</i> </button></a>
			<hr>			
		</div>

		<table class="table table-striped" id="TabelTampilData">
			<thead align="center">
				<tr>
					<th>Aksi</th>
					<th>Kode Member</th>
					<th>Nama Member</th>
					<th>Alamat</th>
					<th>Jenis Kelamin</th>
					<th>Nomer Telepon</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($TampilDataMember as $Baris) : ?>
				<tr>
					<td align="center">
						<button type="button" class="btn btn-outline-light text-dark"><a href="UbahDataMember.php?kode_member=<?php echo $Baris["kode_member"]?>" data-toggle="tooltip" data-placement="bottom" title="Ubah Data"><i class="fa fa-pencil-square-o"></i></a></button>

						<button type="button" class="btn btn-outline-light text-dark"><a href="HapusDataMember.php?kode_member=<?php echo $Baris["kode_member"]?>" data-toggle="tooltip" data-placement="bottom" title="Hapus Data" onclick="return confirm('Yakin Data Ini Dihapus?');"><i class="fa fa-trash-o"></i></a></button>
					</td>
					<td><?php echo $Baris["kode_member"] ?></td>
					<td><?php echo $Baris["nama"] ?> </td>
					<td><?php echo $Baris["alamat"] ?></td>
					<td><?php echo $Baris["jenis_kelamin"]?> </td>
					<td><?php echo $Baris["no_telepon"]?></td>
				</tr>
			<?php endforeach;?>
			</tbody>
		</table>
	</div>

<script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../datatables/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../datatables/js/dataTables.bootstrap4.js"></script>

<script type="text/javascript">
	$(function(){
		$('#TabelTampilData').dataTable();
	});

	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
	})
</script>
</body>