<div class="clearBoth"/>
<div class="admin">
    <br />
    <a href="<?php echo site_url("pcadmin"); ?>" class="backadmin"> <div id="backadmin">Administrare</div></a>
    <br />
    <h1>Adauga / Editeaza autori</h1>
    <br />
    <?php
    $this->load->helper('form');

    echo form_fieldset('Adauga / Editeaza autori');

    echo validation_errors();
    echo form_open(current_url());
    ?>
    <table>
        <tr>
            <td><?php echo form_label('Numele', 'autori[nume]');?> </td>
            <td><?php echo form_input('autori[nume]', (isset($form_values['nume']) ? $form_values['nume'] : '')); ?></td>
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