<html>
<head>
	<title><?php include_once("../perpus/judul.php"); ?></title>
 </head>
</head>
<body>
		<?php
		include_once("../perpus/modul.php");
			if (isset($_GET['Filter']) && ! empty($_GET['Filter'])) {
				$FilterData = $_GET['Filter'];
				if ($FilterData == '1'){
					$FilterDataBulan = array('', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember' );
					echo '<hr>';
					echo '<p style="font-size:18px;">Data Keuangan Bulan <i style="color: #e74c3c;">'.$FilterDataBulan[$_GET['filter_bulan']].' '.$_GET['filter_tahun'].'</i></p>';
					$QueryData = "SELECT tb_transaksi.tgl, date_add(tb_transaksi.tgl, INTERVAL 1825 DAY) as tgl_bayar, kode_invoice, berat, keterangan, total_bayar FROM tb_transaksi WHERE MONTH(tgl)='".$_GET['filter_bulan']."' AND YEAR(tgl)='".$_GET['filter_tahun']."'ORDER BY tb_transaksi.tgl DESC";
					}
				}else {
					echo '<p>Semua Data Transaksi</p>';
					$QueryData = "SELECT tb_transaksi.tgl, date_add(tb_transaksi.tgl, INTERVAL 1825 DAY) AS tgl, tgl_bayar, kode_invoice, berat, keterangan, total_bayar FROM tb_transaksi ORDER BY tb_transaksi.tgl DESC";
				}
			?>
		</div>
			<table id="TabelTampilData" style="table-layout: auto; width: 100%; border-collapse: collapse; margin-top: 10px;">
				<thead align="center">
					<tr style="text-align: center; font-size: 15px;">
						<th style="background-color: #444d55; color: #ffffff; padding: 5px; border-bottom: 1px solid #ddd; height: 30px; width=80px;">Tanggal Masuk</th>
						<th style="background-color: #444d55; color: #ffffff; padding: 5px; border-bottom: 1px solid #ddd; height: 30px; width=80px;">Tanggal Bayar</th>
						<th style="background-color: #444d55; color: #ffffff; padding: 5px; border-bottom: 1px solid #ddd; height: 30px; width=185px;">Kode Invoice</th>
						<th style="background-color: #444d55; color: #ffffff; padding: 5px; border-bottom: 1px solid #ddd; height: 30px; width=100px;">Berat Barang</th>
						<th style="background-color: #444d55; color: #ffffff; padding: 5px; border-bottom: 1px solid #ddd; height: 30px; width=95px;">Keterangan</th>
						<th style="background-color: #444d55; color: #ffffff; padding: 5px; border-bottom: 1px solid #ddd; height: 30px; width=190px;">Total Bayar</th>
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

							echo '<tr>
						            <td>'.$Tgl.'</td>;
						            <td>'.$TglBayar.'</td>;
						            <td>'.$Data['kode_invoice'].'</td>;
						            <td>'.$Data['berat'].'</td>;
						            <td>'.$Data['keterangan'].'</td>;
						            <td>'.$Data['total_bayar'].'</td>;
				            	</tr>';
							}
						}
					?>
				</tbody>
			</table>
		</div>
</body>
</html>

<?php
$html = ob_get_contents();
require_once('../perpus/html2pdf/html2pdf.class.php');
$html2pdf = new HTML2PDF('L','A4','en');
$html2pdf -> setDefaultFont('times');
$html2pdf -> WriteHTML($html);
$html2pdf -> Output('Data Keuangan perbulan.pdf');
?>