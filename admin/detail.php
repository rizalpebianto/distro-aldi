<?php
session_start();
include 'koneksi.php';
if ( !isset($_SESSION["login"])) {
  header("location: login.php");
  exit;
}
$ambil = $koneksi->query("SELECT * FROM upload WHERE id='$_GET[id]'");
$data['mhs'] = $ambil->fetch_assoc();

function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
  return $hasil_rupiah;
 
}

include '_header.php';
?>
 
<div class="bodytop">
  <div class="container mt-3">
    <div class="row ">
        <div class="col-12 d-flex justify-content-center">
            <div class="card mb-3" style="width: 60%;">
              <div class="row no-gutters">
                <div class="col-lg-6">
                  <img src="<?php echo "../img/".$data['mhs']['nama_file'];?>" class="card-img" alt="...">
              </div>
              <div class="col-lg-6">
                  <div class="card-body">
                    <div class="produkpadding1">
                        <h5 class="card-title"><?= $data['mhs']['nama_produk'];?></h5>
                        <p class="card-text"><strong>Harga </strong> (<?= rupiah($data['mhs']['harga']);?>) </p>
                        <p class="card-text"><strong>Kategori </strong> (<?= $data['mhs']['kategori'];?>) </p>
                        <p class="card-text"><strong>Ukuran </strong> (<?= $data['mhs']['ukuran'];?>) </p>
                        <p class="card-text"><strong>Stok </strong> (<?= $data['mhs']['stok'];?>) </p>
                        <!-- <p class="card-text"><small class="text-muted"><?= $data['mhs']['deskripsi'];?></small></p> -->
                        <!-- <a href="" class="btn btn-warning btn-sm mt-4">Pesan</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<div class="col-12 d-flex justify-content-center">
<div class="card border-secondary mb-3" style="width: 61%;">
  <div class="card-header">Deskripsi</div>
  <div class="card-body text-secondary">
    <h5 class="card-title"><?= $data['mhs']['nama_produk'];?></h5>
    <p class="card-text"><p class="card-text"><small class="text-muted"><?= $data['mhs']['deskripsi'];?></small></p></p>
  </div>
</div>
</div>
</div>
</div>

<?php include '_footer.php';