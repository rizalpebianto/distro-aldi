<?php
include 'koneksi.php';

$ambil = $koneksi->query("SELECT * FROM upload WHERE id='$_GET[id]'");
$data['barang'] = $ambil->fetch_assoc();

function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
  return $hasil_rupiah;
 
}

include '_header.php';
?>
 
<div class="bodytop">
  <div class="container">
    <div align="center">
    <h3><span class="badge badge-warning mb-3"> DETAIL PRODUK</span></h3>
    </div>
    <div class="row ">
        <div class="col-12 d-flex justify-content-center">
            <div class="card mb-3" style="width: 60%;">
              <div class="row no-gutters">
                <div class="col-lg-6">
                  <img src="<?php echo "img/".$data['barang']['nama_file'];?>" class="gambarradius card-img" alt="...">
              </div>
              <div class="col-lg-6">
                  <div class="card-body">
                    <div class="produkpadding1">
                        <h5 class="card-title"><strong><?= $data['barang']['nama_produk'];?></strong></h5>
                        <p class="card-text"><strong>Harga </strong><br> (<?= rupiah($data['barang']['harga']);?>) </p>
                        <p class="card-text"><strong>Ukuran </strong><br> (<?= $data['barang']['ukuran'];?>) </p>
                        <!-- <p class="card-text"><small class="text-muted"><?= $data['barang']['deskripsi'];?></small></p> -->
                        <a href="https://wa.me/6282339418299?text=Hallo, saya ingin memesan produk (<?= $data['barang']['nama_produk'];?>), Bagaimana cara ordernya?" class="btn btn-warning btn-sm mt-4">Pesan via WhatsApp</a>
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
    <h5 class="card-title"><?= $data['barang']['nama_produk'];?></h5>
    <p class="card-text"><p class="card-text"><small class="text-muted"><?= $data['barang']['deskripsi'];?></small></p></p>
  </div>
</div>
</div>
</div>
</div>

<?php include '_footer.php';