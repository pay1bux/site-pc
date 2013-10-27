<div class="clearBoth"/>
<div class="admin">
    <br/>
    <a href="<?php echo site_url("pcadmin"); ?>" class="backadmin">
        <div id="backadmin">Administrare</div>
    </a>
    <br/>

    <h2>Adauga / Editeaza imagine promo</h2>
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
    <div class="row">
        <div class="form-group col-md-4">
            <?php echo form_label('Titlu', 'imaginePromo[titlu]'); ?>
            <?php echo form_input('imaginePromo[titlu]', (isset($form_values['titlu']) ? $form_values['titlu'] : ''), $input); ?>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <?php echo form_label('Link', 'imaginePromo[url]'); ?>
            <?php echo form_input('imaginePromo[url]', (isset($form_values['url']) ? $form_values['url'] : ''), $input); ?>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <?php echo form_label('Vizibil', 'imaginePromo[vizibil]'); ?>
                <?php $eveniment = array(
                    'name' => 'imaginePromo[vizibil]',
                    'value' => 'vizibil',
                    'checked' => (isset($form_values['vizibil']) && $form_values['vizibil'] == 1) ? TRUE : FALSE);
                ?>
                <?php echo form_checkbox($eveniment); ?>

        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <?php if (isset($form_values['thumb']) && $form_values['thumb'] != ''): ?>

               <img src="<?php echo BASE_URL . "/" . $form_values['thumb']; ?>"/>

            <?php endif; ?>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">
            <?php echo form_label('Afis', 'imaginePromo[afis]'); ?>
            <input type="file" name="userfile" size="20" class="btn btn-default"/>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-4">

            <?php
            echo form_submit('sumbit', 'Salveaza', $buton);
            echo form_close(); ?>

        </div>
    </div>

</div>