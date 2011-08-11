<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<?php $this->load->view('frontend/includes/head_includes'); ?>
	</head>

	<body>
		<!-- Header -->
		<?php $this->load->view('frontend/includes/header'); ?>

		<!-- Content -->
		<?php $this->load->view($main_content); ?>
        <?php //$this->load->view('frontend/includes/right_side'); ?>

		<!-- Footer -->
		<?php $this->load->view('frontend/includes/footer'); ?>
		
	</body>
</html>
