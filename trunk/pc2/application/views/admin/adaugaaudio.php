
<div class="clearBoth"/>

    <h1>Adauga audio multiple</h1>
    <br />

<div class="row">
    <div class="form-group col-md-4">
    <?php
    $this->load->helper('form');
    $buton = 'class = "btn btn-default"';

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
    </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
            <?php echo form_label('Data', 'data');?>
            <?php $data = array(
            'name'        => 'data',
            'value'       => isset($data_adaugarii) ? $data_adaugarii : '',
            'class' => "datepicker form-group");
            ?>
            <?php echo form_input($data); ?>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-4">
                <?php
                echo form_submit('sumbit', 'Adauga', $buton);
                echo form_close(); ?>
        </div>
    </div>
