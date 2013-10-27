<div class="clearBoth"/>


<h1>Adauga / Editeaza eveniment</h1>
<br/>
<?php
$this->load->helper('form');


if (isset($error)) {
    echo $error;
}
echo $this->session->flashdata('error');
$select = 'class="selectFormPicker"';
$input = 'class = "form-control"';
$buton = 'class = "btn btn-default"';

echo form_open_multipart(current_url());
?>
<div class="form-group col-md-6">
    <div class="row">
        <div class="form-group col-md-8">
            <td><?php echo form_label('Titlu', 'eveniment[titlu]'); ?> </td>
            <td><?php echo form_input('eveniment[titlu]', (isset($form_values['titlu']) ? $form_values['titlu'] : ''), $input); ?></td>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-8">
            <td><?php echo form_label('Descriere', 'eveniment[continut]'); ?></td>
            <td><?php echo form_textarea('eveniment[continut]', (isset($form_values['continut']) ? $form_values['continut'] : ''), $input); ?> </td>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-8">
            <td><?php echo form_label('Data', 'eveniment[data]'); ?> </td>
            <?php $data = array(
                'name' => 'eveniment[data]',
                'value' => isset($form_values['data']) ? $form_values['data'] : '',
                'class' => "datepicker form-group");
            ?>
            <td><?php echo form_input($data); ?></td>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-8">
            <td><?php echo form_label('Ora inceput', 'eveniment[ora_inceput]'); ?> </td>
            <?php
            $ore = array();
            for ($i = 0; $i < 24; $i++)
                $ore[$i] = $i;
            ?>
            <td><?php echo form_dropdown('eveniment[ora_inceput]', $ore, (isset($form_values['ora_inceput']) ? $form_values['ora_inceput'] : ''), $select); ?></td>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-8">
            <td><?php echo form_label('Ora sfarsit', 'eveniment[ora_sfarsit]'); ?> </td>
            <td><?php echo form_dropdown('eveniment[ora_sfarsit]', $ore, (isset($form_values['ora_sfarsit']) ? $form_values['ora_sfarsit'] : ''), $select); ?></td>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-8">
            <td><?php echo form_label('Repeta', 'eveniment[repeta]'); ?> </td>
            <td>
                <?php $repeta1 = array(
                    'name' => 'eveniment[repeta]',
                    'value' => 'Nu',
                    'checked' => (isset($form_values['repeta']) && $form_values['repeta'] == 'Nu') ? TRUE : FALSE);
                ?>
                <?php echo form_radio($repeta1); ?>Nu

                <?php $repeta2 = array(
                    'name' => 'eveniment[repeta]',
                    'value' => 'Saptamanal',
                    'checked' => (isset($form_values['repeta']) && $form_values['repeta'] == 'Saptamanal') ? TRUE : FALSE);
                ?>
                <?php echo form_radio($repeta2); ?>Saptamanal
            </td>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-8">
            <td><?php echo form_label('Eveniment', 'eveniment[eveniment]'); ?> </td>
            <td>
                <?php $eveniment = array(
                    'name' => 'eveniment[eveniment]',
                    'value' => 'eveniment',
                    'checked' => (isset($form_values['eveniment']) && $form_values['eveniment'] == 'eveniment') ? TRUE : FALSE);
                ?>
                <?php echo form_checkbox($eveniment); ?>
            </td>
        </div>
    </div>
</div>
<div class="form-group col-md-6">
    <div class="row">
        <div class="form-group col-md-8">
            <td><?php echo form_label('Invitat predica', 'eveniment[invitat_predica]'); ?> </td>
            <td><?php echo form_input('eveniment[invitat_predica]', (isset($form_values['invitat_predica']) ? $form_values['invitat_predica'] : ''), $input); ?></td>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-8">
            <td><?php echo form_label('Invitat lauda', 'eveniment[invitat_lauda]'); ?> </td>
            <td><?php echo form_input('eveniment[invitat_lauda]', (isset($form_values['invitat_lauda']) ? $form_values['invitat_lauda'] : ''), $input); ?></td>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-8">
            <td><?php echo form_label('Organizator', 'eveniment[organizator]'); ?> </td>
            <td><?php echo form_input('eveniment[organizator]', (isset($form_values['organizator']) ? $form_values['organizator'] : ''), $input); ?></td>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-8">
            <td><?php echo form_label('Site organizator', 'eveniment[site_organizator]'); ?> </td>
            <td><?php echo form_input('eveniment[site_organizator]', (isset($form_values['site_organizator']) ? $form_values['site_organizator'] : ''), $input); ?></td>
        </div>
    </div>
    <?php if (isset($form_values['thumb']) && $form_values['thumb'] != ''): ?>
        <div class="row">
            <div class="form-group col-md-8">
                <td colspan="2"><img src="<?php echo BASE_URL . "/" . $form_values['thumb']; ?>"/></td>
            </div>
        </div>
    <?php endif; ?>
    <div class="row">
        <div class="form-group col-md-8">
            <td><?php echo form_label('Afis', 'eveniment[afis]'); ?> </td>
            <td><input type="file" name="userfile" size="20" class="btn btn-default"/></td>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-8">
            <td><?php echo form_label('Doresc introducerea in newsletter ', 'eveniment[newsletter]'); ?> </td>
            <td>
                <?php $newsletter = array(
                    'name' => 'eveniment[newsletter]',
                    'value' => 'newsletter',
                    'checked' => (isset($form_values['newsletter']) && $form_values['newsletter'] == 'newsletter') ? TRUE : FALSE);
                ?>
                <?php echo form_checkbox($newsletter); ?>
            </td>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-8">
            <td><?php echo form_label('Evenimentul va fi transmis live', 'eveniment[live]'); ?> </td>
            <td>
                <?php $live = array(
                    'name' => 'eveniment[live]',
                    'value' => 'live',
                    'checked' => (isset($form_values['live']) && $form_values['live'] == 'live') ? TRUE : FALSE);
                ?>
                <?php echo form_checkbox($live); ?>
            </td>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-8">
            <td colspan="2">
                <?php
                echo form_fieldset_close();
                echo form_submit('sumbit', 'Salveaza', $buton);
                echo form_close(); ?>
            </td>
        </div>
    </div>
</div>

<div class="clearBoth"/>
