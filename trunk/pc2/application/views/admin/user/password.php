
<br/>
<h1>Schimbare parola</h1>
<br/>
<?php
$this->load->helper('form');
$input = 'class = "form-control"';
$buton = 'class = "btn btn-default"';


if (isset($error)) {
    echo $error;
}
echo $this->session->flashdata('error');
$textlung = 'class="textlung" ';

echo form_open_multipart(current_url());
?>
<div class="row">
    <div class="form-group col-md-4">
        <td><?php echo form_label('Parola', 'user[parola]'); ?> </td>
        <td><?php echo form_password('user[parola]', '', $input); ?></td>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">
        <td><?php echo form_label('Confirmare parola', 'user[parola2]'); ?> </td>
        <td><?php echo form_password('user[parola2]', '', $input); ?></td>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-4">

        <?php

        echo form_submit('sumbit', 'Salveaza', $buton);
        echo form_close(); ?>
    </div>
</div>

