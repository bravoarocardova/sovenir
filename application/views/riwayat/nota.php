<h2>Detail Pembelian</h2>

<div class="row">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<p>
			Tangal : <?= $pembelian->tanggal_pembelian ?> <br>
			Total : Rp. <?= number_format($pembelian->total_pembelian) ; ?> (Sudah Termasuk Ongkir)
		</p>

		<!-- cetak pembelian -->
		<!-- <a href="cetak.php" target="_blank">CETAK</a>
-->
	</div>
	<div class="col-md-4">
		<h3>Pelanggan</h3>

		<strong><?= $pembelian->nama_pelanggan ?></strong> <br>
		<p>
			<?= $pembelian->telepon_pelanggan ?> <br>
			<?= $pembelian->email_pelanggan ?>
		</p>
	</div>


	<table class="table table-bordered">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Harga</th>
				<th>Jumlah</th>
				<th>Subtotal</th>
			</tr>
		</thead>
		<tbody>
			<?php 
            $nomor=1; 
            $total=0;
            foreach ($produk as  $p) : ?>

			<tr>
				<td><?= $nomor; ?></td>
				<td><?= $p->nama_produk ?></td>
				<td>Rp. <?= number_format($p->harga_produk) ?></td>
				<td><?= $p->jumlah ?></td>
				<td>
					Rp. <?= number_format($p->harga_produk * $p->jumlah); ?>
				</td>
			</tr>
			<?php 
            $nomor++;
            $total += ($p->harga_produk * $p->jumlah);
			endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">Total Belanja</th>
				<th>Rp. <?= number_format($total) ; ?></th>
			</tr>
		</tfoot>
	</table>

	<div class="row">
		<div class="col-md-7">
			<div class="alert alert-info">
				<p>Silakan melakukan pembayaran Rp. <?= number_format($pembelian->total_pembelian) ; ?> ke <br>
					<strong>BANK BRI 5717-0101-2038-534 AN. Luis Suryani</strong>

				</p>

			</div>
		</div>
	</div>
