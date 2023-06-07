<div class="row mb-3">
	<div class="col-lg-6">
		<img class="img-fluid rounded" src="<?= base_url('img/foto_produk/') . $produk->foto_produk ?>">
	</div>
	<div class="col-lg-6">
		<div class="card">
			<div class="card-header">
				<h1><?= $produk->nama_produk ?></h1>
			</div>
			<ul class="list-group list-groud-flush">
				<li class="list-group-item">
					<p><?= $produk->deskripsi_produk ?></p>
				</li>
				<li class="list-group-item">
					<p>Berat : <?= $produk->berat_produk ?> g</p>
				</li>
				<li class="list-group-item">
					<p>Stok : <?= $produk->stok_produk ?> tersedia</p>
				</li>
				<li class="list-group-item">
					<p class="text-danger fs-3 fw-bold fst-italic">Rp.<?= number_format($produk->harga_produk) ?></p>
				</li>
				<li class="list-group-item">
					<form action="<?= base_url('produk/add_to_cart') ?>" method="post">
						<input type="hidden" name="id_produk" value="<?= $produk->id_produk ?>">
						<input type="hidden" name="harga" value="<?= $produk->harga_produk ?>">
						<input type="hidden" name="nama" value="<?= $produk->nama_produk ?>">
						<input type="hidden" name="berat" value="<?= $produk->berat_produk ?>">
						<div class="text-center">
							<div class="d-flex justify-content-center">
								<div class="w-25 p-1 mb-2 d-flex justify-content-between">
									<!-- <span class="qty-minus d-flex align-items-center me-2"><i class="fa fa-minus"></i></span> -->
									<input type="number" min="1" max="<?= $produk->stok_produk ?>" class="form-control text-center" value="1" name="qty">
									<!-- <span class="qty-plus d-flex align-items-center ms-2"><i class="fa fa-plus"></i></span> -->
								</div>
							</div>
							<button type="submit" class="btn btn-primary">Tambahkan ke keranjang</button>
						</div>
					</form>
				</li>
			</ul>
		</div>
	</div>
</div>