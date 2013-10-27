<div class="clearBoth"/>

    <h1>Lista useri</h1>
    <br />
    <div class="row">
        <div class="col-md-1">
            <a href="<?php echo BASE_URL();?>index.php/admin/adauga-user/">
                <button type="button" class="btn btn-default btn-md">
                    <span class="glyphicon glyphicon-plus"></span> Adauga user
                </button>
            </a>
        </div>
    </div>
    <br />

    <table class="table table-striped table-hover table-bordered centerHead" >
        <thead>
        <tr class="success" >
            <th>
                Nume
            </th>
            <th>
                Email
            </th>
            <th>
                Telefon
            </th>
            <th>
                Public
            </th>
            <th>
                Edit
            </th>
            <th>
                Delete
            </th>
        </tr>
        </thead>
        <?php foreach ($useri as $user) : ?>
        <tr>
            <td>
                <?php echo $user['nume']; ?>
            </td>
            <td>
                <?php echo $user['email']; ?>
            </td>
            <td>
                <?php echo $user['telefon']; ?>
            </td>
            <td>
                <?php echo $user['public']; ?>
            </td>
            <td>
                <center>
                    <a href="<?php echo site_url('admin/editeaza-user/' . $user['id']); ?>"><button type="button" class="btn btn-warning btn-sm">Editeaza</button></a>
                </center>
            </td>
            <td>
                <center>
                    <a href="<?php echo site_url('admin/sterge-user/' . $user['id']); ?>"  class="sterge" ><button type="button" class="btn btn-danger btn-sm">Sterge</button></a>
                </center>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>

