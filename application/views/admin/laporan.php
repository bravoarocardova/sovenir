<h2>Laporan Pemesanan <?php echo $tgl_mulai ?> Hingga <?php echo $tgl_selesai ?></h2>

<hr>

<form method="post">
	<div class="row">
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Mulai</label>
				<input type="date" class="form-control" name="tglm" value="<?php echo $tgl_mulai ?>">

			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label>Tanggal Selesai</label>
				<input type="date" class="form-control" name="tgls" value="<?php echo $tgl_selesai ?>">

			</div>
		</div>
		<div class="col-md-2">
			<label>&nbsp;</label><br>
			<button class="btn btn-primary" name="kirim">Lihat</button>
			<a href="<?= base_url('admin/laporan/cetak') ?>?tgl_mulai=<?php echo $tgl_mulai ?>&tgl_selesai=<?php echo $tgl_selesai ?>"
				target="_blank"><i class="fa fa-sm fa-print"></i></a>
		</div>

	</div>
</form>

<table class="table table-bordered">

	<br><br>
	<thead>
		<tr>
			<th>No</th>
			<th>Pelanggan</th>
			<th>Tanggal</th>
			<th>Subtotal</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $total =0; ?>
		<?php foreach ($semuadata as $value): ?>
		<?php $total+=$value->total_pembelian ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $value->nama_pelanggan ?></td>
			<td><?php echo $value->tanggal_pembelian ?></td>
			<td>Rp. <?php echo number_format($value->total_pembelian) ?></td>
			<td><?php echo $value->status_pembelian ?></td>
			<td></td>
		</tr>
		<?php $nomor++; ?>
		<?php endforeach ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="3">Total = </th>
			<th>Rp. <?php echo number_format($total) ?></th>
			<th></th>
		</tr>
	</tfoot>
</table>
