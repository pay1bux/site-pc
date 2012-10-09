<div class="clearBoth"/>
<div class="admin">
    <br />
    <h3><a href="<?php echo site_url("pcadmin"); ?>">Intoarcere la Administrare</a></h3>
    <br />
    <h1>Lista imagini promo</h1>
    <br />

    <p><a href="<?php echo site_url('admin/adauga-imagine-promo'); ?>">(+) Adauga imagine promo</a>
    </p>
    <br/>
    <table class="lista">
        <tr>
            <td style="background-color:#b6bb40;" class="lista">
                Titlu
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Edit
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Delete
            </td>
        </tr>
        <?php foreach ($resurse as $resursa) : ?>
        <tr>
            <td class="lista">
                <?php echo $resursa['titlu']; ?>
            <td class="lista">
                <center>
                    <a href="<?php echo site_url('admin/editeaza-imagine-promo/' . $resursa['r_id']); ?>">EDIT</a>
                </center>
            </td>
            <td class="lista">
                <center>
                    <a href="<?php echo site_url('admin/sterge-imagine-promo/' . $resursa['r_id']); ?>"  class="sterge" >DELETE</a>
                </center>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>

</div>