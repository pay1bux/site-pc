<div class="clearBoth"/>
<div class="admin">
    <br />
    <h3><a href="<?php echo site_url("pcadmin"); ?>">Intoarcere la Administrare</a></h3>
    <br />
    <h1>Schimbare parola</h1>
    <br />
    <?php
    $this->load->helper('form');

    echo form_fieldset('Schimbare parola');

    if (isset($error)) {
        echo $error;
    }
    echo $this->session->flashdata('error');
    $textlung = 'class="textlung" ';

    echo form_open_multipart(current_url());
    ?>
    <table>
        <tr>
            <td><?php echo form_label('Parola', 'user[parola]');?> </td>
            <td><?php echo form_password('user[parola]', '', $textlung); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Confirmare parola', 'user[parola2]');?> </td>
            <td><?php echo form_password('user[parola2]', '', $textlung); ?></td>
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