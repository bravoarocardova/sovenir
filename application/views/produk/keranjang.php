<h1>Keranjang Belanja</h1>
<hr>
<table class="table table-responsive">
	<thead>
		<tr>
			<th>No</th>
			<th>Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subharga</th>
			<th>Aksi</th>
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
			<td>
				<div class="w-25 d-flex">
					<span class="qty-minus d-flex align-items-center me-2"><i class="fa fa-minus"></i></span>
					<input type="number" class="form-control text-center" value="<?= $row['qty']; ?>" name="qty">
					<span class="qty-plus d-flex align-items-center ms-2"><i class="fa fa-plus"></i></span>
				</div>
			</td>
			<td>Rp. <?= number_format($row['subtotal']); ?></td>
			<td>
				<a onclick="return confirm('Hapus <?= $row['name'] ?> dari keranjang ?')" href="<?= base_url('keranjang/hapus/'). $row['rowid'] ?>" class="btn btn-danger btn-xs">Hapus</a>
			</td>
		</tr>
		<?php 
        $nomor++; 
		$total +=$row['subtotal'];
        endforeach 
        ?>
	</tbody>
    <tfooter>
        <td colspan="4">Total</td>
        <td>Rp. <?= number_format($total) ?></td>
        <td></td>
    </tfooter>
</table>
<a href="<?= base_url('produk') ?>" class="btn btn-defaul">Lanjutkan Belanja</a>
<a href="<?= base_url('keranjang/checkout') ?>" class="btn btn-primary">Checkout</a>
</div>
