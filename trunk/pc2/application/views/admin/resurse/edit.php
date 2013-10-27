
<div class="clearBoth"/>

    <h1>Adauga / Editeaza resursa</h1>
    <br/>
    <?php
    $select = 'class="selectFormPicker"';
    $input = 'class = "form-control"';
    $buton = 'class = "btn btn-default"';
    $this->load->helper('form');


    echo validation_errors();
    echo form_open(current_url());
    ?>

    <div class="row">

        <div class="form-group col-md-4 ">
            <?php echo form_label('Titlu', 'resurse[titlu]'); ?>
            <?php echo form_input('resurse[titlu]', (isset($form_values['titlu']) ? $form_values['titlu'] : ''), $input); ?>
        </div>

    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <?php echo form_label('Autor', 'resurse[autor]'); ?>
            <?php echo form_dropdown('resurse[autor]', $autori, (isset($form_values['autor_id']) ? $form_values['autor_id'] : ''), $select); ?>
        </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <?php echo form_label('Tipul', 'resurse[tip_id]'); ?>
                <?php echo form_dropdown('resurse[tip_id]', $tipuri, (isset($form_values['tip_id']) ? $form_values['tip_id'] : ''), $select); ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <?php echo form_label('Categorie', 'resurse[categorie]'); ?>
                <?php echo form_dropdown('resurse[categorie]', $categorii, (isset($form_values['categorie_id']) ? $form_values['categorie_id'] : ''), $select); ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
                <?php echo form_label('Continut', 'resurse[continut]'); ?>
                <?php echo form_textarea('resurse[continut]', (isset($form_values['continut']) ? $form_values['continut'] : ''), $input); ?>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-4">
               <?php echo form_label('Data', 'resurse[data]'); ?><br/>
                <?php $data = array(
                    'name' => 'resurse[data]',
                    'value' => isset($form_values['data']) ? $form_values['data'] : '',
                    'class' => "datepicker form-group");
                ?>
                <?php echo form_input($data); ?>
            </div>
        </div>

        <div class="row">
            <div class="form-group col-md-4">
                <?php
                echo form_submit('sumbit', 'Salveaza', $buton);

                echo form_close(); ?>

            </div>

    </div>