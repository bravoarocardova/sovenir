<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
        <!-- <a class="nav-link" id="address-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Detail Akun</a>
        <a class="nav-link" id="account-nav" data-toggle="pill" href="#update-account-tab" role="tab"><i class="fa fa-pencil-alt"></i>Edit Akun</a> -->
      </div>
    </div>
    <div class="col-md-9">
      <div class="tab-content">

        <div class="tab-pane fade active show card p-3" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
          <h4 class="card-header">Detail Akun</h4>
          <div class="row">
            <div class="col-md-6">
              <h5>Nama</h5>
              <p><?php echo $profile['nama_pelanggan']; ?></p>
              <h5>Alamat</h5>
              <p><?php echo $profile['alamat_pelanggan']; ?></p>
              <h5>No.Telp</h5>
              <p><?php echo $profile['telepon_pelanggan']; ?></p>
              <h5>Email</h5>
              <p><?php echo $profile['email_pelanggan']; ?></p>

            </div>

          </div>
        </div>
        <hr>
        <!-- pembayaran pesanan end -->

        <div class="tab-pane fade active show card p-3" id="update-account-tab" role="tabpanel" aria-labelledby="update-account-nav">
          <h3 class="card-header">Update Profile</h3>
          <h4>Account Details</h4>
          <form method="post" action="<?= base_url() ?>profile/update_profile">
            <div class="row">
              <div class="col-md-6">
                <input class="form-control" name="nama" type="text" placeholder="Name" value="<?php echo $profile['nama_pelanggan']; ?>">
              </div>
              <div class="col-md-6">
                <input class="form-control" name="no_telp" type="text" placeholder="Mobile" value="<?php echo $profile['telepon_pelanggan']; ?>">
              </div>
              <div class="col-md-6">
                <input class="form-control" name="email" type="text" placeholder="Email" value="<?php echo $profile['email_pelanggan']; ?>">
              </div>
              <div class="col-md-12">
                <button class="btn btn-success">Update Account</button>
                <br><br>
              </div>
            </div>
          </form>

          <h4>Alamat Details</h4>
          <form method="post" action="<?= base_url() ?>profile/update_alamat">
            <div class="row">
              <div class="col-md-6">
                <select required class="form-select " id="provinsi" name="provinsi">
                  <option value="">Pilih Provinsi</option>
                  <?php foreach ($provinsi as $p) : ?>
                    <option value="<?= $p->province_id ?>"><?= $p->province ?></option>
                  <?php endforeach ?>
                </select>

                <select required class="form-select" id="kabkot" name="kabkot">
                  <option value="">Pilih Kabupaten/Kota</option>
                </select>

                <input type="hidden" name="alamat_lengkap" id="alamat_lengkap">
                <textarea required class="form-control" placeholder="Alamat" name="alamat" id="alamat" id="floatingTextarea"></textarea>

              </div>
            </div>
            <div class="col-md-12">
              <button class="btn btn-success">Update Alamat</button>
              <br><br>
            </div>
          </form>

          <h4>Password change</h4>
          <form action="<?= base_url() ?>profile/update_paswword" method="post">
            <div class="row">
              <div class="col-md-12">
                <input class="form-control" name="pass" type="password" placeholder="Current Password">
              </div>
              <div class="col-md-6">
                <input class="form-control" name="pass1" type="text" placeholder="New Password">
              </div>
              <div class="col-md-6">
                <input class="form-control" name="pass2" type="text" placeholder="Confirm Password">
              </div>
              <div class="col-md-12">
                <button class="btn btn-success">Save Changes</button>
              </div>
            </div>
        </div>
        </form>

      </div>

    </div>
  </div>
</div>

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