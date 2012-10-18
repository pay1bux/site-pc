<div class="clearBoth"/>
<div class="admin">
    <br />
    <a href="<?php echo site_url("pcadmin"); ?>" class="backadmin"> <div id="backadmin">Administrare</div></a>
    <br />
    <h1>Lista Buletine</h1>
    <br />

    <p><a href="<?php echo site_url('admin/adauga-buletin'); ?>">(+) Adauga Buletin</a>
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
                Fisier
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Marime
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
                <?php echo htmlentities(myTruncate($resursa['url'], 80, " ")); ?>
            </td>
            <td class="lista">
                <?php echo $resursa['marime']?> MB
            </td>
            <td class="lista">
                <center><a
                    href="<?php echo site_url('admin/editeaza-buletin/' . $resursa['r_id']); ?>"/>EDIT
                </center>
            </td>
            <td class="lista">
                <center>
                    <a href="sterge-buletin/<?php echo $resursa['r_id'];?>"  class="sterge" >DELETE</a>
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