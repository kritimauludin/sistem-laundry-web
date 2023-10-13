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
<?php include_once ("../perpus/navbar.php"); ?>
<!-- Akhir Nav Bar-->
<div class="container-fluid margin:10px; " >
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="../../webProfile/image/bannerOne.webp" alt="First slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../../webProfile/image/bannerTwo.jpg" alt="Second slide">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="../../webProfile/image/bannerThree.webp" alt="Third slide">
                </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
                </a>
            </div>
        </div>

<!-- Awal Java Script -->
<script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../datatables/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../datatables/js/dataTables.bootstrap4.js"></script>
<!-- Akhir Java Script -->

</body>
</html>