<?php 
session_start();

if (!isset($_SESSION["Login"])) {
	header("Location: ../index.php");
	exit;
}

?>

<html>
<head>
<title><?php include_once("../perpus/judul.php"); ?></title>

<!-- Awal CSS -->
<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="../datatables/css/dataTables.bootstrap4.css">
<link rel="stylesheet" href="../fontawesome/css/font-awesome.css">
<link rel="stylesheet" href="../perpus/custom.css">
<!-- Akhir CSS -->

</head>
<body>

<!-- Awal Nav Bar -->
<?php include_once ("../perpus/navbarkasir.php"); ?>
<!-- Akhir Nav Bar-->


<!-- Awal Java Script -->
<script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../datatables/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../datatables/js/dataTables.bootstrap4.js"></script>
<!-- Akhir Java Script -->

</body>
</html>