<h3>Riwayat Belanja</h3>
<strong>Nama : <?= $pelanggan->nama_pelanggan ?></strong> <br>

<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Tanggal</th>
		<th>Status</th>
		<th>Total</th>
		<th>Opsi</th>
	</tr>
	<tbody>
		<?php 
            $nomor=1;
			foreach($pembelian as $p) :
                ?>
		<tr>

			<td><?php echo $nomor; ?></td>
			<td><?php echo $p->tanggal_pembelian ?></td>
			<td><?php echo $p->status_pembelian ?></td>
			<td>Rp. <?php echo number_format($p->total_pembelian) ?></td>
			<td>
				<?php if($p->status_pembelian !== 'sudah kirim pembayaran') : ?>
				<a href="<?= base_url('riwayat/pembayaran/').$p->id_pembelian ?>" class="btn btn-success">Pembayaran</a>
				<?php endif ?>
                <a href="<?= base_url('riwayat/nota/').$p->id_pembelian ?>" class="btn btn-warning">Info</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php endforeach ?>
	</tbody>
</table>
