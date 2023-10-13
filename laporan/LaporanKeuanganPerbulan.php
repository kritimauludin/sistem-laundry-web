<?php 
include_once("../perpus/modul.php");


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
</head>
<body>
	<?php include_once("../perpus/navbar.php"); ?>

	<div class="container-fluid" align="center">
		<h2>Laporan Keuangan Perbulan</h2>
		<hr>
	</div>
	<div class="container-fluid">
		<form method="GET" id="FormLaporan">
			<div class="form-row">
				
				<div class="col-sm-3">
				<label>Filter Berdasarkan Bulan</label>
				<select class="form-control" name="Filter" id="Filter">
					<option value="">pilihan</option>
					<option value="1">Bulan</option>
				</select>
				</div>
			</div>
			<div class="form-row">
				<div class="col-sm-3 Form">
					<label>pilih Bulan:</label>
					<select class="form-control" name="filter_bulan" id="FilterBulan">
						<option value="">Pilihan</option>
						<option value="1">Januari</option>
						<option value="2">Februari</option>
						<option value="3">Maret</option>
						<option value="4">April</option>
						<option value="5">Mei</option>
						<option value="6">Juni</option>
						<option value="7">Juli</option>
						<option value="8">Agustus</option>
						<option value="9">September</option>
						<option value="10">Oktober</option>
						<option value="11">November</option>
						<option value="12">Desember</option>
					</select>
				</div>
			</div>
			<div class="form-row">
				<div class="form-group col-sm-3">
					<label>Pilih Tahun: </label>
					<select class="form-control" name="filter_tahun" id="FilterTahun">
						<option value="">Pilihan</option>
						<?php
							$Query = "SELECT YEAR(tgl) AS filter_tahun FROM tb_transaksi WHERE status_bayar = 'Dibayar' GROUP BY YEAR(tgl)";
							$SQL = mysqli_query($Koneksi, $Query);

							while ($Data = mysqli_fetch_array($SQL)) {
								echo '<option value="'. $Data['filter_tahun'].'">'.$Data['filter_tahun'].'</option>';
							}
						?>
					</select>
				</div>
			</div>
			<div class="form-row">
			<div class="form-group col-sm-3">
				<button type="submit" id="TombolTampilData" class="btn btn-outline-info">Tampil Data</button>
				<a href="LaporanKeuanganPerbulan.php"><button type="button" id="TombolReset" class="btn btn-outline-danger">Reset</button></a>
			</div>
		</div>
		</form>
		<div>
			<?php
			if (isset($_GET['Filter']) && ! empty($_GET['Filter'])) {
				$FilterData = $_GET['Filter'];
				if ($FilterData == '1'){
					$FilterDataBulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember' );
					echo '<hr>';
					echo 'Data Keuangan Bulan <i style="color: #e74c3c;">'.$FilterDataBulan[$_GET['filter_bulan']].' '.$_GET['filter_tahun'].'</i>';
					echo '<a href="CetakLaporanKeuanganPerbulan.php?Filter=2&filter_bulan='.$_GET['filter_bulan'].'filter_tahun'.$_GET['filter_tahun'].'" class="text-success"><i class="fa fa-file-pdf"></i> Generate Laporan</a></br>';
					$QueryData = "SELECT tb_transaksi.tgl, date_add(tb_transaksi.tgl, INTERVAL 1825 DAY) as tgl_bayar, kode_invoice, berat, keterangan, total_bayar FROM tb_transaksi WHERE MONTH(tgl)='".$_GET['filter_bulan']."' AND YEAR(tgl)='".$_GET['filter_tahun']."'ORDER BY tb_transaksi.tgl DESC";
				}
				}else {
					echo '<hr>';
					echo '<a href="CetakLaporanKeuanganPerbulan.php" class="text-success"><i class="fa fa-file-pdf"></i>Generate Laporan</a></br>';
					$QueryData = "SELECT tb_transaksi.tgl, date_add(tb_transaksi.tgl, INTERVAL 1825 DAY) AS tgl_bayar, kode_invoice, berat, keterangan, total_bayar FROM tb_transaksi ORDER BY tb_transaksi.tgl DESC";
				}
			?>
			<hr>
		</div>

		<div id="TampilDataLaporan">
			<table class="table table-hover" id="TabelTampilData" >
				<thead align="center">
					<tr>
						<th>Tanggal Masuk</th>
						<th>Tanggal Bayar</th>
						<th>Kode Invoice</th>
						<th>Berat Barang</th>
						<th>Keterangan</th>
						<th>Total Bayar</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						$SQL	= mysqli_query($Koneksi, $QueryData);
						$Baris	= mysqli_num_rows($SQL);

						if ($Baris > 0) {
							while ($Data = mysqli_fetch_array($SQL)) {
								$Tgl = date('d F Y', strtotime($Data["tgl"]));
								$TglBayar = date('d F Y', strtotime($Data["tgl_bayar"]));

							echo "<tr>";
				            echo "<td>".$Tgl."</td>";
				            echo "<td>".$TglBayar."</td>";
				            echo "<td>".$Data['kode_invoice']."</td>";
				            echo "<td>".$Data['berat']."</td>";
				            echo "<td>".$Data['keterangan']."</td>";
				            echo "<td>".$Data['total_bayar']."</td>";
				            echo "</tr>";
							}
						}
					?>
				</tbody>
			</table>
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