<?php

include 'koneksi.php';

$data['mhs'] = $koneksi->query("SELECT * FROM upload");
if (isset($_POST["cari"])) 
{
  $keyword = $_POST['keyword'];
  $data['mhs'] = $koneksi->query("SELECT * FROM upload WHERE nama_produk LIKE '%$keyword%'");

}

function rupiah($angka){
  
  $hasil_rupiah = "Rp " . number_format($angka,0,',','.');
  return $hasil_rupiah;
}

include '_header.php';
?>

<div class="bodytop margintest">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="img/slider1.jpg" height="510" class="gambarradius img-fluid d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/slider2.jpg" height="510" class="gambarradius img-fluid d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="img/slider3.jpg" height="510" class="gambarradius img-fluid d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <div class="card mt-4 mb-3">
    <div class="row no-gutters">
      <div class="col-md-6">
        <img src="img/banner-01.jpg" class="card-img" alt="...">
      </div>
      <div class="col-md-6">
        <div class="card-body">
          <div class="produkpadding">
            <h2 class="card-title">All New Collection</h2>
            <p class="card-text">Berbagai model kaos kualitas terbaik dengan harga terjangkau buat kamu yang ingin tampil beda!</p>
            <a href="" class="btn btn-warning btn-sm buttonproduk"> Lihat Produk</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="card mb-3">
    <div class="row no-gutters">
      <div class="col-md-6">
        <div class="card-body">
          <div class="produkpadding">
            <h2 class="card-title">Jacket / Hoddie</h2>
            <p class="card-text">Low Price, High Quality!</p>
            <a href="" class="btn btn-warning btn-sm buttonproduk"> Lihat Produk</a>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <img src="img/banner-02.jpg" class="card-img" alt="...">
      </div>
    </div>
  </div>
  <div class="card mb-3">
    <div class="row no-gutters">
      <div class="col-md-6">
        <img src="img/banner-03.jpg" class="card-img" alt="...">
      </div>
      <div class="col-md-6">
        <div class="produkpadding">
          <div class="card-body">
            <h2 class="card-title">Shoes</h2>
            <p class="card-text">Dapatkan VOUCHER GRATIS Cuci Sepatu di Antique Clean dalam setiap pembelian satu pasang sepatu!</p>
            <a href="" class="btn btn-warning btn-sm buttonproduk"> Lihat Produk</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include '_footer.php' ?>;