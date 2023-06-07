<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.min.css') ?>">
<!-- FontAwesome CSS -->
<link rel="stylesheet" href="<?= base_url('assets/fontawesome/css/all.css') ?>">
<script src="<?= base_url('assets/js/jquery.js') ?>"></script>

<title>Souvenir Fiqih <?php //if (!empty($this->uri->segment(1))) echo ":" . ucfirst($this->uri->segment(1)) . " - " . ucfirst($this->uri->segment(2)) 
                      ?></title>

<style>
  /* Chrome, Safari, Edge, Opera */
  input::-webkit-outer-spin-button,
  input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }

  /* Firefox */
  input[type=number] {
    -moz-appearance: textfield;
  }
</style>