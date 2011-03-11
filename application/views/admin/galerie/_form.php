<form action="<?php echo current_url(); ?>" class="uniForm clearfix" id="formPostMessage" method="post" enctype="multipart/form-data">
    <fieldset class="blockLabels">
        <div class="hover-wrapper">
            <div class="ctrlHolder clearfix<?php if(form_error('item[id_category]')!='') echo ' error';?>">
            	<?php echo form_label('Categorie<span class="required">*</span>', 'item_id_category', array('class'=>'big-label')); ?>
            	<?php echo form_dropdown('item[id_category]', $categories_dropdown, (isset($form_values['item']['id_category'])?$form_values['item']['id_category']:''), 'id="item_id_category" class="selectInput" style="width: 180px;"'); ?>
            </div>
        </div>
        <div class="hover-wrapper">
        	<?php 
        	if (isset($form_values['item']['filename']))
        	{
        		echo render_image($form_values['item']['filename'], 'thumb');
        	}
        	?>
            <div class="ctrlHolder clearfix">
            	<?php echo form_label('Imagine', 'image', array('class'=>'big-label')); ?>
            	<input type="file" name="image">
            </div>
        </div>
        <div class="hover-wrapper">
            <div class="ctrlHolder clearfix<?php if(form_error('item[sort]')!='') echo ' error';?>">
            	<?php echo form_label('Ordine', 'item_sort', array('class'=>'big-label')); ?>
                <?php echo form_input(array('name'=>'item[sort]', 'id'=>'item_sort', 'value'=>(isset($form_values['item']['sort'])?$form_values['item']['sort']:''), 'class'=>'textInput input', 'style'=>'width: 100px;')); ?>
            </div>
        </div>
        <div class="buttonHolder">
            <button type="submit" class="submitButton">
                <span>Salveaza</span>
            </button>
        </div>
    </fieldset>
</form>			