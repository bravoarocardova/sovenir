<h2>Detail Pembelian</h2>

<strong><?php echo $pembelian->nama_pelanggan ?></strong> <br>

<p>
	<?php echo $pembelian->telepon_pelanggan ?> <br>
	<?php echo $pembelian->email_pelanggan ?>

</p>

<p>
	Tangal : <?php echo $pembelian->tanggal_pembelian ?> <br>
	Total : Rp. <?php echo number_format($pembelian->total_pembelian) ?>
</p>


<table class="table table-bordered">
	<thead>
		<tr>
			<th>no</th>
			<th>nama</th>
			<th>harga</th>
			<th>jumlah</th>
			<th>subtotal</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; 
        foreach($produk as $p) : 
        ?>
		<tr>
			<td><?php echo $nomor; ?></td>
			<td><?php echo $p->nama_produk ?></td>
			<td>Rp. <?php echo number_format($p->harga_produk) ?></td>
			<td><?php echo $p->jumlah ?></td>
			<td>
				Rp. <?php echo number_format($p->harga_produk*$p->jumlah) ?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php endforeach ?>
	</tbody>
</table>
