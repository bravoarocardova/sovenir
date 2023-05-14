<div class="row">
	<?php foreach($produk as $p) : ?>
	<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 mb-3">
		<div class="card h-100" style="width: 15rem;">
			<img class="card-img-top rounded" style="height:50%" src="<?= base_url('img/foto_produk/').$p->foto_produk ?>" alt="Card image cap">
			<div class="card-body">
				<h5 class="card-title text-center"><a href="#" class="text-dark" style="text-decoration:none"><?= $p->nama_produk ?></a></h5>
				<p class="card-text text-danger text-center">Rp. <?= number_format($p->harga_produk) ?></p>
			</div>
			<div class="card-footer bg-transparent d-flex justify-content-between">
				<a href="<?= base_url('produk/detail/').$p->id_produk ?>" class="btn btn-primary">Detail</a>
				<span class="text-muted">Stok : <?= ($p->stok_produk > 0) ? $p->stok_produk : "kosong" ?></span>
			</div>
		</div>
	</div>
	<?php endforeach ?>
</div>
