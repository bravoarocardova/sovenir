<header class="header black-bg">
	<div class="sidebar-toggle-box">
		<div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
	</div>
	<!--logo start-->
	<a href="<?= base_url('admin/dashboard') ?>" class="logo"><b>Souvenir<span>Fiqih</span></b></a>
	<!--logo end-->

	<div class="top-menu">
		<ul class="nav pull-right top-menu">
			<li><a class="logout" href="<?= base_url('admin/auth/logout') ?>">Logout</a></li>
		</ul>
	</div>
</header>

<aside>
	<div id="sidebar" class="nav-collapse ">
		<!-- sidebar menu start-->
		<ul class="sidebar-menu" id="nav-accordion">
			<p class="centered"><a href="#"><img src="<?= base_url('assets/admin/') ?>/find_user.png" class="img-circle" width="80"></a></p>
			<h5 class="centered">Admin</h5>
			<li class="mt">
				<a class="<?php if ($this->uri->segment(2) == 'dashboard') echo 'active'; ?>" href="<?= base_url('admin/dashboard') ?>">
					<i class="fa fa-dashboard"></i>
					<span>Home</span>
				</a>
			</li>
			<li class="mt-2">
				<a class="<?php if ($this->uri->segment(2) == 'produk') echo 'active'; ?>" href="<?= base_url('admin/produk') ?>">
					<span class="glyphicon glyphicon-modal-window" aria-hidden="true"></span>
					<span>Produk</span>
				</a>
			</li>
			<li class="mt-2">
				<a class="<?php if ($this->uri->segment(2) == 'pembelian') echo 'active'; ?>" href="<?= base_url('admin/pembelian') ?>">
					<span class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></span>
					<?php
					$pembelian = $this->db->where("status_pembelian IN ('sudah kirim pembayaran', 'dikirim')")->get('pembelian')->num_rows();
					?>
					<span>Pembelian <span class="badge bg-danger"><?= $pembelian ?></span></span>
				</a>
			</li>
			<li class="mt-2">
				<a class="<?php if ($this->uri->segment(2) == 'pelanggan') echo 'active'; ?>" href="<?= base_url('admin/pelanggan') ?>">
					<span class="glyphicon glyphicon-user" aria-hidden="true"></span>
					<span>Pelanggan</span>
				</a>
			</li>
			<li class="mt-2">
				<a class="<?php if ($this->uri->segment(3) == 'pesanan') echo 'active'; ?>" href="<?= base_url('admin/laporan/pesanan') ?>">
					<!-- <i class="glyphicon glyphicon-use"></i> -->
					<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
					<span>Laporan Pesanan</span>
				</a>
			</li>
			<li class="mt-2">
				<a class="<?php if ($this->uri->segment(3) == 'produk') echo 'active'; ?>" href="<?= base_url('admin/laporan/produk') ?>">
					<!-- <i class="glyphicon glyphicon-use"></i> -->
					<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
					<span>Laporan Produk</span>
				</a>
			</li>
			<!-- <li class="mt">
				<a class="active" href="index.php?halaman=grafik">
					<i class="glyphicon glyphicon-use"></i>
					<span class="glyphicon glyphicon-book" aria-hidden="true"></span>
					<span>Grafik</span>
				</a>
			</li> -->
		</ul>
		<!-- sidebar menu end-->
	</div>
</aside>