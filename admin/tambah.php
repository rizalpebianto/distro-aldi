<?php
session_start();
include 'koneksi.php';
if ( !isset($_SESSION["login"])) {
	header("location: login.php");
	exit;
}

if (isset($_POST['save']))	
{
	$ekstensi_diperbolehkan	= array('png','jpg');
	$nama = $_FILES['nama_file']['name'];
	$x = explode('.', $nama);
	$ekstensi = strtolower(end($x));
	$ukuran	= $_FILES['nama_file']['size'];
	$file_tmp = $_FILES['nama_file']['tmp_name'];
	$nama_produk = $_POST['nama_produk'];
	$harga = $_POST['harga'];
	$bahan = $_POST['bahan'];
	$kategori = $_POST['kategori'];
	$ukuran = $_POST['ukuran'];
	$stok = $_POST['stok'];
	$deskripsi = $_POST['deskripsi'];

	move_uploaded_file($file_tmp, '../img/'.$nama);
	$koneksi->query("INSERT INTO upload VALUES('','$nama_produk', '$harga', '$bahan', '$kategori', '$ukuran', '$stok', '$deskripsi', '$nama')");

	echo "<script>alert('Produk Ditambahkan');</script>";
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

								<h2><span class="badge badge-info mb-4 ukuranbut ukuranHead"><i class="fa fa-shopping-bag"></i> DATA PRODUK</span></h2>

								<h5><span class="badge badge-secondary mb-1"> Nama Produk</span></h5>
								<input type="text" class="form-control mb-4" name="nama_produk" required>

								<h5><span class="badge badge-secondary mb-1"> Harga</span></h5>
								<input type="number" class="form-control mb-4" name="harga" required>

								<h5><span class="badge badge-secondary mb-1"> Bahan</span></h5>
								<select id="inputState" class="form-control" name="bahan">
									<option selected>Choose...</option>
									<option value="Canvas">Canvas</option>
									<option value="Parasut">Parasut</option>
									<option value="Combed 30s">Combed 30s</option>						
								</select><br>

								<h5><span class="badge badge-secondary mb-1"> Kategori</span></h5>
								<select id="inputState" class="form-control" name="kategori">
									<option selected>Choose...</option>
									<option value="T-Shirt">T-Shirt</option>
									<option value="Hoddie">Hoddie</option>
									<option value="Shoes">Shoes</option>						
								</select><br>

								<h5><span class="badge badge-secondary mb-1"> Ukuran</span></h5>
								<input type="text" class="form-control mb-4" name="ukuran" required>
								
								<h5><span class="badge badge-secondary mb-1"> Stok</span></h5>
								<input  type="number" class="form-control mb-4" name="stok" required>	

								<h5><span class="badge badge-secondary mb-1"> Deskripsi</span></h5>
								<textarea class="form-control mb-4" name="deskripsi"></textarea>

								<h5><span class="badge badge-secondary mb-1"> Gambar</span></h5>
								<!-- <input type="file" name="nama_file" size="30" maxlength="30"> -->
								
								<input type="file" name="nama_file" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
								<img id="blah" alt="your image" width="150" height="150" />

								<div class="mt-4" align="center">
									<input type="submit" value="Simpan" name="save" class="btn btn-info mt-2 ukuranbut1">
									<a href="index.php" class="btn btn-danger mt-2 ukuranbut1"><i class="fa fa-undo fa-fw"></i> Kembali</a>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>