<div class="clearBoth"/>

    <h2>Adauga / Editeaza buletin</h2>
    <br />
    <?php

    $this->load->helper('form');

    if (isset($error)) {
        echo $error;
    }
    $input = 'class = "form-control"';
    $buton = 'class = "btn btn-default"';


    echo form_open_multipart(current_url());
    ?>
    <div class="row">
        <div class="form-group col-md-4">
            <?php echo form_label('Titlu', 'buletin[titlu]');?>
                <?php echo form_input('buletin[titlu]', (isset($form_values['titlu']) ? $form_values['titlu'] : ''), $input); ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <?php echo form_label('Data', 'buletin[data]');?>
            <?php $data = array(
            'name'        => 'buletin[data]',
            'value'       => isset($form_values['data']) ? $form_values['data'] : '',
            'class' => "datepicker form-group");
            ?>
            <?php echo form_input($data,'',  $input); ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
        <?php if (isset($form_values['thumb']) && $form_values['thumb'] != ''): ?>

            <img src="<?php echo BASE_URL . "/" . $form_values['thumb']; ?>" />

        <?php endif; ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <?php echo form_label('Fisier', 'buletin[fisier]');?>
            <input type="file" name="userfile" size="20" class="input_file btn btn-default" />
        </div>
    </div>


    <div class="row">
        <div class="form-group col-md-4">
                <?php
                echo form_fieldset_close();
                $submit = Array ("name" => "submit", "value" => "Salveaza", "class" => "btn btn-default");
                echo form_submit($submit);
                echo form_close(); ?>
        </div>
    </div>
