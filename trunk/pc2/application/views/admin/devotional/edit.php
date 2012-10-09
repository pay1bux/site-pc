<script>
    $(function() {
        $( "#datepicker" ).datepicker( {dateFormat: "yy-mm-dd",  showOn: "both" });
    });
</script>
<div class="clearBoth"/>
<div class="admin">
    <br />
    <h3><a href="<?php echo site_url("administrator"); ?>">Intoarcere la Administrare</a></h3>
    <br />
    <h1>Adauga / Editeaza devotional</h1>
    <br />
    <?php
    $this->load->helper('form');

    echo form_fieldset('Adauga / Editeaza devotional');

    if (isset($error)) {
        echo $error;
    }
    $textlung = 'class="textlung" ';

    echo form_open_multipart(current_url());
    ?>
    <table>
        <tr>
            <td><?php echo form_label('Titlu', 'devotional[titlu]');?> </td>
            <td><?php echo form_input('devotional[titlu]', (isset($form_values['titlu']) ? $form_values['titlu'] : ''), $textlung); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Textul', 'devotional[continut]');?></td>
            <td><?php echo form_textarea('devotional[continut]', (isset($form_values['continut']) ? $form_values['continut'] : '')); ?> </td>
        </tr>
        <tr>
            <td><?php echo form_label('Data', 'devotional[data]');?> </td>
            <?php $data = array(
                    'name'        => 'devotional[data]',
                    'value'       => isset($form_values['data']) ? $form_values['data'] : '',
                    'id'     => "datepicker");
            ?>
            <td><?php echo form_input($data); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Autor', 'devotional[autor_id]');  ?></td>
            <td><?php echo form_dropdown('devotional[autor_id]', $autori, (isset($form_values['autor_id']) ? $form_values['autor_id'] : '')); ?></td>
        </tr>






        <?php if (isset($form_values['thumb']) && $form_values['thumb'] != ''): ?>
            <tr>
                <td colspan="2"><img src="<?php echo BASE_URL . "/" . $form_values['thumb']; ?>" /> </td>
            </tr>
        <?php endif; ?>
        <tr>
            <td><?php echo form_label('Imagine', 'devotional[afis]');?> </td>
            <td><input type="file" name="userfile" size="20" /></td>
        </tr>

        <tr>

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