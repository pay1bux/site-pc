<div class="clearBoth"/>

    <h1>Lista Buletine</h1>
    <br />

    <div class="row">
        <div class="col-md-1">
            <a href="<?php echo BASE_URL();?>index.php/admin/adauga-buletin">
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
                Data
            </th>
            <th>
                Fisier
            </th>
            <th>
                Marime
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
            <td>
                <?php echo $resursa['titlu']; ?>
            </td>
            <td>
                <?php echo $resursa['data']; ?>
            </td>
            <td>
                <?php echo htmlentities(myTruncate($resursa['url'], 80, " ")); ?>
            </td>
            <td>
                <?php echo $resursa['marime']?> MB
            </td>
            <td>
                <center><a
                    href="<?php echo site_url('admin/editeaza-buletin/' . $resursa['r_id']); ?>"/><button type="button" class="btn btn-warning btn-sm">Editeaza</button>
                </center>
            </td>
            <td class="lista">
                <center>
                    <a href="sterge-buletin/<?php echo $resursa['r_id'];?>"  class="sterge" ><button type="button" class="btn btn-danger btn-sm">Sterge</button></a>
                </center>
            </td>
        </tr>

        <?php endforeach; ?>
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
