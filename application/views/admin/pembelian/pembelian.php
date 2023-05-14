<h2>Data Pembelian</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelanggan</th>
			<th>Tanggal</th>
			<th>Total</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; 
        foreach($pembelian as $p) :
        ?>

	<tr>
		<td><?php echo $nomor; ?></td>
		<td><?php echo $p->nama_pelanggan ?></td>
		<td><?php echo $p->tanggal_pembelian ?></td>
		<td>Rp. <?php echo number_format($p->total_pembelian) ?></td>
		<td>
			<a href="<?= base_url('admin/pembelian/detail/'). $p->id_pembelian ?>" class="btn btn-info">detail</a>
		</td>
	</tr>
	<?php $nomor++; ?>
	<?php endforeach ?>
</tbody>
</table>
