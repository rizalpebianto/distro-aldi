<?php
// memanggil library FPDF
require('./pdf/fpdf.php');
// intance object dan memberikan pengaturan halaman PDF
$pdf = new FPDF('p','mm','A4');
// membuat halaman baru
$pdf->AddPage();

// setting jenis font yang akan digunakan
$pdf->SetFont('Arial','B',16);
// mencetak string 
$pdf->Cell(190,7,'FIREWORKS STORE',0,1,'C');
$pdf->SetFont('Arial','B',12);
$pdf->Cell(190,7,'DAFTAR PRODUK',0,1,'C');

$pdf->SetMargins(25,20,25);
// Memberikan space kebawah agar tidak terlalu rapat
$pdf->Cell(10,7,'',0,1);

$pdf->SetFont('Arial','B',8);
$pdf->Cell(38,6,'Nama Produk',1,0, 'c');
$pdf->Cell(38,6,'Kategori',1,0 , 'c');
$pdf->Cell(38,6,'Stok',1,0, 'c');
$pdf->Cell(38,6,'harga',1,1, 'c');

$pdf->SetFont('Arial','',8);

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,0,',','.');
	return $hasil_rupiah;
}
include 'koneksi.php';
$ambil = $koneksi->query("SELECT * FROM upload ORDER BY kategori ASC");
while ($row = mysqli_fetch_array($ambil)){
	$pdf->Cell(38,6,$row['nama_produk'],1,0, 'c');
	$pdf->Cell(38,6,$row['kategori'],1,0, 'c');
	$pdf->Cell(38,6,$row['stok'],1,0, 'c');
	$pdf->Cell(38,6,rupiah($row['harga']),1,1, 'c');
}

$pdf->Output();
?>


