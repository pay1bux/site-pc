<div class="clearBoth"/>
<div class="admin">
    <br />
    <h3><a href="<?php echo site_url("pcadmin"); ?>">Intoarcere la Administrare</a></h3>
    <br />
    <h1>Atasamente</h1>
    <br />
    <table>
        <tr>
            <td>Titlu:</td>
            <td><?php echo $resursa['titlu']; ?></td>
        </tr>
        <tr>
            <td>Continut:</td>
            <td><?php echo myTruncate($resursa['continut'], 80, " "); ?></td>
        </tr>
        <tr>
            <td>Autor:</td>
            <td><?php echo $resursa['autor_nume']; ?>
        </tr>
        <tr>
            <td>Categorie:</td>
            <td><?php echo $resursa['categorie_nume']; ?>
        </tr>
        <tr>
            <td>Data:</td>
            <td><?php echo $resursa['data']; ?></td>
        </tr>

    </table>

    <br/>

    <h2>Lista Atasamentelor</h2>
    <br/>

    <p><a href="<?php echo site_url('admin/adauga-atasament/' . $resursa['id']); ?>">(+) Adauga atasament</a>
    </p>
    <br/>
    <table class="lista">
        <tr>
            <td style="background-color:#b6bb40;" class="lista">
                Url
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Embed
            </td>
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Marime
            </td>
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Format
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Edit
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Delete
            </td>
        </tr>
        <?php foreach ($atasamente as $atasament) : ?>
        <tr>
            <td class="lista">
                <?php echo $atasament['url']; ?>
            </td>
            <td class="lista">
                <?php echo htmlentities(myTruncate($atasament['embed'], 80, " ")); ?>
            </td>
            <td class="lista">
                <?php echo $atasament['marime']?>
            </td>
            <td class="lista">
                <?php echo $atasament['format']; ?>
            </td>
            <td class="lista">
                <center><a
                    href="<?php echo site_url('admin/editeaza-atasament/' . $resursa['id']); ?>/<?php echo $atasament['id']; ?>"/>EDIT
                </center>
            </td>
            <td class="lista">
                <center>DELETE</center>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
</div>