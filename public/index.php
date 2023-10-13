<?php
session_start();
include_once "perpus/modul.php";

if (isset($_POST["TombolLogin"])) {
	$Username 	= $_POST["username"];
	$Password 	= $_POST["password"];

	$Hasil 	= mysqli_query($Koneksi, "SELECT * FROM tb_user WHERE username = '$Username'");
    $Cek = mysqli_num_rows($Hasil);

	// Cek Username
	if ($Cek > 0){
        $data = mysqli_fetch_assoc($Hasil);

        if ($data['role']=="admin") {
            $_SESSION['Login'] = true;
            $_SESSION['username'] = $Username;
            $_SESSION['role'] = "admin";
            header("location:perpus/MenuUtama.php");
        }else if ($data['role'] == "kasir") {
            $_SESSION['Login'] = true;
            $_SESSION['username'] = $Username;
            $_SESSION['role'] = "kasir";
            header("location:kasir/MenuKasir.php");
        }else if ($data['role'] == "owner") {
            $_SESSION['Login'] = true;
            $_SESSION['username'] = $Username;
            $_SESSION['role'] = "owner";
            header("location:owner/Menuowner.php");
        }else{
        $PesanKesalahan = true;
    }
}}
?>

<html>
<head>
<title><?php include_once("perpus/judul.php"); ?></title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
<link rel="stylesheet" href="perpus/custom.css">

<style>
.cari-invoice {
        width: 500px;
        margin: 50px auto;
}
.cari-invoice form {        
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.cari-invoice h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
}
.input-group-addon .fa {
    font-size: 18px;
}
.btn {        
    font-size: 15px;
}
</style>
</head>
<body>
    <div class="cari-invoice">
        <form action="index.php" method="POST">
                <h2 class="text-center">Log In</h2>
                <?php if (isset($PesanKesalahan)) : ?>
                    <p style="color: red; font-style: italic;">Username atau Password Salah</p>
                <?php endif; ?>
                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" id="Username" name="username" placeholder="Username" required="required">
                    </div>
                </div>
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" class="form-control" id="Username" name="password" placeholder="Password" required="required">
                    </div>
                </div>        
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-block" id="TombolLogin" name="TombolLogin">Log In</button>
                </div>
                <div class="clearfix">
                    <a href="#" class="pull-right">Lupa Password?</a>
                </div>        
        </form>
    </div>



<script type="text/javascript" src="jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="jquery/jquery-validate.js"></script>
</body>
</body>
</html>