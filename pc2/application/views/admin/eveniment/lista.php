<div class="clearBoth"/>
<div class="admin">
    <br />
    <h3><a href="<?php echo site_url("administrator"); ?>">Intoarcere la Administrare</a></h3>
    <br />
    <h1>Lista evenimente</h1>
    <br />

    <p><a href="<?php echo site_url('admin/adauga-eveniment'); ?>">(+) Adauga eveniment</a>
    </p>
    <br/>
    <table class="lista">
        <tr>
            <td style="background-color:#b6bb40;" class="lista">
                Titlu
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Data
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Continut
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
            </td>
            <td class="lista">
                <?php echo $resursa['data']; ?>
            </td>
            <td class="lista">
                <?php echo $resursa['continut']; ?>
            </td>
            <td class="lista">
                <center>
                    <a href="<?php echo site_url('admin/editeaza-eveniment/' . $resursa['r_id']); ?>">EDIT</a>
                </center>
            </td>
            <td class="lista">
                <center>
                    <a href="sterge-eveniment/<?php echo $resursa['r_id'];?>"  class="sterge" >DELETE</a>
                </center>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>

    <div class="paginare" style="  margin-top: 20px;">
        <?php
        if (isset($paginare)) {
            echo $paginare;
        }
        ?>
    </div>

</div>