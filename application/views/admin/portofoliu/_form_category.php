<form action="<?php echo current_url(); ?>" class="uniForm clearfix" id="formPostMessage" method="post" enctype="multipart/form-data">
    <fieldset class="blockLabels">
        <div class="hover-wrapper">
            <div class="ctrlHolder clearfix<?php if(form_error('category[name]')!='') echo ' error';?>">
            	<?php echo form_label('Nume<span class="required">*</span>', 'category_name', array('class'=>'big-label')); ?>
                <?php echo form_input(array('name'=>'category[name]', 'id'=>'category_name', 'value'=>(isset($form_values['category']['name'])?$form_values['category']['name']:''), 'class'=>'textInput input', 'style'=>'width: 250px;')); ?>
            </div>
        </div>
        <div class="hover-wrapper">
            <div class="ctrlHolder clearfix<?php if(form_error('category[sort]')!='') echo ' error';?>">
            	<?php echo form_label('Ordine', 'category_sort', array('class'=>'big-label')); ?>
                <?php echo form_input(array('name'=>'category[sort]', 'id'=>'category_sort', 'value'=>(isset($form_values['category']['sort'])?$form_values['category']['sort']:''), 'class'=>'textInput input', 'style'=>'width: 100px;')); ?>
            </div>
        </div>
        <div class="buttonHolder">
            <button type="submit" class="submitButton">
                <span>Salveaza</span>
            </button>
        </div>
    </fieldset>
</form>