<?php
	session_start();
	if (!isset($_SESSION["Login"])) {
		header("Location: ../index.php");
		exit;
	}
	include_once("../perpus/modul.php");
	include "../phpqrcode/qrlib.php";

	 $TampilDataTransaksi = Query("SELECT kode_invoice, kode_member, tgl, batas_waktu, tgl_bayar, diskon, status, status_bayar FROM tb_transaksi ORDER BY kode_invoice ASC");

	 $TampilDataDetailTransaksi = mysqli_query($Koneksi, "SELECT tb_transaksi.kode_paket, tb_transaksi.berat, tb_transaksi.harga_paket, tb_transaksi.keterangan, tb_transaksi.total_bayar FROM tb_transaksi ORDER BY kode_invoice ASC");
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title><?php include_once("../perpus/judul.php");  ?></title>

 	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../datatables/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="../fontawesome/css/font-awesome.css">
	<link rel="stylesheet" href="../perpus/custom.css">
 </head>
 <body>
 	<?php include_once("../perpus/navbar.php") ?>

 	<div class="container-fluid">
 		<div id="JudulForm">
 			<h2>Data Transaksi Laundry</h2>
 			<hr>
 		</div>
 	</div>

 	<div class="container-fluid" id="TampilDataTransaksi">
 		<div class="container-fluid" id="TambahData">
			 <a href="../item/TambahDataTransaksi.php"><button type="button" class=" btn btn-outline-success"><i class="fa fa-plus-circle">Tambah Data</i></button></a>
			 <a href="../item/KosongkanTabelTransaksi.php"><button type="button" class=" btn btn-outline-success" onclick="return confirm('Yakin Ingin Menghapus Seluruh Data?');">Hapus Semua Data</button></a>
 			<hr>
 		</div>

 		<table class="table table-striped" id="TabelTampilData">
 			<thead align="center">
 				<tr>
 					<th>Aksi</th>
					<th>Kode Invoice</th>
					<th>Barcode</th>
 					<th>Kode Member</th>
 					<th>Tanggal Masuk</th>
 					<th>Batas Waktu</th>
 					<th>Tanggal Bayar</th>
 					<th>Diskon</th>
 					<th>Status</th>
 					<th>Status Bayar</th>
 				</tr>
 			</thead>
 			<tbody>
 				<?php foreach ($TampilDataTransaksi as $Baris) :?>
 				<tr align="center">
 					<td align="center">
 						<button type="button" class="btn btn-outline-light text-dark" data-toggle="modal" data-target="#ModalDetailTransaksi"><i class="fa fa-list-ul"></i></button>
					<button type="button" class="btn btn-outline-light text-dark"><a href="UbahDataTransaksi.php?kode_invoice=<?php echo $Baris["kode_invoice"] ?>"  data-toggle="tooltip" data-placement="bottom" title="Ubah Data"><i class="fa fa-pencil-square-o"></i></a></button>
					<button type="button" class="btn btn-outline-light text-dark"><a href="HapusDataTransaksi.php?kode_invoice=<?php echo $Baris["kode_invoice"] ?>"  data-toggle="tooltip" data-placement="bottom" title="Hapus Data" onclick="return confirm('Yakin Data Akan Dihapus?');"><i class="fa fa-trash-o"></i></a></button>
					 </td>
					
					<?php 
					$KodeInvoice = $Baris['kode_invoice'];
					$NamaFile = $KodeInvoice.".png";
					?>
					
					<td><?php echo $Baris['kode_invoice']?> </td>
					<td><img src="../temp/<?php echo $NamaFile ?>"/></td>
 					<td><?php echo $Baris['kode_member']?> </td>
 					<td><?php echo $Baris['tgl']?> </td>
 					<td><?php echo $Baris['batas_waktu']?> </td>
 					<td><?php echo $Baris['tgl_bayar']?> </td>
 					<td><?php echo $Baris['diskon']?> </td>
 					<td><?php echo $Baris['status']?> </td>
 					<td><?php echo $Baris['status_bayar']?> </td>
 				</tr>
 			<?php endforeach; ?>
 			</tbody>
 		</table>

 		<div class="modal fade" id="ModalDetailTransaksi" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Data Detail Transaksi</h4>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					</div>
					<div class="modal-body">
						<table id="TabelTampilData" class="table table-bordered table-hover table-striped">
							<thead>
								<tr>
									<th>Kode Paket</th>
									<th>Berat Barang</th>
									<th>Harga/Kg</th>
									<th>Keterangan</th>
									<th>Total Bayar</th>
								</tr>
							</thead>
							<tbody>
							<?php while ($BarisTransaksi = mysqli_fetch_assoc($TampilDataDetailTransaksi)) { ?>
								<tr>
									<td><?php echo $BarisTransaksi["kode_paket"] ?></td>
									<td><?php echo $BarisTransaksi["berat"] ?></td>
									<td><?php echo $BarisTransaksi["harga_paket"] ?></td>
									<td><?php echo $BarisTransaksi["keterangan"] ?></td>
									<td><?php echo $BarisTransaksi["total_bayar"] ?></td>
								</tr>
							<?php } ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>

 	</div>

<script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../datatables/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../datatables/js/dataTables.bootstrap4.js"></script>
 
<script type="text/javascript">
	$(function() {
        $('#TabelTampilData').dataTable();
    });

	$(document).ready(function(){
    	$('[data-toggle="tooltip"]').tooltip();   
	});

</script>
 </body>
 </html>