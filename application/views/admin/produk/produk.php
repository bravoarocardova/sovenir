<h2>Data Produk</h2>

<a href="<?= base_url('admin/produk/tambah') ?>" class="btn btn-primary">+ Tambah Data</a> <br><br>

<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama</th>
			<th>harga</th>
			<th>berat</th>
			<th>stok</th>
			<th>foto</th>
			
			<th>aksi</th>
		</tr>
	</thead>
<tbody>
	<?php $nomor=1; 
    foreach($produk as $p) : ?>
	<tr>
		<td><?php echo $nomor; ?></td>
		<td><?php echo $p->nama_produk ?></td>
		<td><?php echo $p->harga_produk ?></td>
		<td><?php echo $p->berat_produk ?></td>
		<td><?php echo $p->stok_produk ?></td>
		<td>
			<img src="<?= base_url('img/foto_produk/'). $p->foto_produk ?>" width="100">
		</td>
		<td>
			<a onclick="return confirm('Hapus ? ')" href="<?= base_url('admin/produk/hapus/'). $p->id_produk ?>" class="btn btn-danger">hapus</a>
			<a href="<?= base_url('admin/produk/edit/'). $p->id_produk ?>" class="btn btn-warning">ubah</a>
		</td>
	</tr>
	<?php $nomor++; ?>
	<?php endforeach ?>

</tbody>
</table>

