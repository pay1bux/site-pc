<script>
    $(function() {
        $( "#datepicker" ).datepicker( {dateFormat: "yy-mm-dd",  showOn: "both" });
    });
</script>
<div class="clearBoth"/>
<div class="admin">
    <br />
    <a href="<?php echo site_url("pcadmin"); ?>" class="backadmin"> <div id="backadmin">Administrare</div></a>
    <br />
    <h1>Adauga / Editeaza buletin</h1>
    <br />
    <?php

    $this->load->helper('form');

    if (isset($error)) {
        echo $error;
    }
    $textlung = 'class="textlung" ';
    $camp = 'class="camp_general"  ';
    $lebal = array(
        'class' => 'label_general',
        'style' => 'color: #000;',
    );


    echo form_open_multipart(current_url());
    ?>
    <table id="administrator">
        <tr>
            <td><?php echo form_label('Titlu', 'buletin[titlu]', $lebal);?> </td>

                <td><?php echo form_input('buletin[titlu]', (isset($form_values['titlu']) ? $form_values['titlu'] : ''), $camp); ?></td>

        </tr>
        <tr>
            <td><?php echo form_label('Data', 'buletin[data]', $lebal);?> </td>
            <?php $data = array(
            'name'        => 'buletin[data]',
            'value'       => isset($form_values['data']) ? $form_values['data'] : '',
            'id'     => "datepicker");
            ?>
            <td><?php echo form_input($data,'',  $camp); ?></td>
        </tr>
        <?php if (isset($form_values['thumb']) && $form_values['thumb'] != ''): ?>
        <tr>
            <td colspan="2"><img src="<?php echo BASE_URL . "/" . $form_values['thumb']; ?>" /> </td>
        </tr>
        <?php endif; ?>
        <tr>
            <td><?php echo form_label('Fisier', 'buletin[fisier]', $lebal);?> </td>
            <td><input type="file" name="userfile" size="20" class="input_file" /></td>
        </tr>
        <tr>
            <td colspan="2">
                <?php
                echo form_fieldset_close();
                $submit = Array ("name" => "submit", "value" => "Salveaza", "class" => "salveaza");
                echo form_submit($submit);
                echo form_close(); ?>
            </td>
        </tr>

    </table>
</div>