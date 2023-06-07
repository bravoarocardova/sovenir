<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
	<div class="container">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse justify-content-between" id="navbarNavAltMarkup">
			<div class="navbar-nav">
				<a class="nav-link <?= $this->uri->segment(1) == '' ? 'active' : '' ?>" href="<?= base_url() ?>"><i class="fas fa-home"></i> Home</a>
				<?php if (!empty($this->session->userdata('pelanggan'))) : ?>
					<a class="nav-link <?= $this->uri->segment(1) == 'profile' ? 'active' : '' ?>" href="<?= base_url('profile') ?>"><i class="fas fa-user"></i> Profil</a>
					<?php
					$cartTotal = '';
					if ($this->session->userdata('cart_contents') != null) {
						$cartTotal = $this->session->userdata('cart_contents')['total_items'];
					}
					?>
					<a class="nav-link <?= $this->uri->segment(1) == 'keranjang' ? 'active' : '' ?>" href="<?= base_url('keranjang') ?>"><i class="fas fa-shopping-cart"></i> Keranjang <span class="badge bg-warning"><?= $cartTotal ?></span></a>
					<?php
					$id_pelanggan = $this->session->userdata('pelanggan')->id_pelanggan;
					$pembelian = $this->db->where("id_pelanggan = '$id_pelanggan' AND status_pembelian IN ('sudah kirim pembayaran', 'dikirim')")->get('pembelian')->num_rows();
					?>
					<a class="nav-link <?= $this->uri->segment(1) == 'riwayat' ? 'active' : '' ?>" href="<?= base_url('riwayat') ?>"><i class="fas fa-book"></i> Riwayat Belanja <span class="badge bg-warning"><?= $pembelian == 0 ? '' : $pembelian ?></span></a>
					<a class="nav-link" href="<?= base_url('auth/logout') ?>"><i class="fas fa-sign-out-alt"></i>
						Logout</a>
				<?php else : ?>
					<a class="nav-link" href="<?= base_url('auth/login') ?>"><i class="fas fa-sign-in-alt"></i>
						Login</a>
					<a class="nav-link" href="<?= base_url('auth/daftar') ?>"><i class="fas fa-user-plus"></i>
						Daftar</a>
				<?php endif ?>
			</div>
			<form class="d-flex" method="GET" action="<?= base_url('produk/search') ?>">
				<input class="form-control me-2" name="key" type="search" placeholder="Pencarian" aria-label="Search">
				<button class="btn btn-outline-success" type="submit">Cari</button>
			</form>
		</div>
	</div>
</nav>