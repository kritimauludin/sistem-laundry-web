<?php
$Koneksi = mysqli_connect("localhost", "root", "", "db_laundry") or die(mysqli_error());

function Query($Query){
	global $Koneksi;
	$HasilQuery = mysqli_query($Koneksi, $Query);

	$Tempat = [];
	while ($Baris = mysqli_fetch_assoc($HasilQuery)) {
		$Tempat[] = $Baris;
	}
	return $Tempat;
}
//fungsi mengkosongkan data tabel
function KosongkanTabelTransaksi($Data){
	global $Koneksi;

	$Query = "DELETE FROM tb_transaksi";

	mysqli_query($Koneksi, $Query);
	return mysqli_affected_rows($Koneksi);
}
//fungsi tambah data
function TambahDataMember($Data){
	global $Koneksi;

	$KodeMember		= htmlspecialchars($Data["kode_member"]);
	$NamaMember		= htmlspecialchars($Data["nama"]);
	$Alamat			= htmlspecialchars($Data["alamat"]);
	$JenisKelamin	= htmlspecialchars($Data["jenis_kelamin"]);
	$NomerTelepon	= htmlspecialchars($Data["no_telepon"]);

	$Query = "INSERT INTO tb_member VALUES ('$KodeMember', '$NamaMember', '$Alamat', '$JenisKelamin', '$NomerTelepon') ";

	mysqli_query($Koneksi, $Query);

	return mysqli_affected_rows($Koneksi);
}
function TambahDataPaket($Data){
	global $Koneksi;

	$KodePaket		= htmlspecialchars($Data["kode_paket"]);
	$Jenis 			= htmlspecialchars($Data["jenis"]);
	$NamaPaket		= htmlspecialchars($Data["nama_paket"]);
	$Harga			= htmlspecialchars($Data["harga"]);

	$Query = "INSERT INTO tb_paket VALUES ('$KodePaket', '$Jenis', '$NamaPaket', '$Harga') ";

	mysqli_query($Koneksi, $Query);

	return mysqli_affected_rows($Koneksi);
}
function TambahDataTransaksi($Data){
	global $Koneksi;

	$KodeInvoice	= htmlspecialchars($Data["kode_invoice"]);
	$KodeMember 	= htmlspecialchars($Data["kode_member"]);
	$KodePaket 		= htmlspecialchars($Data["kode_paket"]);
	$HargaPaket		= htmlspecialchars($Data["harga_paket"]);
	$Tgl			= date('Y-m-d');
	$BatasWaktu		= $Data["batas_waktu"];
	$TglBayar		= $Data["tgl_bayar"];
	$Diskon			= htmlspecialchars($Data["diskon"]);
	$Status			= htmlspecialchars($Data["status"]);
	$StatusBayar	= htmlspecialchars($Data["status_bayar"]);
	$Berat			= htmlspecialchars($Data["berat"]);
	$Keterangan		= htmlspecialchars($Data["keterangan"]);
	$TotalBayar		= htmlspecialchars($Data["total_bayar"]);

	$Query = "INSERT INTO tb_transaksi VALUES ('$KodeInvoice', '$KodeMember', '$KodePaket', '$HargaPaket', '$Tgl', '$BatasWaktu', '$TglBayar', '$Diskon', '$Status', '$StatusBayar', '$Berat', '$Keterangan', '$TotalBayar')";

	mysqli_query($Koneksi, $Query);
	return mysqli_affected_rows($Koneksi);

}
function TambahDataUser($Data){
	global $Koneksi;

	$Nama 			= htmlspecialchars($Data["nama"]);
	$Username		= strtolower(stripcslashes($Data["username"]));
	$Password		= mysqli_real_escape_string($Koneksi, $Data["password"]);
	$Password2		= mysqli_real_escape_string($Koneksi, $Data["password2"]);
	$Role			= htmlspecialchars($Data["role"]);

	$Hasil 	= mysqli_query($Koneksi, "SELECT username FROM tb_user WHERE username = '$Username'");

	if (mysqli_fetch_assoc($Hasil)) {
		echo "
            <script>
                alert('Username Sudah Terdaftar');
            </script>
        ";

        return false;

	}

	// Cek Konfirmasi Password
	if ($Password !== $Password2) {
		echo "
            <script>
                alert('Konfirmasi Password Tidak Sesuai');
            </script>
        ";

        return false;

	}

	// Enkripsi Password
	$Password 	= password_hash($Password, PASSWORD_DEFAULT);

	$Query 	= "INSERT INTO tb_user VALUES('', '$Nama', '$Username', '$Password', '$Role')";

	mysqli_query($Koneksi, $Query);

	return mysqli_affected_rows($Koneksi);
}
//fungsi hapus data
function HapusDataMember($KodeMember){
	global $Koneksi;

	mysqli_query($Koneksi, "DELETE FROM tb_member WHERE kode_member = '$KodeMember'");

	return mysqli_affected_rows($Koneksi);
}
function HapusDataPaket($KodePaket){
	global $Koneksi;

	mysqli_query($Koneksi, "DELETE FROM tb_paket WHERE kode_paket = '$KodePaket'");

	return mysqli_affected_rows($Koneksi);
}
function HapusDataTransaksi($KodeInvoice){
	global $Koneksi;

	mysqli_query($Koneksi, "DELETE FROM tb_transaksi WHERE kode_invoice = '$KodeInvoice'");

	return mysqli_affected_rows($Koneksi);
}

