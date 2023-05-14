<div class="container-fluid">
  <div class="row">
    <div class="col-md-3">
      <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
        <a class="nav-link" id="address-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Detail Akun</a>
        <a class="nav-link" id="account-nav" data-toggle="pill" href="#update-account-tab" role="tab"><i class="fa fa-pencil-alt"></i>Edit Akun</a>
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
                <input class="form-control" name="alamat" type="text" placeholder="Address" value="<?php echo $profile['alamat_pelanggan']; ?>">
              </div>
              <div class="col-md-12">
                <button class="btn btn-success">Update Account</button>
                <br><br>
              </div>
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