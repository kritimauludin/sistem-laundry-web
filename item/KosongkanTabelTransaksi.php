<?php
session_start();
if(!isset($_SESSION["Login"])){
    header("Location: ../index.php");
    exit;
}
include_once("../perpus/modul.php");

if (KosongkanTabelTransaksi() > 0) {
	echo "
			<script>
				alert('Tabel Telah Dikosongkan');
				document.location.href='IsiDataTransaksi.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Tabel Gagal Dikosongkan');
				document.location.href='IsiDataTransaksi.php';
			</script>
		";
	}
?>