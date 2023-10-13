<?php
require('fpdf.php');
include_once("../perpus/modul.php");
$KodeBaru = $_GET['kode_baru'];

$pdf = new FPDF("P","cm","karcis");

$pdf->SetMargins(1,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
//$pdf->image('../gambar/logo.png',5.5,2,3.4,3.5);
$pdf->ln(1);
$pdf->SetFont('Times','',10);
$pdf->Cell(3,1,"Kode Invoice Anda",0,0.3,'C');
$pdf->ln(0);
$query= mysqli_query($Koneksi, "SELECT * FROM tb_transaksi WHERE kode_invoice='$KodeBaru'");
while($lihat=mysqli_fetch_array($query)){
//Queri tabel yang ingin ditampilkan
 $pdf->SetFont('Times', 'B', 12);
 $pdf->Cell(3, 0.1, $lihat['kode_invoice'], 0, 0.3,'C');
 $pdf->ln(0);
 $pdf->SetFont('Times', '', 10);
 $pdf->Cell(1, 0.6,"Harga/item :", 0, 0,'C');
 $pdf->Cell(3, 0.6, $lihat['harga_paket'],0,0,'C');
 $pdf->ln(0);
 $pdf->SetFont('Times', '', 10);
 $pdf->Cell(1, 1.2,"Berat Item: " , 0, 0,'C');
 $pdf->Cell(3, 1.2, $lihat['berat']." Kg",0,0,'C');
 $pdf->ln(0);
 $pdf->SetFont('Times', '', 10);
 $pdf->Cell(1, 2,"Batas Waktu : ",0,0,'C');
 $pdf->Cell(3, 2, $lihat['batas_waktu'],0,0,'C');
 $pdf->ln(0);
  $pdf->SetFont('Times', '', 10);
 $pdf->Cell(3, 2.8, $lihat['status_bayar'],0,0,'C');
 $pdf->ln(0);
 $pdf->SetFont('Times', '', 10);
 $pdf->Cell(1, 3.7,"Sub Total : ",0,0,'C');
 $pdf->Cell(3, 3.7, $lihat['total_bayar'] ,0,0,'C');
 $pdf->ln(0);
 $pdf->SetFont('Times','',5);
 $pdf->Cell(5,4.9,"Tanggal : ".$lihat['tgl'],0,0,'C');
 $pdf->ln(0);
 }
$pdf->Output("Karcis.pdf","D");

?>