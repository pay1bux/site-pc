<div class="clearBoth"/>


    <h1>Adauga / Editeaza devotional</h1>
    <br />
    <?php
    $this->load->helper('form');


    if (isset($error)) {
        echo $error;
    }
    $input = 'class = "form-control"';
    $buton = 'class = "btn btn-default"';
    $select = 'class="selectFormPicker"';

    echo form_open_multipart(current_url());
    ?>
    <div class="row">
        <div class="form-group col-md-4">
            <td><?php echo form_label('Titlu', 'devotional[titlu]');?> </td>
            <td><?php echo form_input('devotional[titlu]', (isset($form_values['titlu']) ? $form_values['titlu'] : ''), $input); ?></td>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <td><?php echo form_label('Textul', 'devotional[continut]');?></td>
            <td><?php echo form_textarea('devotional[continut]', (isset($form_values['continut']) ? $form_values['continut'] : ''), $input); ?> </td>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <td><?php echo form_label('Data', 'devotional[data]');?> </td>
            <?php $data = array(
                    'name'        => 'devotional[data]',
                    'value'       => isset($form_values['data']) ? $form_values['data'] : '',
                'class' => "datepicker form-group");
            ?>
            <td><?php echo form_input($data); ?></td>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <td><?php echo form_label('Autor', 'devotional[autor_id]');  ?></td>
            <td><?php echo form_dropdown('devotional[autor_id]', $autori, (isset($form_values['autor_id']) ? $form_values['autor_id'] : ''), $select); ?></td>
        </div>
    </div>





    <div class="row">
        <div class="form-group col-md-4">
        <?php if (isset($form_values['thumb']) && $form_values['thumb'] != ''): ?>
            <tr>
                <td colspan="2"><img src="<?php echo BASE_URL . "/" . $form_values['thumb']; ?>" /> </td>
            </tr>
        <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <td><?php echo form_label('Imagine', 'devotional[afis]');?> </td>
            <td><input type="file" name="userfile" size="20" class=" btn btn-default"/></td>
        </div>
    </div>




    <div class="row">
        <div class="form-group col-md-4">

                <?php
                echo form_fieldset_close();
                echo form_submit('sumbit', 'Salveaza', $buton);
                echo form_close(); ?>
        </div>
    </div>

