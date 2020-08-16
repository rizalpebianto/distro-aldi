<?php

include 'koneksi.php';

$data['barang'] = $koneksi->query("SELECT * FROM upload");
if (isset($_POST["cari"])) 
{
  $keyword = $_POST['keyword'];
  $data['barang'] = $koneksi->query("SELECT * FROM upload WHERE nama_produk LIKE '%$keyword%'");

}
function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
  return $hasil_rupiah;
}

include '_header.php';
?>

<div class="bodytop">
<div class="container">
  <h3 align="center"><span class="badge badge-warning"> SEMUA PRODUK</span></h3><br>

<div class="row">
    <div class="col-lg-12 d-flex justify-content-center">
<form action="" method="POST">
  <div class="input-group">
    <input type="text" class="form-control" placeholder="Cari nama produk.." name="keyword" autocomplete="off">
    <div class="input-group-append">
      <button name="cari" class="btn btn-outline-warning" type="submit" id="tombolCari">Cari</button>
    </div>
  </div>
</form>
</div>
</div>

  <div class="row ">
    <?php foreach($data['barang'] as $barang): ?>
     <div class="col-md-3  d-flex justify-content-center">
      <div class="card mb-4" style="height: auto; width: 15rem;">
        <img  src="<?php echo "img/".$barang['nama_file'];?>" class="card-img-top" alt="...">
        <div class="card-body">
         <div align="center">
          <h5 class="card-title"><strong><?= $barang['nama_produk'];?></strong></h5>
          <strong><?= rupiah($barang['harga']) ?></strong><br>
          <a href="detail.php?id=<?php echo $barang['id'] ?>" class="btn btn-warning btn-sm mt-4">Detail Produk</a>
        </div>
      </div>
    </div>
</div>
<?php endforeach;?>
</div>
</div>
</div>

<?php include '_footer.php' ?>;