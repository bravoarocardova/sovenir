<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('template/_partial/head') ?>
</head>

<body>

	<main>
		<div class="d-flex justify-content-center vh-100">
			<div class="d-flex align-items-center">
				<div class="card" style="width: 18rem;">
					<div class="card-header text-center bg-dark text-light fw-bolder">
						<h2>Daftar</h2>
					</div>
					<div class="card-body">
						<form action="<?= base_url('auth/proses') ?>" method="POST">
							<div class="form-floating mb-3">
								<input type="text" class="form-control" name="nama" id="fINama" placeholder="Nama">
								<label for="fINama">Nama</label>
							</div>
							<div class="form-floating mb-3">
								<input type="email" class="form-control" name="email" id="fIEmail"
									placeholder="name@example.com">
								<label for="fIEmail">Email address</label>
							</div>
							<div class="form-floating mb-3">
								<input type="password" class="form-control" name="password" id="fIPassword"
									placeholder="Password">
								<label for="fIPassword">Password</label>
							</div>
							<div class="form-floating mb-3">
								<textarea class="form-control" placeholder="Alamat" name="alamat"
									id="floatingTextarea"></textarea>
								<label for="floatingTextarea">alamat</label>
							</div>
							<div class="form-floating mb-3">
								<input type="text"  class="form-control" name="telepon" id="fITelepon"
									placeholder="Telepon">
								<label for="fITelepon">Telepon</label>
							</div>
							<div class="d-grid">
								<button type="submit" name="daftar" class="btn btn-primary">DAFTAR</button>
							</div>
						</form>
						<p class="text-muted mt-5">Sudah punya akun? <a href="<?= base_url('auth/login') ?>">Login</a>
						</p>
					</div>
				</div>
			</div>

		</div>

	</main>

	<?php $this->load->view('template/_partial/js') ?>
</body>

</html>
