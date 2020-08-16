<?php
session_start();
include 'koneksi.php';

if ( isset($_SESSION["login"])) {
	header("location: index.php");
	exit;
}

if (isset($_POST["login"])) {
	
	$username = $_POST["username"];
	$password = $_POST["sandi"];

	$result = $koneksi->query("SELECT * FROM admin WHERE username ='$username' and sandi= '$password'");

	if (mysqli_num_rows($result) === 1) {
		$_SESSION["login"] = true;
		header('location: index.php');
		exit;
	}

	else{
		echo "<script>alert('Username/password salah');</script>";
		echo "<script>location='login.php';</script>";
	}
}

include '_header.php';

?>

<div class="bodytop">
<div class="container mb-4">
	<div class="row ">
		<div class="col-12 d-flex justify-content-center">
			<div style="width: 50%; align-content: center;" class="card">
				<div class="card-body">
					<form action="" method="post" enctype="multipart/form-data">
						<div class="form-group">

							<h2><span class="badge badge-info mb-4 ukuranbut ukuranHead"><i class="fa fa-user fa-fw"></i> LOGIN</span></h2>

							<h5><span class="badge badge-secondary mb-1"><i class="fa fa-id-card-o fa-fw"></i> Username</span></h5>
							<input type="text" class="form-control mb-4" name="username" required>

							<h5><span class="badge badge-secondary mb-1"><i class="fa fa-address-book-o fa-fw"></i> Sandi</span></h5>
							<input type="password" class="form-control mb-4" name="sandi" required>

							<div align="center">
							<input type="submit" value="Login" name="login"  class="btn btn-info mt-2 ukuranbut1">
							<a href="../" class="btn btn-danger mt-2 ukuranbut1"><i class="fa fa-undo fa-fw"></i> Kembali</a>
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