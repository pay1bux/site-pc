<div class="clearBoth"/>
<div class="admin">
    <br />
    <h3><a href="<?php echo site_url("pcadmin"); ?>">Intoarcere la Administrare</a></h3>
    <br />
    <h1>Lista useri</h1>
    <br />

    <p><a href="<?php echo site_url('admin/adauga-user'); ?>">(+) Adauga user</a>
    </p>
    <br/>
    <table class="lista">
        <tr>
            <td style="background-color:#b6bb40;" class="lista">
                Nume
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Email
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Telefon
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Public
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Edit
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Delete
            </td>
        </tr>
        <?php foreach ($useri as $user) : ?>
        <tr>
            <td class="lista">
                <?php echo $user['nume']; ?>
            </td>
            <td class="lista">
                <?php echo $user['email']; ?>
            </td>
            <td class="lista">
                <?php echo $user['telefon']; ?>
            </td>
            <td class="lista">
                <?php echo $user['public']; ?>
            </td>
            <td class="lista">
                <center>
                    <a href="<?php echo site_url('admin/editeaza-user/' . $user['id']); ?>">EDIT</a>
                </center>
            </td>
            <td class="lista">
                <center>
                    <a href="<?php echo site_url('admin/sterge-user/' . $user['id']); ?>"  class="sterge" >DELETE</a>
                </center>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>

</div>