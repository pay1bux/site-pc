<?php if (validation_errors()!=''): ?>
	<div class="errorMsg">
	    <div>
	         Eroare completare formular
	    </div>
	    <ol>
	        <?php echo validation_errors('<li>','</li>'); ?>
	    </ol>
	</div>
<?php endif; ?>
