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
    <h1>Adauga / Editeaza eveniment</h1>
    <br />
    <?php
    $this->load->helper('form');

    echo form_fieldset('Adauga / Editeaza eveniment');

    if (isset($error)) {
        echo $error;
    }
    echo $this->session->flashdata('error');
    $textlung = 'class="textlung" ';

    echo form_open_multipart(current_url());
    ?>
    <table>
        <tr>
            <td><?php echo form_label('Titlu', 'eveniment[titlu]');?> </td>
            <td><?php echo form_input('eveniment[titlu]', (isset($form_values['titlu']) ? $form_values['titlu'] : ''), $textlung); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Descriere', 'eveniment[continut]');?></td>
            <td><?php echo form_textarea('eveniment[continut]', (isset($form_values['continut']) ? $form_values['continut'] : '')); ?> </td>
        </tr>
        <tr>
            <td><?php echo form_label('Data', 'eveniment[data]');?> </td>
            <?php $data = array(
                    'name'        => 'eveniment[data]',
                    'value'       => isset($form_values['data']) ? $form_values['data'] : '',
                    'id'     => "datepicker");
            ?>
            <td><?php echo form_input($data); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Ora inceput', 'eveniment[ora_inceput]');?> </td>
            <?php
                $ore = array();
                for($i = 0; $i < 24; $i++)
                    $ore[$i] = $i;
            ?>
            <td><?php echo form_dropdown('eveniment[ora_inceput]', $ore, (isset($form_values['ora_inceput']) ? $form_values['ora_inceput'] : '')); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Ora sfarsit', 'eveniment[ora_sfarsit]');?> </td>
            <td><?php echo form_dropdown('eveniment[ora_sfarsit]', $ore, (isset($form_values['ora_sfarsit']) ? $form_values['ora_sfarsit'] : '')); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Repeta', 'eveniment[repeta]');?> </td>
            <td>
                <?php $repeta1 = array(
                'name'        => 'eveniment[repeta]',
                'value'       => 'Nu',
                'checked'     => (isset($form_values['repeta']) && $form_values['repeta']=='Nu') ? TRUE : FALSE);
                 ?>
                <?php echo form_radio($repeta1); ?>Nu

                <?php $repeta2 = array(
                'name'        => 'eveniment[repeta]',
                'value'       => 'Saptamanal',
                'checked'     => (isset($form_values['repeta']) && $form_values['repeta']=='Saptamanal') ? TRUE : FALSE);
                ?>
                <?php echo form_radio($repeta2); ?>Saptamanal
            </td>
        </tr>
        <tr>
            <td><?php echo form_label('Eveniment', 'eveniment[eveniment]');?> </td>
            <td>
                <?php $eveniment = array(
                'name'        => 'eveniment[eveniment]',
                'value'       => 'eveniment',
                'checked'     => (isset($form_values['eveniment']) && $form_values['eveniment']=='eveniment') ? TRUE : FALSE);
                ?>
                <?php echo form_checkbox($eveniment); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo form_label('Invitat predica', 'eveniment[invitat_predica]');?> </td>
            <td><?php echo form_input('eveniment[invitat_predica]', (isset($form_values['invitat_predica']) ? $form_values['invitat_predica'] : ''), $textlung); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Invitat lauda', 'eveniment[invitat_lauda]');?> </td>
            <td><?php echo form_input('eveniment[invitat_lauda]', (isset($form_values['invitat_lauda']) ? $form_values['invitat_lauda'] : ''), $textlung); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Organizator', 'eveniment[organizator]');?> </td>
            <td><?php echo form_input('eveniment[organizator]', (isset($form_values['organizator']) ? $form_values['organizator'] : ''), $textlung); ?></td>
        </tr>
        <tr>
            <td><?php echo form_label('Site organizator', 'eveniment[site_organizator]');?> </td>
            <td><?php echo form_input('eveniment[site_organizator]', (isset($form_values['site_organizator']) ? $form_values['site_organizator'] : ''), $textlung); ?></td>
        </tr>
        <?php if (isset($form_values['thumb']) && $form_values['thumb'] != ''): ?>
            <tr>
                <td colspan="2"><img src="<?php echo BASE_URL . "/" . $form_values['thumb']; ?>" /> </td>
            </tr>
        <?php endif; ?>
        <tr>
            <td><?php echo form_label('Afis', 'eveniment[afis]');?> </td>
            <td><input type="file" name="userfile" size="20" /></td>
        </tr>
        <tr>
            <td><?php echo form_label('Doresc introducerea in newsletter', 'eveniment[newsletter]');?> </td>
            <td>
                <?php $newsletter = array(
                'name'        => 'eveniment[newsletter]',
                'value'       => 'newsletter',
                'checked'     => (isset($form_values['newsletter']) && $form_values['newsletter']=='newsletter') ? TRUE : FALSE);
                ?>
                <?php echo form_checkbox($newsletter); ?>
            </td>
        </tr>
        <tr>
            <td><?php echo form_label('Evenimentul va fi transmis live', 'eveniment[live]');?> </td>
            <td>
                <?php $live = array(
                'name'        => 'eveniment[live]',
                'value'       => 'live',
                'checked'     => (isset($form_values['live']) && $form_values['live']=='live') ? TRUE : FALSE);
                ?>
                <?php echo form_checkbox($live); ?>
            </td>
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