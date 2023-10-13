<?php
include_once("../perpus/modul.php");

if (isset($_POST["TombolRegistrasi"])) {
    if (TambahDataUser($_POST) > 0) {
        echo "
            <script>
                alert('User Baru Berhasil Ditambahkan');
                document.location.href='TambahUser.php';
            </script>
        ";
    } else {
        echo mysqli_error($Koneksi);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title><?php include_once("../perpus/judul.php") ?></title>

	<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="../datatables/css/dataTables.bootstrap4.css">
	<link rel="stylesheet" href="../fontawesome/css/font-awesome.css">
    <link rel="stylesheet" href="../perpus/custom.css">	
    
    <style type="text/css">
            #password-ukur{ display: block;}
            progress{ font-size: 15px; width: 100%;}
        </style>
</head>
<body>
	<?php echo include_once("../perpus/navbar.php") ?>

	<div class="container">
	    <div id="JudulForm">
	        <h2>Registrasi Pengguna</h2>
	        <hr>
	    </div>
	</div>

	<div class="container">
    <form action="" method="POST" id="FormEntri">
    	<div class="form-group row">
            <label class="col-sm-2 col-form-label">Nama Lengkap</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="Nama" name="nama" placeholder="Nama Lengkap" required>
            </div>
        </div>
        <div class="form-group row">
            <label for="Username" class="col-sm-2 col-form-label">Username</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" id="Username" name="username" placeholder="Username" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                <progress id="password-ukur" value="0" max="100"></progress>
            </div>
        </div>
         <div class="form-group row">
            <label class="col-sm-2 col-form-label">Konfirmasi Password</label>
            <div class="col-sm-4">
                <input type="password" class="form-control" id="Password2" name="password2" placeholder="Konfirmasi Password" required>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-4">
                <select name="role">
                	<option value="admin">Admin</option>
                	<option value="kasir">Kasir</option>
                	<option value="owner">Owner</option>
                </select>
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 col-form-label"></label>
            <div class="col-sm-4">
                <button type="submit" id="TombolRegistrasi" name="TombolRegistrasi" class="btn btn-outline-success">Registrasi</button>
                <a href=""><button type="button" id="TombolBatal" name="TombolBatal" class="btn btn-outline-secondary">Batal</button></a>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript" src="../jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="../datatables/js/jquery.dataTables.js"></script>
<script type="text/javascript" src="../datatables/js/dataTables.bootstrap4.js"></script>

<script type="text/javascript">
    let password = document.querySelector('#password');
    let passwordUkur = document.querySelector( '#password-ukur');
        password.addEventListener("keyup", function(e){
            cekPassword(password.value);
        });
        function cekPassword(password){
            let strength = 0;
            if (password.match(/([a-z])/)){ strength += 1; }
            if (password.match(/([A-Z])/)){ strength += 1; }
            if (password.match(/([0-9])/)){ strength += 1; }
            if (password.length >= 6){ strength += 1; }
            passwordUkur.value = strength * 25;
        }
</script>
</body>
</html>