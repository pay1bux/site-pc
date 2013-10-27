<div class="clearBoth"/>
<div class="admin">

    <h2>Lista devotional</h2>
    <br />


        <a href="<?php echo site_url('admin/adauga-devotional'); ?>">
        <button type="button" class="btn btn-default btn-md">
            <span class="glyphicon glyphicon-plus"></span> Adauga
        </button>
        </a>


    </p>
    <br/>

    <table class="table table-striped table-hover table-bordered">
        <thead>
        <tr class="success">
            <th>
                Titlu
            </th>
            <th>
                Data
            </th>
            <th>
                Text
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
                    <?php echo myTruncate($resursa['continut'], 80); ?>
                </td>
                <td>
                        <a href="<?php echo site_url('admin/editeaza-devotional/' . $resursa['r_id']); ?>"><button type="button" class="btn btn-warning btn-sm">Editeaza</button></a>

                </td>
                <td>

                        <a href="sterge-devotional/<?php echo $resursa['r_id'];?>"  onclick="javascript(return 0);" class="sterge" ><button type="button" class="btn btn-danger btn-sm">Sterge</button></a>

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



</div>