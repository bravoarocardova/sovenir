<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('template_admin/_partial/head') ?>
</head>

<body>
	<?php $this->load->view('template_admin/_partial/menu') ?>

	<section id="main-content">
		<section class="wrapper">
			<?= $contents ?>
		</section>
	</section>

	<?php $this->load->view('template_admin/_partial/js') ?>
</body>

</html>
