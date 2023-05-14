<h1>Keranjang Belanja</h1>
<hr>
<table class=" table table-responsive">
	<thead>
		<tr>
			<th>No</th>
			<th>Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subharga</th>

		</tr>
	</thead>
	<tbody>
    <?php
        $nomor = 1; 
        $total = 0;
        foreach ($keranjang as $row): ?>
		<tr>
			<td><?= $nomor; ?></td>
			<td><?= $row['name'] ?></td>
			<td>Rp. <?=  number_format($row['price']); ?></td>
			<td><?= $row['qty'] ?></td>
			<td>Rp. <?= number_format($row['subtotal']); ?></td>
		</tr>
		<?php 
        $nomor++; 
		$total += $row['subtotal'];
        endforeach 
        ?>
	</tbody>
	<tfoot>
		<tr>
			<th colspan="4">Total Belanja</th>
			<th>Rp. <?php echo number_format($total) ?> </th>
		</tr>
	</tfoot>

</table>
<form method="post" action="<?= base_url('keranjang/proses_checkout') ?>">
<input type="hidden" name="id_pelanggan" value="<?= $pelanggan->id_pelanggan ?>">
<input type="hidden" name="total" value="<?= $total ?>">
	<div class="row">
		<div class="col-md-4">
			<div class="form-group">
				<input type="text" readonly value="<?= $pelanggan->nama_pelanggan ?>"
					class="form-control">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<input type="text" readonly value="<?= $pelanggan->telepon_pelanggan ?>"
					class="form-control">
			</div>
		</div>
		<div class="col-md-4">
			<select class="form-control" name="id_ongkir" required>
				<option value="">Pilih Ongkos Kirim</option>
                <?php foreach($ongkir as $row) : ?>
				<option name="id_ongkir" value=" <?= $row->id_ongkir ?>">
					<?= $row->nama_kota . ", Rp. " .number_format($row->tarif)?>
				</option>
				<?php endforeach ?>
			</select>
		</div>
	</div>
	<button onclick="return confirm('Checkout')" class="mt-4 btn btn-primary" name="checkout">Checkout</button>
</form>
