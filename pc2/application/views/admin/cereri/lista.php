
    <?php     $this->load->helper('form');
    $input = 'class = "form-control"';

    ?>
<div class="clearBoth"/>
<div class="admin">

    <h1>Lista cereri</h1>
    <br />
    <?php echo form_open(current_url()); ?>
    <p>
        <?php $fromDate = array('name' => 'cerere[fromDate]', 'value' => '', 'id' => "fromDate", 'class' => "datepicker form-group"); ?>
        Din data de <?php echo form_input($fromDate,''); ?>
    </p>

    <p>
        <?php $toDate = array('name' => 'cerere[toDate]', 'value' => '', 'id' => "toDate", 'class' => "datepicker form-group"); ?>
        In data de <?php echo form_input($toDate,''); ?>
    </p>
    <?php
        $submit = Array ("name" => "submit", "value" => "Tipareste", "class" => "salveaza btn btn-default");
        echo form_submit($submit);
        echo form_close();
    ?>
    <br/>
    <br/>
    <table class="table table-striped table-hover table-bordered centerHead" >
        <thead>
        <tr class="success" >
            <th>
                Nume
            </th>
            <th>
                Localitate
            </th>
            <th>
                Data
            </th>
            <th>
                Text
            </th>
            <th>
                Public
            </th>
            <th>
                Delete
            </th>
        </tr>
        </thead>
        <?php if ($cereri != null): ?>
            <?php foreach ($cereri as $cerere) : ?>
            <tr>
                <td>
                    <?php echo $cerere['nume']; ?>
                </td>
                <td>
                    <?php echo $cerere['localitate']; ?>
                </td>
                <td>
                    <?php echo $cerere['data']; ?>
                </td>
                <td>
                    <?php echo myTruncate($cerere['continut'], 80); ?>
                </td>
                <td>
                    <?php echo ($cerere['public'] == 1? 'Da': 'Nu'); ?>
                </td>
                <td>
                    <center>
                        <a href="<?php echo site_url("admin/sterge-cerere/" . $cerere['id']);?>"  class="sterge" ><button type="button" class="btn btn-danger btn-sm">Sterge</button></a>
                    </center>
                </td>
            </tr>

            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td>
                    Nu exista nicio cerere de rugaciune.
                </td>
            </tr>
        <?php endif; ?>
    </table>



    <div class="text-center">
        <ul class="pagination pagination-centered">
            <?php
            if (isset($paginare)) {
                echo $paginare;
            }
            ?>
        </ul>
    </div>

</div>