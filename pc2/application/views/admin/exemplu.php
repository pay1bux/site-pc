<!-- RIGHT -->
<div id="right">
    <!-- Side Menu -->
    <div id="sidemenu">
    </div>
</div>
<div id="left">
    <!-- Content -->
    <div id="content">
        <h1>Adauga noutate</h1>
        <p class="path">
        </p>
        <?php $this->load->view('admin/includes/_form_errors.php'); ?>
		<?php $this->load->view('admin/news/_form.php'); ?>
    </div>
</div>


    <?php if (validation_errors()!='' || isset($errors)): ?>
	<div class="errorMsg">
	    <div>
	        Eroare completare formular
	    </div>
	    <ol>
	    <?php
	    	if(validation_errors()!='')
	    	{
	        	echo validation_errors('<li>','</li>');
	    	}
	    	if (isset($errors))
	    	{
	    		if (is_array($errors))
	    		{
		    		foreach ($errors as $error)
		    		{
		    			echo '<li>'.$error.'</li>';
		    		}
	    		}
	    		else echo $errors;
	    	}
	    ?>
	     </ol>

	</div>
<?php endif; ?>


    <form action="<?php echo current_url(); ?>" class="uniForm clearfix" id="formPostMessage" method="post" enctype="multipart/form-data">
    <fieldset class="blockLabels">
        <div class="hover-wrapper">
            <div class="ctrlHolder clearfix<?php if(form_error('news[title]')!='') echo ' error';?>">
            	<?php echo form_label('Titlu<span class="required">*</span>', 'news_title', array('class'=>'big-label')); ?>
                <?php echo form_input(array('name'=>'news[title]', 'id'=>'news_title', 'value'=>(isset($form_values['news']['title'])?$form_values['news']['title']:''), 'class'=>'textInput input', 'style'=>'width: 250px;')); ?>
            </div>
        </div>

        <div class="hover-wrapper">
			<div class="ctrlHolder clearfix<?php if(form_error('news[content]')!='') echo ' error';?>">
				<?php
					echo form_label('Continut<span class="required">*</span>', 'news_content', array('class'=>'big-label'));
					echo form_textarea(array('name'=>'news[content]', 'id'=>'news_content', 'value'=>(isset($form_values['news']['content'])?$form_values['news']['content']:''), 'class'=>'textarea input', 'style'=>'width: 500px; height: 300px;'));
				?>
			</div>
		</div>

        <div class="hover-wrapper">
	        <div class="ctrlHolder clearfix">
	            <div class="checkbox-wrapper">
	            	<?php
	            		$checked = (isset($form_values['news']['visible']) && $form_values['news']['visible'] == 1 ? TRUE : FALSE);
	            		echo form_checkbox(array('name'=>'news[visible]', 'id'=>'news_visible', 'checked' => $checked, 'value' => '1'));
	               		echo form_label('&nbsp;Vizibila', 'news_visible', array('class'=>'checkbox-label'));
	            	?>
	            </div>
	        </div>
        </div>

        <div class="hover-wrapper">
	        <div class="ctrlHolder clearfix">
	            <div class="checkbox-wrapper">
	            	<?php
	            		$checked = (isset($form_values['news']['homepage']) && $form_values['news']['homepage'] == 1 ? TRUE : FALSE);
	            		echo form_checkbox(array('name'=>'news[homepage]', 'id'=>'news_homepage', 'checked' => $checked, 'value' => '1'));
	               		echo form_label('&nbsp;Afisare pe prima pagina', 'news_homepage', array('class'=>'checkbox-label'));
	            	?>
	            </div>
	        </div>
        </div>

        <div class="hover-wrapper">
            <div class="ctrlHolder clearfix<?php if(form_error('news[sort]')!='') echo ' error';?>">
            	<?php echo form_label('Ordine<span class="required">*</span>', 'news_sort', array('class'=>'big-label')); ?>
                <?php echo form_input(array('name'=>'news[sort]', 'id'=>'news_sort', 'value'=>(isset($form_values['news']['sort'])?$form_values['news']['sort']:''), 'class'=>'textInput input', 'style'=>'width: 80px;')); ?>
            </div>
        </div>

        <div class="hover-wrapper">
			<?php
				if (isset($form_values['news']['image']))
				{
					echo render_news_photo($form_values['news']['image'], 'thumb', array('alt' => ''));
				}
			?>
			<div class="ctrlHolder clearfix <?php if(form_error('image')!='') echo ' error';?>" >
				<?php echo form_label('Imagine', 'image', array('class'=>'label')); ?>
				<?php echo form_upload(array('name'=>'image', 'id'=>'image')); ?>
			</div>
			<br />
		</div>

        <div class="buttonHolder">
            <button type="submit" class="submitButton">
                <span>Salveaza</span>
            </button>
        </div>
    </fieldset>
</form>