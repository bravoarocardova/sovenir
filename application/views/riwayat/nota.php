<h2>Detail Pembelian</h2>

<div class="row" id="printDiv">
	<div class="col-md-4">
		<h3>Pembelian</h3>
		<p>
			Status :
			<span class="<?= in_array($pembelian->status_pembelian, ['Belum Bayar', 'dibatalkan']) ? 'text-danger' : 'text-primary' ?>">
				<?php echo ucfirst($pembelian->status_pembelian) ?>
			</span> <br>
			Tanggal : <?= $pembelian->tanggal_pembelian ?> <br>
			Ekspedisi : <?= $pembelian->ekspedisi ?> <br>
			Tujuan : <?= $pembelian->tujuan ?>
		</p>

		<!-- cetak pembelian -->
		<button" target="_blank" onclick="printDiv('printDiv')" class="btn d-print-none ">
			<i class="fa fa-print me-sm-1"></i>
			Cetak
			</button>

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
			$nomor = 1;
			$total = 0;
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
				<th>Rp. <?= number_format($total); ?></th>
			</tr>
			<tr>
				<th colspan="4">Ongkir</th>
				<th>Rp. <?= number_format($pembelian->ongkir); ?></th>
			</tr>
			<tr>
				<th colspan="4">
					<h5>Total</h5>
				</th>
				<th>
					<h5>Rp. <?= number_format($total + $pembelian->ongkir); ?></h5>
				</th>
			</tr>
		</tfoot>
	</table>

	<div class="row">
		<?php if ($pembelian->status_pembelian == 'Belum Bayar') : ?>
			<div class="col-md-7">
				<div class="alert alert-info">
					<p>Silakan melakukan pembayaran Rp. <?= number_format($pembelian->total_pembelian); ?> ke <br>
						<strong>BANK BRI 5717-0101-2038-534 AN. Luis Suryani</strong>

					</p>

				</div>
			</div>
		<?php endif ?>
		<?php if (!in_array($pembelian->status_pembelian, ['Belum Bayar', 'dibatalkan'])) : ?>
			<div class="col-md-7">
				<a href="<?= base_url() . 'img/bukti/' . $pembayaran[0]->bukti ?>" target="_blank" class="btn d-print-none ">
					<i class="fa fa-book me-sm-1"></i>
					Lihat Bukti Pembayaran
				</a>

			</div>
		<?php endif ?>
		<?php if ($pembelian->status_pembelian == 'dikirim') : ?>
			<div class="col-md-7">
				<a href="<?= base_url('riwayat/selesai/' . $pembelian->id_pembelian) ?>" class="btn btn-success" onclick="return confirm('Selesaikan Pesanan')">Selesaikan</a>
			</div>
		<?php endif ?>
	</div>

	<script>
		function printDiv(divName1) {
			var printContents1 = document.getElementById(divName1).innerHTML;

			var originalContents = document.body.innerHTML;

			document.body.innerHTML = printContents1;

			window.print();

			document.body.innerHTML = originalContents;
		}
	</script>