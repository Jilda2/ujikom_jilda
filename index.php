<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Aplikasi Kasir -  UJIKOM</title>

	<link href="assets/bootstrap-5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="content">
			<div class="card mt-5">
				<div class="row">
					<div class="col-6">
						<div class="card-body">
							<p class="text-center mt-4" >Silahkan Masukan Username dan Password</p>
							<?php
							if(isset($_GET['pesan'])){
								if($_GET['pesan']=="gagal"){
									echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
								}
							}
							?>
							<form method="post" action="cek_login.php">
							<div class="form-group">
								<label>Username</label>
								<input class="form-control" type="text" name="username" placeholder="Silahkan Masukan Username">
							</div>
							<div class="form-group">
								<label>Password</label>
								<input class="form-control" type="password" name="password" placeholder="Silahkan Masukan Password">
							</div>
							<div class="form-group mt-3">
								<button class="btn btn-info form-control" type="submit">Login</button>
								
							</div>
							</form>
						</div>
					</div>
					<div class="col-6">
						<div class="card-body">
							<img width="400" height="300" src="img/gambar2.jpg">
						</div>
						
					</div>
				</div>
			</div>
		</div>		
	</div>












<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>