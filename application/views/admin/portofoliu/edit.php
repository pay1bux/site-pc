<!-- RIGHT -->
<div id="right">
    <!-- Side Menu -->
    <div id="sidemenu">
    </div>
</div>
<div id="left">
    <!-- Content -->
    <div id="content">
        <h1>Editeaza Lucrare <span>/ <?php echo $item['name']; ?></span></h1>
        <p class="path">
        </p>
        <?php $this->load->view('admin/includes/_form_errors.php'); ?>
		<?php $this->load->view('admin/portofoliu/_form.php'); ?>
    </div>
</div>