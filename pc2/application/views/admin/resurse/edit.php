<?php
$this->load->helper('form');

echo form_fieldset('Adauga resursa');

echo validation_errors();
echo form_open(current_url());
?>
<table>
    <tr>
        <td><?php echo form_label('Titlu', 'resurse[titlu]');?> </td>
        <td><?php echo form_input(array('name' => 'resurse[titlu]', 'value'=>(isset($form_values['titlu'])?$form_values['titlu']:''))); ?></td>
    </tr>

    <tr>
        <td><?php echo form_label('Autor', 'resurse[autor]');  ?></td>
        <td><?php echo form_dropdown('resurse[autor]', $autori); ?></td>
    </tr>

    <tr>
        <td><?php echo form_label('Autor', 'resurse[tip_id]');  ?></td>
        <td><?php echo form_dropdown('resurse[tip_id]', $tipuri); ?></td>
    </tr>

    <tr>
        <td><?php echo form_label('Categorie', 'resurse[categorie]'); ?></td>
        <td><?php echo form_input('resurse[categorie]'); ?></td>
    </tr>

    <tr>
        <td><?php echo form_label('Continut', 'resurse[continut]');?></td>
        <td><?php echo form_textarea('resurse[continut]'); ?> </td>
    </tr>

    <tr>
        <td><?php echo form_label('Data', 'resurse[data]'); ?></td>
        <td><?php echo form_input('resurse[data]'); ?> </td>
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
