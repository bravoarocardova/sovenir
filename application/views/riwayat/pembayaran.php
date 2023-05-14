<h2>Konfirmasi Pembayaran</h2>
<p>kirim bukti pembayaran anda di sini</p>
<div class="alert alert-info">total tagihan anda <strong>Rp.
		<?php echo number_format($pembelian->total_pembelian) ?></strong></div>


<form method="post" enctype="multipart/form-data" action="<?= base_url('riwayat/proses_pembayaran') ?>">
<input type="hidden" name="id" value="<?= $pembelian->id_pembelian ?>">
	<div class="form-group">
		<label>Nama Penyetor</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label>Bank</label>
		<input type="text" class="form-control" name="bank">
	</div>
	<div class="form-group">
		<label>Jumlah</label>
		<input type="number" class="form-control" name="jumlah" min="<?= $pembelian->total_pembelian ?>">
	</div>
	<div class="form-group">
		<label>Foto Bukti</label>
		<input type="file" class="form-control" name="bukti">
		<p class="text-danger">foto harus JPG maksimal 2MB</p>
	</div>
	<button class="btn btn-primary" name="kirim">Kirim</button>
</form>
