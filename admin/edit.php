<?php
session_start();
include 'koneksi.php';

$ambil=$koneksi->query("SELECT * FROM upload WHERE id='$_GET[id]'");
$data=$ambil->fetch_assoc();

if (isset($_POST['ubah']))
{
	$gambarlama = $data['nama_file'];
	$ekstensi_diperbolehkan	= array('png','jpg');
	$nama = $_FILES['nama_file']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['nama_file']['size'];
	$file_tmp = $_FILES['nama_file']['tmp_name'];
	$id = $_POST['id'];
	$nama_produk = $_POST['nama_produk'];
	$harga = $_POST['harga'];
	$bahan = $_POST['bahan'];
	$kategori = $_POST['kategori'];
	$ukuran = $_POST['ukuran'];
	$stok = $_POST['stok'];
	$deskripsi = $_POST['deskripsi'];

	if (!empty($file_tmp)) 
	{
		move_uploaded_file($file_tmp, '../img/'.$nama);
		$koneksi->query("UPDATE upload SET nama_produk='$nama_produk', harga='$harga', bahan='$bahan', kategori='$kategori', ukuran='$ukuran', stok='$stok', deskripsi='$deskripsi', nama_file='$nama' WHERE id='$id' ");
		if (file_exists("../img/$gambarlama")) 
		{
			unlink("../img/$gambarlama");
		}
	}
	
	else
	{

			$koneksi->query("UPDATE upload SET nama_produk='$nama_produk', harga='$harga', bahan='$bahan', kategori='$kategori', ukuran='$ukuran', stok='$stok', deskripsi='$deskripsi' WHERE id='$id'");
		
	}
		
		echo "<script>alert('data produk berhasil diubah');</script>";
		echo "<script>location='index.php';</script>";
	
}


include '_header.php';

?>

<div class="bodytop">
<div class="container mt-3">
	<div class="row ">
		<div class="col-12 d-flex justify-content-center">
			<div style="width: 90%; align-content: center;" class="card">
				<div class="card-body">
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group">

							<h2><span class="badge badge-info mb-4 ukuranbut ukuranHead"><i class="fa fa-shopping-bag"></i> EDIT DATA PRODUK</span></h2>

							<input  type="HIDDEN" class="form-control" name="id" value="<?= $data['id'];?>" readonly>

							<h5><span class="badge badge-secondary mb-1"> Nama Produk</span></h5>
							<input type="text" class="form-control mb-4" name="nama_produk" value="<?= $data['nama_produk'];?>" required>

							<h5><span class="badge badge-secondary mb-1"> Harga</span></h5>
							<input type="number" class="form-control mb-4" name="harga" value="<?= $data['harga'];?>"  required>

							<h5><span class="badge badge-secondary mb-1"> Bahan</span></h5>
							<select id="inputState" class="form-control" name="bahan">
								<option selected>Choose...</option>
								<option value="Canvas" <?php if($data['bahan'] == "Canvas") echo 'selected="selected"';?>>Canvas</option>
								<option value="Parasut" <?php if($data['bahan'] == "Parasut") echo 'selected="selected"';?>>Parasut</option>
								<option value="Combed 30s" <?php if($data['bahan'] == "Combed 30s") echo 'selected="selected"';?>>Combed 30s</option>						
							</select><br>

							<h5><span class="badge badge-secondary mb-1"> Kategori</span></h5>
							<select id="inputState" class="form-control" name="kategori">
								<option selected>Choose...</option>
								<option value="T-Shirt" <?php if($data['kategori'] == "T-Shirt") echo 'selected="selected"';?>>T-Shirt</option>
								<option value="Hoddie" <?php if($data['kategori'] == "Hoddie") echo 'selected="selected"';?>>Hoddie</option>
								<option value="Shoes" <?php if($data['kategori'] == "Shoes") echo 'selected="selected"';?>>Shoes</option>						
							</select><br>

							<h5><span class="badge badge-secondary mb-1"> Ukuran</span></h5>
							<input type="text" class="form-control mb-4" name="ukuran" value="<?= $data['ukuran'];?>" required>
			
							<h5><span class="badge badge-secondary mb-1"> Stok</span></h5>
							<input  type="number" class="form-control mb-4" name="stok" value="<?= $data['stok'];?>" required>	

							<h5><span class="badge badge-secondary mb-1"> Deskripsi</span></h5>
							<textarea class="form-control mb-4" name="deskripsi" ><?= $data['deskripsi'];?></textarea>

							<h5><span class="badge badge-secondary mb-1"> Gambar Produk Saat ini</span></h5>
							<img src="<?php echo "../img/".$data['nama_file'];?>" alt="your image" width="150" height="150" /><br><br>

							<h5><span class="badge badge-secondary mb-1">Ganti Gambar Produk?</span></h5>
							<input type="file" name="nama_file" value="<?php echo "../img/".$data['nama_file'];?>" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
							<img id="blah" alt="your image" width="150" height="150" /><br><br>

							<div align="center">
							<input type="submit" name="ubah" value="Simpan" class="btn btn-info mt-2 ukuranbut1">
							<a href="<?=BASEURL;?>/admin" class="btn btn-danger mt-2 ukuranbut1"><i class="fa fa-undo fa-fw"></i> Kembali</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

<?php include '_footer.php'; ?>