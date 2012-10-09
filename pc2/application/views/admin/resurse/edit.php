<script>
    $(function() {
        $( "#datepicker" ).datepicker( {dateFormat: "yy-mm-dd",  showOn: "both" });
    });
</script>
<div class="clearBoth"/>
<div class="admin">
    <br />
    <h3><a href="<?php echo site_url("pcadmin"); ?>">Intoarcere la Administrare</a></h3>
    <br />
    <h1>Adauga / Editeaza resursa</h1>
    <br />
    <?php
    $this->load->helper('form');

    echo form_fieldset('Adauga / Editeaza resursa');

    echo validation_errors();
    echo form_open(current_url());
    ?>
    <table>
        <tr>
            <td><?php echo form_label('Titlu', 'resurse[titlu]');?> </td>
            <td><?php echo form_input('resurse[titlu]', (isset($form_values['titlu']) ? $form_values['titlu'] : '')); ?></td>
        </tr>

        <tr>
            <td><?php echo form_label('Autor', 'resurse[autor]');  ?></td>
            <td><?php echo form_dropdown('resurse[autor]', $autori, (isset($form_values['autor_id']) ? $form_values['autor_id'] : '')); ?></td>
        </tr>


        <tr>
            <td><?php echo form_label('Tipul', 'resurse[tip_id]');  ?></td>
            <td><?php echo form_dropdown('resurse[tip_id]', $tipuri, (isset($form_values['tip_id']) ? $form_values['tip_id'] : '')); ?></td>
        </tr>

        <tr>
            <td><?php echo form_label('Categorie', 'resurse[categorie]'); ?></td>
            <td><?php echo form_dropdown('resurse[categorie]', $categorii, (isset($form_values['categorie_id']) ? $form_values['categorie_id'] : '')); ?></td>
        </tr>

        <tr>
            <td><?php echo form_label('Continut', 'resurse[continut]');?></td>
            <td><?php echo form_textarea('resurse[continut]', (isset($form_values['continut']) ? $form_values['continut'] : '')); ?> </td>
        </tr>

        <tr>
            <td><?php echo form_label('Data', 'resurse[data]'); ?></td>
            <?php $data = array(
            'name'        => 'resurse[data]',
            'value'       => isset($form_values['data']) ? $form_values['data'] : '',
            'id'     => "datepicker");
            ?>
            <td><?php echo form_input($data); ?></td>
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