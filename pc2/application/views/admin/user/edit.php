<div class="clearBoth"/>


<h2>Adauga / Editeaza user</h2>
<br/>
<?php
$this->load->helper('form');


if (isset($error)) {
    echo $error;
}
echo $this->session->flashdata('error');
$input = 'class = "form-control"';
$buton = 'class = "btn btn-default"';

echo form_open_multipart(current_url());
?>
<row>
    <div class="form-group col-md-6">
<div class="row">
    <div class="form-group col-md-8">
        <?php echo form_label('Nume', 'user[nume]'); ?>
        <?php echo form_input('user[nume]', (isset($form_values['nume']) ? $form_values['nume'] : ''), $input); ?>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-8">
        <?php echo form_label('Email', 'user[email]'); ?>
        <?php echo form_input('user[email]', (isset($form_values['email']) ? $form_values['email'] : ''), $input); ?>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-8">
        <?php echo form_label('Parola', 'user[parola]'); ?>
        <?php echo form_password('user[parola]', '', $input); ?>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-8">
        <?php echo form_label('Confirmare parola', 'user[parola2]'); ?>
        <?php echo form_password('user[parola2]', '', $input); ?>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-8">
        <?php echo form_label('Telefon', 'user[telefon]'); ?>
        <?php echo form_input('user[telefon]', (isset($form_values['telefon']) ? $form_values['telefon'] : ''), $input); ?>
    </div>
</div>
<div class="row">
    <div class="form-group col-md-8">
        <?php echo form_label('Public', 'user[public]'); ?>

            <?php $public = array(
                'name' => 'user[public]',
                'value' => 'public',
                'checked' => (isset($form_values['public']) && $form_values['public'] == 1) ? TRUE : FALSE);
            ?>
            <?php echo form_checkbox($public); ?>

    </div>
</div>
        <div class="row">
            <div class="form-group col-md-8">

                <?php
                echo form_submit('sumbit', 'Salveaza', $buton);
                echo form_close(); ?>

            </div>
        </div>

        </div>
    <div class="form-group col-md-6">
<div class="row">
    <div class="form-group col-md-8">
        Drepturi acordate:
    </div>
</div>
<?php foreach ($drepturi as $drept): ?>
    <div class="row">
        <div class="form-group col-md-8">
            <?php echo form_label($drept['nume'], 'drepturi[' . $drept['id'] . ']'); ?>

                <?php $drept = array(
                    'name' => 'drepturi[' . $drept['id'] . ']',
                    'value' => $drept['id'],
                    'checked' => (isset($drepturiUser[$drept['id']])) ? TRUE : FALSE);
                ?>
                <?php echo form_checkbox($drept); ?>

        </div>
    </div>
<?php endforeach; ?>


</row>
</div>

<div class="clearBoth"/>