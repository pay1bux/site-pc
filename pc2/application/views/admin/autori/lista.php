<div class="clearBoth"/>
<div class="admin">


    <h1>Lista Autorilor</h1>
    <br/>
    <div class="row">
        <div class="col-md-1">
            <a href="<?php echo BASE_URL();?>index.php/admin/adauga-autori">
                <button type="button" class="btn btn-default btn-md">
                    <span class="glyphicon glyphicon-plus"></span> Adauga
                </button>
            </a>
        </div>
    </div>
<br/>

    <table class="table table-striped table-hover table-bordered centerHead" >
        <thead>
        <tr class="success" >
            <th>

                Nume
            </th>
            <th>

                Editeaza
            </th>
            <th>
                Sterge
            </th>
        </tr>
        </thead>
        <?php
        foreach ($autori as $autor) {
            ?>

            <tr>
                <td>
                    <?php echo $autor['nume']; ?>
                </td>
                <td>
                    <center><a href="<?php echo site_url('admin/editeaza-autori'); ?>/<?php echo $autor['id']; ?>"/><button type="button" class="btn btn-warning btn-sm">Editeaza</button></center>
                </td>
                <td>
                    <center><button type="button" class="btn btn-danger btn-sm">Sterge</button></center>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>