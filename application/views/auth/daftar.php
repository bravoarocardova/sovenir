<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('template/_partial/head') ?>
</head>

<body>

  <main>
    <div class="d-flex justify-content-center">
      <div class="d-flex align-items-center">
        <div class="card" style="width: 18rem;">
          <div class="card-header text-center bg-dark text-light fw-bolder">
            <h2>Daftar</h2>
          </div>
          <div class="card-body">
            <form action="<?= base_url('auth/proses') ?>" method="POST">
              <div class="form-floating mb-3">
                <input required type="text" class="form-control" name="nama" id="fINama" placeholder="Nama">
                <label for="fINama">Nama</label>
              </div>
              <div class="form-floating mb-3">
                <input required type="email" class="form-control" name="email" id="fIEmail" placeholder="name@example.com">
                <label for="fIEmail">Email address</label>
              </div>
              <div class="form-floating mb-3">
                <input required type="password" class="form-control" name="password" id="fIPassword" placeholder="Password">
                <label for="fIPassword">Password</label>
              </div>
              <div class="form-floating mb-3">
                <select required class="form-select " id="provinsi" name="provinsi">
                  <option value="">Pilih Provinsi</option>
                  <?php foreach ($provinsi as $p) : ?>
                    <option value="<?= $p->province_id ?>"><?= $p->province ?></option>
                  <?php endforeach ?>
                </select>
                <label for="provinsi">Provinsi</label>
              </div>
              <div class="form-floating mb-3">
                <select required class="form-select" id="kabkot" name="kabkot">
                  <option value="">Pilih Kabupaten/Kota</option>
                </select>
                <label for="kabkot">Kabupaten/Kota</label>
              </div>
              <div class="form-floating mb-3">
                <input type="hidden" name="alamat_lengkap" id="alamat_lengkap">
                <textarea required class="form-control" placeholder="Alamat" name="alamat" id="alamat" id="floatingTextarea"></textarea>
                <label for="floatingTextarea">Alamat</label>
              </div>
              <div class="form-floating mb-3">
                <input required type="text" class="form-control" name="telepon" id="fITelepon" placeholder="Telepon">
                <label for="fITelepon">Telepon</label>
              </div>
              <div class="d-grid">
                <button type="submit" name="daftar" class="btn btn-primary">DAFTAR</button>
              </div>
            </form>
            <p class="text-muted mt-5">Sudah punya akun? <a href="<?= base_url('auth/login') ?>">Login</a>
            </p>
          </div>
        </div>
      </div>

    </div>

  </main>

  <?php $this->load->view('template/_partial/js') ?>
  <script>
    $('document').ready(function() {
      let ongkir = 0;

      $('#provinsi').on('change', function() {
        $('#kabkot').empty();
        const province_id = $(this).val();
        console.log("<?= base_url() . 'rajaongkir/getcity' ?>");
        $.ajax({
          url: "<?= base_url() . 'rajaongkir/getcity' ?>",
          type: "GET",
          data: {
            'province_id': province_id
          },
          dataType: 'json',
          success: function(data) {
            const result = data['rajaongkir']['results'];
            $('#kabkot').append($('<option>', {
              text: "Pilih Kabupaten/Kota"
            }));
            $('#service').append($('<option>', {
              text: "Pilih Service"
            }));
            for (const res of result) {
              $('#kabkot').append($('<option>', {
                value: res.city_id,
                text: res.city_name
              }));
            }
          }
        });
      });


      $('#alamat').on('change', function() {
        var provinsi = $('#provinsi option:selected').text();
        var kabkot = $('#kabkot option:selected').text();
        var alamat = $(this).val();
        $("[type=submit]").prop('disabled', false);
        var alamat_pelanggan = `${alamat}, ${kabkot}, ${provinsi}`;
        $('#alamat_lengkap').val(alamat_pelanggan);
      });

    });
  </script>
</body>

</html>