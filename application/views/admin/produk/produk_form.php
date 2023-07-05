<h2><?= ucfirst($page) ?> Produk</h2>

<form action="<?= base_url('admin/produk/proses') ?>" method="post" enctype="multipart/form-data">
	<input type="hidden" name="id_produk" value="<?= $produk->id_produk ?>">
	<div class=" form-group">
		<label>Nama</label>
		<input type="text" class="form-control" name="nama" value="<?= $produk->nama_produk ?>">
	</div>
	<div class="form-group">
		<label>Harga Jual (Rp) </label>
		<input type="number" class="form-control" name="harga" value="<?= $produk->harga_produk ?>">
	</div>
	<div class="form-group">
		<label>Harga Beli (Rp) </label>
		<input type="number" class="form-control" name="harga_beli" value="<?= $produk->harga_beli ?>">
	</div>
	<div class="form-group">
		<label>Berat (Gr) </label>
		<input type="number" class="form-control" name="berat" value="<?= $produk->berat_produk ?>">
	</div>
	<div class="form-group">
		<label>Deskripsi </label>
		<textarea class="form-control" name="deskripsi" rows="10"><?= $produk->deskripsi_produk ?></textarea>
	</div>
	<div class="form-group">
		<label>Stok Produk</label>
		<input type="number" class="form-control" name="stok" value="<?= $produk->stok_produk ?>">
	</div>
	<div class="form-group">
		<label>Foto </label>
		<input type="file" class="form-control" name="foto">
	</div>
	<button class="btn btn-primary" name="<?= $page ?>">Simpan</button>
</form>