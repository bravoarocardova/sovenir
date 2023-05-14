<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('template/_partial/head') ?>
</head>

<body>
    <?php $this->load->view('template/_partial/navbar') ?>
    
    <main class="mt-3">
        <div class="container">
            <?= $contents ?>
        </div>
    </main>

	<?php $this->load->view('template/_partial/js') ?>
</body>

</html>
