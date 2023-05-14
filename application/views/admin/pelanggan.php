<h2>Data Pelanggan</h2>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama</th>
			<th>email</th>
			<th>telepon</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1;
        foreach($pelanggan as $p) : ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $p->nama_pelanggan ?></td>
				<td><?php echo $p->email_pelanggan ?></td>
				<td><?php echo $p->telepon_pelanggan ?></td>
				<td>
					<a onclick="return confirm('hapus ?')" href="<?= base_url('admin/pelanggan/hapus/').$p->id_pelanggan ?>" class="btn btn-danger">hapus</a>
				</td>
			</tr>
			<?php $nomor++; ?>
		<?php endforeach ?>
		</tbody>	
</table>