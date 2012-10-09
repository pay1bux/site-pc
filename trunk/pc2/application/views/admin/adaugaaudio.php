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
    <h1>Adauga audio multiple</h1>
    <br />
    <?php
    $this->load->helper('form');

    echo form_fieldset('Adauga audio multiple');

    if (isset($url_nou)) {
        echo "Resurse pentru adaugare: " . count($files);
        echo " la adresa: " . $url_nou;
    }

    if (isset($fisiereCuErori) && count($fisiereCuErori) > 0) {
        echo "<br />Fisiere neadaugate dar mutate in ". $url_nou;
        foreach($fisiereCuErori as $f)
            echo "<br />" . $f->path;
    }

    echo form_open_multipart(current_url());
    ?>
    <table>
        <tr>
            <td><?php echo form_label('Data', 'data');?> </td>
            <?php $data = array(
            'name'        => 'data',
            'value'       => isset($data_adaugarii) ? $data_adaugarii : '',
            'id'     => "datepicker");
            ?>
            <td><?php echo form_input($data); ?></td>
        </tr>
        <tr>
            <td colspan="2">
                <?php
                echo form_fieldset_close();
                echo form_submit('sumbit', 'Adauga');
                echo form_close(); ?>
            </td>
        </tr>

    </table>
</div>