//fungsi udah data
function UbahDataMember($Data){
	global $Koneksi;

	$KodeMember		= htmlspecialchars($Data["kode_member"]);
	$NamaMember		= htmlspecialchars($Data["nama"]);
	$Alamat			= htmlspecialchars($Data["alamat"]);
	$JenisKelamin	= htmlspecialchars($Data["jenis_kelamin"]);
	$NomerTelepon	= htmlspecialchars($Data["no_telepon"]);

	$Query = "UPDATE tb_member SET 
				kode_member = '$KodeMember',
				nama 	= '$NamaMember',
				alamat 	= '$Alamat',
				jenis_kelamin = '$JenisKelamin',
				no_telepon	= '$NomerTelepon' WHERE kode_member = '$KodeMember'";

	mysqli_query($Koneksi, $Query);

	return mysqli_affected_rows($Koneksi);
}
function UbahDataPaket($Data){
	global $Koneksi;

	$KodePaket 		= htmlspecialchars($Data["kode_paket"]);
	$Jenis 			= htmlspecialchars($Data["jenis"]);
	$NamaPaket 		= htmlspecialchars($Data["nama_paket"]);
	$Harga 			= htmlspecialchars($Data["harga"]);

	$Query = "UPDATE tb_paket SET 
				kode_paket = '$KodePaket',
				jenis = '$Jenis',
				nama_paket = '$NamaPaket',
				harga = '$Harga' WHERE kode_paket = '$KodePaket'";

	mysqli_query($Koneksi, $Query);

	return mysqli_affected_rows($Koneksi);
}
function UbahDataTransaksi($Data){
	global $Koneksi;

	$KodeInvoice	= htmlspecialchars($Data["kode_invoice"]);
	$KodeMember 	= htmlspecialchars($Data["kode_member"]);
	$KodePaket 		= htmlspecialchars(($Data["kode_paket"]));
	$HargaPaket 	= htmlspecialchars($Data["harga_paket"]);
	$Tgl			= date('Y-m-d');
	$BatasWaktu		= $Data["batas_waktu"];
	$TglBayar		= $Data["tgl_bayar"];
	$Diskon			= htmlspecialchars($Data["diskon"]);
	$Status			= htmlspecialchars($Data["status"]);
	$StatusBayar	= htmlspecialchars($Data["status_bayar"]);
	$Berat 			= htmlspecialchars($Data["berat"]);
	$Keterangan 	= htmlspecialchars($Data["keterangan"]);

	$Query = "UPDATE tb_transaksi SET
				kode_invoice = '$KodeInvoice',
				kode_member = '$KodeMember',
				kode_paket = '$KodePaket',
				harga_paket = '$HargaPaket',
				tgl = '$Tgl',
				batas_waktu = '$BatasWaktu',
				tgl_bayar = '$TglBayar',
				diskon = '$Diskon',
				status = '$Status',
				status_bayar = '$StatusBayar',
				berat = '$Berat',
				keterangan = '$Keterangan' WHERE kode_invoice = '$KodeInvoice'";

	mysqli_query($Koneksi, $Query);
	return mysqli_affected_rows($Koneksi);
}
?>