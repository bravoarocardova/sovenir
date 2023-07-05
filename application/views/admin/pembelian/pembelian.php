<h2>Data Pembelian</h2>

<table class="table table-bordered" id="dataTable">
	<thead>
		<tr>
			<th>NO</th>
			<th>NAMA PELANGGAN</th>
			<th>TANGGAL</th>
			<th>TOTAL</th>
			<th>STATUS</th>
			<th>RESI</th>
			<th>AKSI</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1;
		foreach ($pembelian as $p) :
		?>

			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $p->nama_pelanggan ?></td>
				<td><?php echo $p->tanggal_pembelian ?></td>
				<td>Rp. <?php echo number_format($p->total_pembelian) ?></td>
				<td>
					<span class="<?= in_array($p->status_pembelian, ['Belum Bayar', 'dibatalkan']) ? 'text-danger' : 'text-primary' ?>">
						<?php echo ucfirst($p->status_pembelian) ?>
					</span>
				</td>
				<td><?php echo $p->resi ?></td>
				<td>
					<a href="<?= base_url('admin/pembelian/detail/') . $p->id_pembelian ?>" class="btn btn-info">detail</a>
				</td>
			</tr>
			<?php $nomor++; ?>
		<?php endforeach ?>
	</tbody>
</table>