<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
	<a class="navbar-brand" href="../perpus/MenuUtama.php">Laundry</a>
	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
	</button>
	<div class="collapse navbar-collapse" id="navbarSupportedContent">
		<ul class="navbar-nav mr-auto">
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Item</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="../item/IsiDataMember.php">Member</a>
					<a class="dropdown-item" href="../item/IsiDataPaket.php">Paket</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Data Transaksi</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="../item/IsiDataTransaksi.php">Data Transaksi Landry</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Laporan</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="../laporan/LaporanKeuanganPerbulan.php">Laporan Keuangan Bulanan</a>
				</div>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Akses Login</a>
				<div class="dropdown-menu" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="../perpus/TambahUser.php">Tambah User</a>
				</div>
			</li>
		</ul>
		<form class="form-inline my-2 my-lg-0">
			<a href="../perpus/logout.php"><button type="button" class="btn btn-outline-success">Log Out</button></a>
		</form>
	</div>
</nav>