<div class="clearBoth"/>
<div class="admin">
    <br />
    <a href="<?php echo site_url("pcadmin"); ?>" class="backadmin"> <div id="backadmin">Administrare</div></a>
    <br />
    <h1>Adauga / Editeaza user</h1>
    <br />
    <?php
    $this->load->helper('form');

    echo form_fieldset('Adauga / Editeaza user');

    if (isset($error)) {
        echo $error;
    }
    echo $this->session->flashdata('error');
    $textlung = 'class="textlung" ';

    echo form_open_multipart(current_url());
    ?>
    <table>
        <tr>
            <td><?php echo form_label('Nume', 'user[nume]');?> </td>
            <td><?php echo form_input('user[nume]', (isset($form_values['nume']) ? $form_values['nume'] : ''), $textlung); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Email', 'user[email]');?> </td>
            <td><?php echo form_input('user[email]', (isset($form_values['email']) ? $form_values['email'] : ''), $textlung); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Parola', 'user[parola]');?> </td>
            <td><?php echo form_password('user[parola]', '', $textlung); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Confirmare parola', 'user[parola2]');?> </td>
            <td><?php echo form_password('user[parola2]', '', $textlung); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Telefon', 'user[telefon]');?> </td>
            <td><?php echo form_input('user[telefon]', (isset($form_values['telefon']) ? $form_values['telefon'] : ''), $textlung); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Public', 'user[public]');?> </td>
            <td>
                <?php $public = array(
                'name'        => 'user[public]',
                'value'       => 'public',
                'checked'     => (isset($form_values['public']) && $form_values['public']==1) ? TRUE : FALSE);
                ?>
                <?php echo form_checkbox($public); ?>
            </td>
        </tr>
        <tr>
            <td colspan="2">Drepturi acordate:</td>
        </tr>
        <?php foreach($drepturi as $drept): ?>
        <tr>
            <td><?php echo form_label($drept['nume'], 'drepturi['.$drept['id'].']');?> </td>
            <td>
                <?php $drept = array(
                'name'        => 'drepturi['.$drept['id'].']',
                'value'       => $drept['id'],
                'checked'     => (isset($drepturiUser[$drept['id']])) ? TRUE : FALSE);
                ?>
                <?php echo form_checkbox($drept); ?>
            </td>
        </tr>
        <?php endforeach; ?>
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