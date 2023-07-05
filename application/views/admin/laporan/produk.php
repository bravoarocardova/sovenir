<h2>Laporan Barang <?php echo $tgl_mulai ?> Hingga <?php echo $tgl_selesai ?></h2>

<hr>

<form method="post">
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>" required>

			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>" required>

			</div>
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label><br>
			<button class="btn btn-primary" name="kirim">Lihat</button>
			<?php if (@$_POST) : ?>
				<a href="<?= base_url('admin/laporan/cetak_produk') ?>?tgl_mulai=<?php echo $tgl_mulai ?>&tgl_selesai=<?php echo $tgl_selesai ?>" target="_blank"><i class="fa fa-sm fa-print"></i></a>
			<?php endif ?>
		</div>

	</div>
</form>

<table class="table table-bordered">
	<br><br>
	<thead>
		<tr>
			<th>NO</th>
			<th>Barang</th>
			<th>Terjual</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php foreach ($semuadata as $value) : ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $value->nama_produk ?></td>
				<td><?php echo number_format($value->jumlah) ?></td>
			</tr>
			<?php $nomor++; ?>
		<?php endforeach ?>
	</tbody>

</table>