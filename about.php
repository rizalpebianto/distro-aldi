<?php

include 'koneksi.php';

include '_header.php';

?>

<div class="bodytop">
	<div class="container">
		<div align="center">
			<h1><span style="width: 40%;" class="badge badge-warning mb-3">About Us</span></h1>
		</div>


		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<div align="center">
					<img src="img/iumk.png" class="img-fluid" width="150" height="80" alt="">
				</div>
				<div align="center">
				<div style="width: 70%;" class="card">
					<div align="center" class="card-body">
						<h3><span class="badge badge-warning mb-3">Location</span></h3>
						<a href="https://goo.gl/maps/dKPh4LQh2T4JMf5F6" class="btn btn-warning"><i class="fa fa-map mr-1"></i> Google Map</a>
					</div>
				</div>
			</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<div align="center">
					<h3><span style="width: 40%;" class="badge badge-warning mb-3">Some View</span></h3>
				</div>


				<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
						<li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
					</ol>
					<div align="center" class="container carousel-inner">
						<div class="carousel-item active">
							<img src="img/about1.jpg" height="450" class="gambarradius img-fluid d-block w-80" alt="...">
						</div>
						<div class="carousel-item">
							<img src="img/about2.jpg" height="450" class="gambarradius img-fluid d-block w-80" alt="...">
						</div>
						<div class="carousel-item">
							<img src="img/about3.jpg" height="450" class="gambarradius img-fluid d-block w-80" alt="...">
						</div>
						<div class="carousel-item">
							<img src="img/about4.jpg" height="450" class="gambarradius img-fluid d-block w-80" alt="...">
						</div>
						<div class="carousel-item">
							<img src="img/about5.jpg" height="450" class="gambarradius img-fluid d-block w-80" alt="...">
						</div>
						<div class="carousel-item">
							<img src="img/about6.jpg" height="450" class="gambarradius img-fluid d-block w-80" alt="...">
						</div>
					</div>
					<a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
						<span class="carousel-control-prev-icon" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
						<span class="carousel-control-next-icon" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
				
			</div>
		</div>
	</div>

</div>

<?php include '_footer.php' ?>;