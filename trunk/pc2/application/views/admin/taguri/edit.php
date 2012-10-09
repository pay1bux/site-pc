<div class="clearBoth"/>
<div class="admin">
    <br />
    <h3><a href="<?php echo site_url("pcadmin"); ?>">Intoarcere la Administrare</a></h3>
    <br />
    <h1>Adauga / Editeaza taguri</h1>
    <br />
    <?php
    $this->load->helper('form');

    echo form_fieldset('Adauga / Editeaza taguri');

    echo validation_errors();

    echo form_open(current_url());
    ?>
    <table>
        <tr>

            <td><?php echo form_label('Tip', 'tag[tip]');?> </td>
            <td><?php echo form_dropdown('tag[tip]', $tipuri_tag, (isset($form_values['tip_tag_id']) ? $form_values['tip_tag_id'] : '')); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Valoarea', 'tag[valoare]');?> </td>
            <td><?php echo form_input('tag[valoare]', (isset($form_values['valoare']) ? $form_values['valoare'] : '')); ?></td>
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