<?php 
session_start();
include 'koneksi.php';
if ( !isset($_SESSION["login"])) {
	header("location: login.php");
	exit;
}
$ambil = $koneksi->query("SELECT * FROM upload WHERE id='$_GET[id]'");
$pecah = $ambil->fetch_assoc();
$fotoproduk = $pecah['nama_file'];
if (file_exists("../img/$fotoproduk")) 
{
	unlink("../img/$fotoproduk");
}
$koneksi->query("DELETE FROM upload WHERE id='$_GET[id]'");

echo "<script>alert('produk tahapus');</script>";
echo "<script>location='index.php';</script>";
?>