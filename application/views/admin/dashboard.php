<div class="row">
  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="mt" style="border:2px black solid; padding:10px;">
      <div class="small-box">
        <div class="">
          <h3><?php echo count($produk); ?></h3>

          <p>Total Produk</p>
        </div>
        <a href="<?= base_url('admin/produk') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="mt" style="border:2px black solid; padding:10px;">
      <div class="small-box">
        <div class="">
          <h3><?php echo count($pembelian); ?></h3>

          <p>Total Pembelian</p>
        </div>
        <a href="<?= base_url('admin/pembelian') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="mt" style="border:2px black solid; padding:10px;">
      <div class="small-box">
        <div class="">
          <h3><?php echo count($pelanggan); ?></h3>

          <p>Total Pelanggan</p>
        </div>
        <a href="<?= base_url('admin/pelanggan') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="mt" style="border:2px black solid; padding:10px;">
      <div class="small-box">
        <div class="">
          <h3><?php echo $terjual[0]->jumlah ?? 0; ?></h3>

          <p>Total Terjual</p>
        </div>
        <a href="<?= base_url('admin/laporan/produk') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-xs-6">
    <!-- small box -->
    <div class="mt" style="border:2px black solid; padding:10px;">
      <div class="small-box">
        <div class="">
          <h3>Rp. <?php echo number_format($total_pendapatan ?? 0); ?></h3>

          <p>Total Pendapatan</p>
        </div>
        <!-- <a href="<?= base_url('admin/laporan/produk') ?>" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a> -->
      </div>
    </div>
  </div>
</div>