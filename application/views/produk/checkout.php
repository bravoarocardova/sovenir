<h1>Keranjang Belanja</h1>
<hr>
<table class=" table table-responsive">
	<thead>
		<tr>
			<th>No</th>
			<th>Produk</th>
			<th>Berat</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Subharga</th>

		</tr>
	</thead>
	<tbody>
		<?php
		$nomor = 1;
		$total = 0;
		$total_berat = 0;
		foreach ($keranjang as $row) : ?>
			<tr>
				<td><?= $nomor; ?></td>
				<td><?= $row['name'] ?></td>
				<td><?= $row['options']['berat'] ?> g</td>
				<td>Rp. <?= number_format($row['price']); ?></td>
				<td><?= $row['qty'] ?></td>
				<td>Rp. <?= number_format($row['subtotal']); ?></td>
			</tr>
		<?php
			$nomor++;
			$total += $row['subtotal'];
			$total_berat += $row['options']['berat'];
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
				<label class="form-label">Nama</label>
				<input type="text" readonly value="<?= $pelanggan->nama_pelanggan ?>" class="form-control">
			</div>
		</div>
		<div class="col-md-4">
			<div class="form-group">
				<label class="form-label">No Telp</label>
				<input type="text" readonly value="<?= $pelanggan->telepon_pelanggan ?>" class="form-control">
			</div>
		</div>
		<div class="col-md-4">
			<label class="form-label" for="alamat_lengkap">Alamat Lengkap</label>
			<textarea disabled class="form-control" id="alamat_lengkap" cols="30" rows="2"><?= $pelanggan->alamat_pelanggan ?></textarea>
		</div>
		<div class="col-md-4">
			<label for="kurir" class="form-label">Kurir</label>
			<select class="form-select" id="kurir" name="kurir">
				<option value="">Pilih Kurir</option>
				<option value="jne">JNE</option>
				<option value="pos">POS</option>
				<option value="tiki">TIKI</option>
			</select>
		</div>
		<div class="col-md-4">
			<label for="ongkir" class="form-label">Service</label>
			<select class="form-select" id="service" name="ongkir">
				<option value="">Pilih Service</option>
			</select>
		</div>
		<div class="col-md-4">

			<div class="row mt-4">

				<div class="mb-3">
					<p>Estimasi : <span id="estimasi"></span></p>
					<h5>Ongkir : Rp. <span id="ongkir"></span></h5>
				</div>

				<div class="mb-3">
					<div class="row">
						<div class="col-lg-6">
							<h5>Total Pembayaran :</h5>
						</div>
						<div class="col-lg-6">
							<h5> Rp. <span id="total_pembayaran"></span></h5>
						</div>
					</div>
				</div>
			</div>
			<input type="hidden" name="tujuan" id="tujuan" value="<?= $pelanggan->alamat_pelanggan ?>">
			<input type="hidden" name="ekspedisi" id="ekspedisi">
			<div class="row">
				<div class="d-flex justify-content-evenly">
					<button type="submit" onclick="return confirm('Checkout')" disabled class="btn btn-primary p-3"><i class="fa fa-shopping-cart opacity-10 me-2"></i> Checkout</button>
				</div>
			</div>
		</div>
	</div>
</form>

<script>
	$('document').ready(function() {
		let ongkir = 0;


		$('#kurir').on('change', function() {
			const kurir = $(this).val();
			$('#service').empty();
			$.ajax({
				url: "<?= base_url() . 'rajaongkir/getcost' ?>",
				type: "GET",
				data: {
					'origin': <?= Rajaongkirl::$origin ?>,
					'destination': <?= $pelanggan->id_kota ?>,
					'weight': <?= $total_berat ?>,
					'courier': kurir
				},
				dataType: 'json',
				success: function(data) {
					const result = data['rajaongkir']['results'][0]['costs'];
					$('#service').append($('<option>', {
						text: "Pilih Service"
					}));
					for (const res of result) {
						$('#service').append($('<option>', {
							value: res.cost[0].value,
							text: res.description + " (" + res.service + ")",
							etd: res.cost[0].etd
						}));
					}
				}
			})
		});

		$('#service').on('change', function() {
			const estimasi = $('option:selected', this).attr('etd');
			ongkir = parseInt($(this).val());
			$('#ongkir').html(numberWithCommas(ongkir));
			$('#estimasi').html(estimasi + " Hari");
			const total_pembayaran = <?= $total ?> + ongkir;
			$('#total_pembayaran').html(numberWithCommas(total_pembayaran));
			$('#ekspedisi').val($('option:selected', this).text());
			$("[type=submit]").prop('disabled', false);
		});

	});

	function numberWithCommas(x) {
		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
	}
</script>