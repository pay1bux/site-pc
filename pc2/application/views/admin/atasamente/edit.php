<?php
$this->load->helper('form');

echo form_fieldset('Adauga / Editeaza atasamente');

echo validation_errors();
$textlung= 'class="textlung" ';

echo form_open(current_url());
?>
<table>
    <tr>

        <td><?php echo form_label('URL', 'atasamente[url]');?> </td>
        <td><?php echo form_input('atasamente[url]',(isset($form_values['url'])?$form_values['url']:''), $textlung); ?></td>
    </tr>
      <tr>
        <td><?php echo form_label('Embed', 'atasamente[embed]');?> </td>
        <td><?php echo form_textarea('atasamente[embed]',(isset($form_values['embed'])?$form_values['embed']:'')); ?></td>
    </tr>
      <tr>
        <td><?php echo form_label('Marime', 'atasamente[marime]');?> </td>
        <td><?php echo form_input('atasamente[marime]',(isset($form_values['marime'])?$form_values['marime']:'')); ?></td>
    </tr>
      <tr>
        <td><?php echo form_label('Format', 'atasamente[format]');?> </td>
        <td><?php echo form_input('atasamente[format]',(isset($form_values['format'])?$form_values['format']:'')); ?></td>
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
