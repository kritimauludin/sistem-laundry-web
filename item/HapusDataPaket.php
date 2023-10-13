<?php
session_start();
if (!isset($_SESSION["Login"])) {
	header("Location: ../index.php");
	exit;
}
include_once("../perpus/modul.php");

$KodePaket = $_GET["kode_paket"];

if (HapusDataPaket($KodePaket) > 0) {
	echo "
			<script>
				alert('Data Berhasil Dihapus');
				document.location.href='IsiDataPaket.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data Gagal Dihapus');
				document.location.href='IsiDataPaket.php';
			</script>
		";
	}
?>