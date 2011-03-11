<?php if ($this->session->flashdata('success') != FALSE): ?>
	<div class="successMsg">
	    <div>
	        <?php echo $this->session->flashdata('success'); ?>
	    </div>
	</div>
<?php endif; ?>

<?php if ($this->session->flashdata('error') != FALSE): ?>
	<div class="errorMsg">
	    <div>
	        <?php echo $this->session->flashdata('error'); ?>
	    </div>
	</div>
<?php endif; ?>

<?php if ($this->session->flashdata('warning') != FALSE): ?>
	<div class="warningMsg">
	    <div>
	        <?php echo $this->session->flashdata('warning'); ?>
	    </div>
	</div>
<?php endif; ?>
