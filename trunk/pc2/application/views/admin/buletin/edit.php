<div class="clearBoth"/>
<div class="admin">
    <?php
    $this->load->helper('form');

    echo form_fieldset('Adauga / Editeaza buletin');

    if (isset($error)) {
        echo $error;
    }
    $textlung = 'class="textlung" ';

    echo form_open_multipart(current_url());
    ?>
    <table>
        <tr>
            <td><?php echo form_label('Titlu', 'buletin[titlu]');?> </td>
            <td><?php echo form_input('buletin[titlu]', (isset($form_values['titlu']) ? $form_values['titlu'] : ''), $textlung); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Data', 'buletin[data]');?> </td>
            <td><?php echo form_input('buletin[data]', (isset($form_values['titlu']) ? $form_values['data'] : '')); ?></td>
        </tr>
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