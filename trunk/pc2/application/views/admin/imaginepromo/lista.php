<div class="clearBoth"/>


    <h2>Lista imagini promo</h2>
<div class="row">
    <div class="col-md-1">
        <a href="<?php echo BASE_URL();?>index.php/admin/adauga-imagine-promo/">
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
                Titlu
            </th>
            <th>
                Edit
            </th>
            <th>
                Delete
            </th>
        </tr>
        </thead>
        <?php foreach ($resurse as $resursa) : ?>
        <tr>
            <td class="lista">
                <?php echo $resursa['titlu']; ?>
            </td>
            <td>
                <center>
                    <a href="<?php echo site_url('admin/editeaza-imagine-promo/' . $resursa['r_id']); ?>"><button type="button" class="btn btn-warning btn-sm">Editeaza</button></a>
                </center>
            </td>
            <td>
                <center>
                    <a href="<?php echo site_url('admin/sterge-imagine-promo/' . $resursa['r_id']); ?>"  class="sterge" ><button type="button" class="btn btn-danger btn-sm">Sterge</button></a>
                </center>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>

