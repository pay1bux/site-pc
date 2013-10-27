<div class="clearBoth"/>



    <h1>Adauga / Editeaza autori</h1>
    <br />
    <?php
    $this->load->helper('form');
    echo validation_errors();
    echo form_open(current_url());

    $input = 'class = "form-control"';
    $buton = 'class = "btn btn-default"';
    ?>
    <div class="row">

        <div class="form-group col-md-4">
            <?php echo form_label('Numele', 'autori[nume]');?>
            <?php echo form_input('autori[nume]', (isset($form_values['nume']) ? $form_values['nume'] : ''), $input); ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <?php
                echo form_submit('sumbit', 'Salveaza', $buton);
                echo form_close(); ?>
        </div>
    </div>
