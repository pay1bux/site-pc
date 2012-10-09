<div class="clearBoth"/>
<div class="admin">
    <br />
    <h3><a href="<?php echo site_url("pcadmin"); ?>">Intoarcere la Administrare</a></h3>
    <br />
    <h1>Lista taguri</h1>
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

    <h2>Lista Tagurilor</h2>
    <br/>

    <p><a href="<?php echo site_url('admin/adauga-tag/' . $resursa['id']); ?>">(+) Adauga tag nou</a>
    </p>
    <br/>
    <table class="lista">
        <tr>
            <td style="background-color:#b6bb40;" class="lista">
                Tip tag
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Valoare
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Edit
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Delete
            </td>
        </tr>
        <?php foreach ($taguri as $tag) : ?>
        <tr>
            <td class="lista">
                <?php echo $tag['nume_tip']; ?>
            </td>
            <td class="lista">
                <?php echo $tag['valoare']?>
            </td>
            <td class="lista">
                <center><a
                    href="<?php echo site_url('admin/editeaza-tag/' . $resursa['id']); ?>/<?php echo $tag['id']; ?>"/>EDIT
                </center>
            </td>
            <td class="lista">
                <center>DELETE</center>
            </td>
        </tr>

        <?php endforeach; ?>
    </table>
</div>