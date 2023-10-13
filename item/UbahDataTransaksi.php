<?php
session_start();
if (!isset($_SESSION["Login"])) {
	header("Location: ../index.php");
	exit;
}
include_once("../perpus/modul.php");

$KodeInvoice = $_GET["kode_invoice"];

$UbahDataTransaksi = Query("SELECT * FROM tb_transaksi WHERE kode_invoice = '$KodeInvoice'")[0];
if (isset($_POST["TombolUbah"])) {
	if (UbahDataTransaksi($_POST) > 0) {
		echo "
			<script>
				alert('Data Berhasil Diubah');
				document.location.href='IsiDataTransaksi.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data Gagal Diubah');
				document.location.href='IsiDataTransaksi.php';
			</script>
		";
	}
}

$TampilDataMember = Query("SELECT * FROM tb_member ORDER BY kode_member ASC");

$TampilDataPaket  = Query("SELECT * FROM tb_paket ORDER BY kode_paket ASC");
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php include_once("../perpus/judul.php") ?></title>

	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../datepicker/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="../datatables/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="../fontawesome/css/font-awesome.css">
	<link rel="stylesheet" href="../perpus/custom.css">
</head>
<body>

<?php include_once("../perpus/navbar.php") ?>

<div class="container">
	<div id="JudulForm">
		<h2>Ubah Data Transaksi laundry</h2>
		<hr>
	</div>
</div>

<div class="container">
	<form action="" method="POST" id="FormTambah">
		<div class="form-group row">
			<label class="col-sm-2 col-from-label">Kode Invoice</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="KodeInvoice" name="kode_invoice" value="<?php echo $UbahDataTransaksi["kode_invoice"];?>" readonly>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-from-label">Kode Member</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="KodeMember" name="kode_member" placeholder="Pilih Member" readonly value="<?php echo $UbahDataTransaksi["kode_member"] ?>">
			</div>
			<div class="col-sm-1">
				<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#ModalMember">Cari</button>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-from-label">Kode Paket</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" id="KodePaket" name="kode_paket" placeholder="Pilih Paket" readonly value="<?php echo $UbahDataTransaksi["kode_paket"] ?>" required>
			</div>
			<div class="col-sm-2">
				<input type="text" class="form-control" id="HargaPaket" name="harga_paket" placeholder="Harga Paket/kg" readonly value="<?php echo $UbahDataTransaksi["harga_paket"] ?>" required>
			</div>
			<div class="col-sm-1">
				<button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#ModalPaket">Cari</button>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-from-label">Tanggal Masuk</label>
			<div class="col-sm-4">
				<input type="text" class="form-control datepicker" id="Tgl" name="tgl" required value="<?php echo $UbahDataTransaksi["tgl"] ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2 col-from-label">Batas Waktu</label>
			<div class="col-sm-4">
				<input type="text" class="form-control datepicker" id="BatasWaktu" name="batas_waktu" required value="<?php echo $UbahDataTransaksi["batas_waktu"] ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">Tanggal Bayar</label>
			<div class="col-sm-4">
				<input type="text" class="form-control datepicker" id="TglBayar" name="tgl_bayar" value="<?php echo $UbahDataTransaksi["tgl_bayar"] ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">Diskon</label>
			<div class="col-sm-4">
				<input type="number" class="form-control" id="Diskon" name="diskon" value="<?php echo $UbahDataTransaksi["diskon"] ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">Status</label>
			<div class="col-sm-4">
				<select name="status">
					<option value="Baru">Baru</option>
					<option value="Proses">Proses</option>
					<option value="Selesai">Selesai</option>
					<option value="Diambil">Diambil</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">Status Pembayaran</label>
			<div class="col-sm-4">
				<select name="status_bayar">
					<option value="Belum Dibayar">Belum Dibayar</option>
					<option value="Dibayar">Dibayar</option>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">Berat Barang</label>
			<div class="col-sm-4">
				<input type="number" class="form-control" id="Berat" name="berat" required value="<?php echo $UbahDataTransaksi["berat"] ?>">
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">Keterangan</label>
			<div class="col-sm-4">
				<textarea class="form-control" name="keterangan" id="Keterangan" cols="50" rows="2" required value="keterangan"><?php echo $UbahDataTransaksi["keterangan"] ?></textarea>
			</div>
		</div>
		<div class="form-group row">
			<label class="col-sm-2">Jumlah Bayar</label>
			<div class="col-sm-4">
				<input type="number" class="form-control" id="TotalBayar" name="total_bayar" required value="<?php echo $UbahDataTransaksi["total_bayar"] ?>">
			</div>
		</div>

		<div class="form-group row">
			<label class="col-sm-2 col-form-label"></label>
			<div class="col-sm-4">
				<button type="submit" id="TombolUbah" name="TombolUbah" class="btn btn-outline-success">Simpan</button>
				<a href="../item/IsiDataTransaksi.php"><button type="button" id="TombolBatal" name="TombolBatal" class="btn btn-outline-secondary">Batal</button></a>
			</div>
		</div>
	</form>

	<!--Modal-->
	<div class="modal fade" id="ModalMember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Data Member</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<table id="TableModalMember" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Kode Member</th>
								<th>Nama Member</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($TampilDataMember as $Baris) : ?>
							<tr class="PilihDataMember" data-member="<?php echo $Baris['kode_member']; ?>">
								<td><?php echo $Baris["kode_member"]; ?></td>
								<td><?php echo $Baris["nama"]; ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="modal fade" id="ModalPaket" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title" id="myModalLabel">Data Paket</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				</div>
				<div class="modal-body">
					<table id="TableModalMember" class="table table-bordered table-hover table-striped">
						<thead>
							<tr>
								<th>Kode Paket</th>
								<th>Jenis Paket</th>
								<th>Harga</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($TampilDataPaket as $Baris) : ?>
							<tr class="PilihDataPaket" data-paket="<?php echo $Baris['kode_paket']; ?>" data-harga="<?php echo $Baris['harga'] ?>">
								<td><?php echo $Baris["kode_paket"]; ?></td>
								<td><?php echo $Baris["jenis"]; ?></td>
								<td><?php echo $Baris["harga"]; ?></td>
							</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../datepicker/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript" src="../datatables/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../datatables/js/dataTables.bootstrap4.js"></script>

<script type="text/javascript">
	$(function(){
		$(".datepicker").datepicker({
			format: 'yyyy-mm-dd',
			autoclose: true,
			todayHighlight: true,
		});
	});

	// Modal Cabang
	$(document).on('click', '.PilihDataMember', function (e) {
        document.getElementById("KodeMember").value = $(this).attr('data-member');
        $('#ModalMember').modal('hide');
    });

	$(function(){
		$("#TableModalMember").dataTable();
	});

	
	// Modal Divisi
	$(document).on('click', '.PilihDataPaket', function (e) {
        document.getElementById("KodePaket").value = $(this).attr('data-paket');
        document.getElementById("HargaPaket").value = $(this).attr('data-harga');
        $('#ModalPaket').modal('hide');
    });

    $(function(){
		$("#TableModalPaket").dataTable();
	});
</script>

</body>
</html>