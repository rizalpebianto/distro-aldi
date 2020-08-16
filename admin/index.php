<?php
session_start();
include 'koneksi.php';
if ( !isset($_SESSION["login"])) {
	header("location: login.php");
	exit;
}


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




<div class="bodytop">
  <div class="container mb-4">





    <a href="tambah.php" class="btn btn-warning btn-sm mt-4 mb-4 ukuranButAdmin"><i class="fa fa-plus fa-fw"></i> Tambah Produk</a>
    <a href="cetak.php" class="btn btn-info btn-sm mt-4 mb-4 ukuranButAdmin"><i class="fa fa-print fa-fw"></i> Cetak</a> 
    <a href="logout.php" class="btn btn-danger btn-sm mt-4 mb-4 ukuranButAdmin"><i class="fa fa-remove fa-fw"></i> Logout</a>


    
    <form action="" method="POST">

      <div class="input-group">
        <input type="text" class="form-control" placeholder="Cari nama produk.." name="keyword" autocomplete="off" autofocus="on">
        <div class="input-group-append">
          <button name="cari"class="btn btn-outline-warning" type="submit" id="tombolCari">Cari</button>
        </div>
      </div>
    </form>


    <div class="row ">
      <div class="col-12 d-flex justify-content-center">
        <div style="width: 100%;" class="card">
          <table class="table table-hover table-responsive">
            <thead>
              <tr>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Gambar</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($data['mhs'] as $mhs): ?>
                <tr>              
                  <td width="200px"><?= $mhs['nama_produk'];?></td>
                  <td width="250px"><?= rupiah($mhs['harga']);?></td>
                  <td width="250px"><img src="<?php echo "../img/".$mhs['nama_file'];?>" width="100" height="100" ></td>
                  <td width="600px"><a href="detail.php?id=<?php echo $mhs['id'] ?>" class="badge badge-info"><i class="fa fa-info fa-fw"></i> Detail</a> <a href="edit.php?id=<?php echo $mhs['id'] ?>" class="badge badge-secondary"><i class="fa fa-edit fa-fw"></i> Edit</a> <a onclick="return confirm('Are you sure you want to delete?');" href="hapus.php?id=<?php echo $mhs['id'] ?>" class="badge badge-danger"><i class="fa fa-remove fa-fw"></i> Hapus</a></td> 
                </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<?php include '_footer.php' ?>;