<form action="<?php echo current_url(); ?>" class="uniForm clearfix" id="formPostMessage" method="post" enctype="multipart/form-data">
    <fieldset class="blockLabels">
        <div class="hover-wrapper">
            <div class="ctrlHolder clearfix<?php if(form_error('item[name]')!='') echo ' error';?>">
            	<?php echo form_label('Nume<span class="required">*</span>', 'item_name', array('class'=>'big-label')); ?>
                <?php echo form_input(array('nume'=>'item[nume]', 'id'=>'item_nume', 'value'=>(isset($form_values['item']['nume'])?$form_values['item']['nume']:''), 'class'=>'textInput input', 'style'=>'width: 250px;')); ?>
            </div>
        </div>
                <div class="hover-wrapper">
            <div class="ctrlHolder clearfix<?php if(form_error('item[name]')!='') echo ' error';?>">
            	<?php echo form_label('Email<span class="required">*</span>', 'item_email', array('class'=>'big-label')); ?>
                <?php echo form_input(array('email'=>'item[email]', 'id'=>'item_email', 'value'=>(isset($form_values['item']['email'])?$form_values['item']['email']:''), 'class'=>'textInput input', 'style'=>'width: 250px;')); ?>
            </div>
        </div>
                   <div class="hover-wrapper">
            <div class="ctrlHolder clearfix<?php if(form_error('item[name]')!='') echo ' error';?>">
            	<?php echo form_label('Motiv<span class="required">*</span>', 'item_motiv', array('class'=>'big-label')); ?>
                <?php echo form_input(array('motiv'=>'item[motiv]', 'id'=>'item_motiv', 'value'=>(isset($form_values['item']['motiv'])?$form_values['item']['motiv']:''), 'class'=>'textInput input', 'style'=>'width: 250px;')); ?>
            </div>
        </div>

        <div class="buttonHolder">
            <button type="submit" class="submitButton">
                <span>Salveaza</span>
            </button>
        </div>
    </fieldset>
</form>			