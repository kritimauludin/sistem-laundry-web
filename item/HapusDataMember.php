<?php
session_start();
if (!isset($_SESSION["Login"])) {
	header("Location: ../index.php");
	exit;
}
include_once("../perpus/modul.php");

$KodeMember = $_GET["kode_member"];

if (HapusDataMember($KodeMember) > 0) {
	echo "
			<script>
				alert('Data Berhasil Dihapus');
				document.location.href='IsiDataMember.php';
			</script>
		";
	} else {
		echo "
			<script>
				alert('Data Gagal Dihapus');
				document.location.href='IsiDataMember.php';
			</script>
		";
	}
?>