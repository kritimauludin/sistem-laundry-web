<?php
session_start();
if (!isset($_SESSION["Login"])) {
	header("Location: ../index.php");
	exit;
}
include_once("../perpus/modul.php");

$KodeInvoice = $_GET["kode_invoice"];

if (HapusDataTransaksi($KodeInvoice) > 0) {
	echo "
			<script>
				alert('Data Berhasil Dihapus');
				document.location.href='IsiDataTransaksi.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data Gagal Dihapus');
				document.location.href='IsiDataTransaksi.php';
			</script>
		";
	}
?>