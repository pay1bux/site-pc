<script>
    $(function() {
        $( "#fromDate" ).datepicker( {dateFormat: "yy-mm-dd",  showOn: "both" });
        $( "#toDate" ).datepicker( {dateFormat: "yy-mm-dd",  showOn: "both" });
    });
</script>
    <?php     $this->load->helper('form'); ?>
<div class="clearBoth"/>
<div class="admin">
    <br />
    <a href="<?php echo site_url("pcadmin"); ?>" class="backadmin"> <div id="backadmin">Administrare</div></a>
    <br />
    <h1>Lista cereri</h1>
    <br />
    <?php echo form_open(current_url()); ?>
    <p>
        <?php $fromDate = array('name' => 'cerere[fromDate]', 'value' => '', 'id' => "fromDate"); ?>
        Din data de<?php echo form_input($fromDate,''); ?>
    </p>

    <p>
        <?php $toDate = array('name' => 'cerere[toDate]', 'value' => '', 'id' => "toDate"); ?>
        In data de<?php echo form_input($toDate,''); ?>
    </p>
    <?php
        $submit = Array ("name" => "submit", "value" => "Tipareste", "class" => "salveaza");
        echo form_submit($submit);
        echo form_close();
    ?>
    <br/>
    <br/>
    <table class="lista">
        <tr>
            <td style="background-color:#b6bb40;" class="lista">
                Nume
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Localitate
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Data
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Text
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Public
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Delete
            </td>
        </tr>
        <?php if ($cereri != null): ?>
            <?php foreach ($cereri as $cerere) : ?>
            <tr>
                <td class="lista">
                    <?php echo $cerere['nume']; ?>
                </td>
                <td class="lista">
                    <?php echo $cerere['localitate']; ?>
                </td>
                <td class="lista">
                    <?php echo $cerere['data']; ?>
                </td>
                <td class="lista">
                    <?php echo myTruncate($cerere['continut'], 80); ?>
                </td>
                <td class="lista">
                    <?php echo ($cerere['public'] == 1? 'Da': 'Nu'); ?>
                </td>
                <td class="lista">
                    <center>
                        <a href="sterge-cerere/<?php echo $cerere['id'];?>"  class="sterge" >DELETE</a>
                    </center>
                </td>
            </tr>

            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td class="lista" colspan="6">
                    Nu exista nicio cerere de rugaciune.
                </td>
            </tr>
        <?php endif; ?>
    </table>

    <div class="paginare" style="  margin-top: 20px;">
        <?php
        if (isset($paginare)) {
            echo $paginare;
        }
        ?>
    </div>

</div>