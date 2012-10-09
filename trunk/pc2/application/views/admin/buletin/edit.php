<script>
    $(function() {
        $( "#datepicker" ).datepicker( {dateFormat: "yy-mm-dd",  showOn: "both" });
    });
</script>
<div class="clearBoth"/>
<div class="admin">
    <br />
    <h3><a href="<?php echo site_url("administrator"); ?>">Intoarcere la Administrare</a></h3>
    <br />
    <h1>Adauga / Editeaza buletin</h1>
    <br />
    <?php

    $this->load->helper('form');

    echo form_fieldset('Adauga / Editeaza buletin');

    if (isset($error)) {
        echo $error;
    }
    $textlung = 'class="textlung" ';
    $campul = 'class="camp_general"  ';

    echo form_open_multipart(current_url());
    ?>
    <table>
        <tr>
            <td><?php echo form_label('Titlu', 'buletin[titlu]');?> </td>

                <td><?php echo form_input('buletin[titlu]', (isset($form_values['titlu']) ? $form_values['titlu'] : 'dsa'), $campul); ?></td>

        </tr>
        <tr>
            <td><?php echo form_label('Data', 'buletin[data]');?> </td>
            <?php $data = array(
            'name'        => 'buletin[data]',
            'value'       => isset($form_values['data']) ? $form_values['data'] : '',
            'id'     => "datepicker");
            ?>
            <td><?php echo form_input($data,'',  $campul); ?></td>
        </tr>
        <?php if (isset($form_values['thumb']) && $form_values['thumb'] != ''): ?>
        <tr>
            <td colspan="2"><img src="<?php echo BASE_URL . "/" . $form_values['thumb']; ?>" /> </td>
        </tr>
        <?php endif; ?>
        <tr>
            <td><?php echo form_label('Fisier', 'buletin[fisier]');?> </td>
            <td><input type="file" name="userfile" size="20" /></td>
        </tr>
        <tr>
            <td colspan="2">
                <?php
                echo form_fieldset_close();
                echo form_submit('sumbit', 'Salveaza');
                echo form_close(); ?>
            </td>
        </tr>

    </table>
</div>