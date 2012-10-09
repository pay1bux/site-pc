<div class="clearBoth"/>
<div class="admin">
    <br />
    <h3><a href="<?php echo site_url("administrator"); ?>">Intoarcere la Administrare</a></h3>
    <br />
    <h1>Adauga / Editeaza imagine promo</h1>
    <br />
    <?php
    $this->load->helper('form');

    echo form_fieldset('Adauga / Editeaza imagine promo');

    if (isset($error)) {
        echo $error;
    }
    echo $this->session->flashdata('error');
    $textlung = 'class="textlung" ';

    echo form_open_multipart(current_url());
    ?>
    <table>
        <tr>
            <td><?php echo form_label('Titlu', 'imaginePromo[titlu]');?> </td>
            <td><?php echo form_input('imaginePromo[titlu]', (isset($form_values['titlu']) ? $form_values['titlu'] : ''), $textlung); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Vizibil', 'imaginePromo[vizibil]');?> </td>
            <td>
                <?php $eveniment = array(
                'name'        => 'imaginePromo[vizibil]',
                'value'       => 'vizibil',
                'checked'     => (isset($form_values['vizibil']) && $form_values['vizibil']==1) ? TRUE : FALSE);
                ?>
                <?php echo form_checkbox($eveniment); ?>
            </td>
        </tr>
        <?php if (isset($form_values['thumb']) && $form_values['thumb'] != ''): ?>
            <tr>
                <td colspan="2"><img src="<?php echo BASE_URL . "/" . $form_values['thumb']; ?>" /> </td>
            </tr>
        <?php endif; ?>
        <tr>
            <td><?php echo form_label('Afis', 'imaginePromo[afis]');?> </td>
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