<div id="printDiv">
	<h2>Detail Pembelian</h2>

	<strong><?php echo $pembelian->nama_pelanggan ?></strong> <br>

	<p>
		<?php echo $pembelian->telepon_pelanggan ?> <br>
		<?php echo $pembelian->email_pelanggan ?>

	</p>

	<p>
		Status :
		<span class="<?= in_array($pembelian->status_pembelian, ['Belum Bayar', 'dibatalkan']) ? 'text-danger' : 'text-primary' ?>">
			<?php echo ucfirst($pembelian->status_pembelian) ?>
		</span> <br>
		Tanggal : <?php echo $pembelian->tanggal_pembelian ?> <br>
		Ekspedisi : <?= $pembelian->ekspedisi ?> <br>
		Tujuan : <?php echo $pembelian->tujuan ?> <br>
		Resi : <?php echo $pembelian->resi ?>
	</p>

	<div class="container">
		<div class="row">
			<form action="<?= base_url('admin/pembelian/resi/' . $pembelian->id_pembelian) ?>" method="POST">
				<div class="form-group">
					<input type="text" name="resi" id="resi" placeholder="NO RESI">
					<button class="btn btn-primary">Simpan</button>
				</div>
			</form>
		</div>
	</div>

	<div class="row">
		<!-- cetak pembelian -->
		<button" target="_blank" onclick="printDiv('printDiv')" class="btn d-print-none ">
			<i class="fa fa-print me-sm-1"></i>
			Cetak
			</button>
	</div>

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
			<?php $nomor = 1;
			$total = 0;
			foreach ($produk as $p) :
			?>
				<tr>
					<td><?php echo $nomor; ?></td>
					<td><?php echo $p->nama_produk ?></td>
					<td>Rp. <?php echo number_format($p->harga_produk) ?></td>
					<td><?php echo $p->jumlah ?></td>
					<td>
						Rp. <?php echo number_format($p->harga_produk * $p->jumlah) ?>
					</td>
				</tr>
				<?php
				$nomor++;
				$total += ($p->harga_produk * $p->jumlah)
				?>
			<?php endforeach ?>
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

	<div class="row d-print-none">
		<div class="col-md-6">
			<?php if ($pembelian->status_pembelian == 'sudah kirim pembayaran') : ?>
				<a href="<?= base_url('admin/pembelian/kirim/' . $pembelian->id_pembelian) ?>" class="btn btn-primary" onclick="return confirm('Kirim Pesanan')">Kirim Barang</a>
			<?php endif ?>
			<?php if ($pembelian->status_pembelian == 'dikirim') : ?>
				<a href="<?= base_url('admin/pembelian/selesai/' . $pembelian->id_pembelian) ?>" class="btn btn-success" onclick="return confirm('Selesaikan Pesanan')">Selesaikan</a>
			<?php endif ?>
			<?php if ((!in_array($pembelian->status_pembelian, ['selesai', 'dibatalkan']))) : ?>
				<a href="<?= base_url('admin/pembelian/batalkan/' . $pembelian->id_pembelian) ?>" class="btn btn-danger" onclick="return confirm('Batalkan Pesanan')">Batalkan</a>
			<?php endif ?>

			<?php if ((!in_array($pembelian->status_pembelian, ['Belum Bayar', 'dibatalkan']))) : ?>
				<div class="col-md-7">
					<a href="<?= base_url() . 'img/bukti/' . $pembayaran[0]->bukti ?>" target="_blank" class="btn d-print-none ">
						<i class="fa fa-book me-sm-1"></i>
						Lihat Bukti Pembayaran
					</a>

				</div>
			<?php endif ?>
		</div>
	</div>
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