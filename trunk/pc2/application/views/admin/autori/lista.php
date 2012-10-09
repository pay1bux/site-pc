<div class="clearBoth"/>
<div class="admin">
    <br />
    <h3><a href="<?php echo site_url("pcadmin"); ?>">Intoarcere la Administrare</a></h3>
    <br />
    <h1>Lista Autorilor</h1>
    <br />

    <p><a href="<?php echo site_url('admin/autori/add');?>">(+) Adauga autor</a></p>
    <br/>

    <table class="lista">
        <tr>
            <td style="background-color:#b6bb40;" class="lista">

                Nume
            </td>
            <td style="background-color:#b6bb40;" class="lista">

                Editeaza
            </td>
            </td>
            <td style="background-color:#b6bb40;" class="lista">
                Sterge
            </td>
        </tr>
        <?php
        foreach ($autori as $autor) {
            ?>

            <tr>
                <td class="lista">
                    <?php echo $autor['nume']; ?> <br/><?php
                    ?></td>
                <td class="lista">
                    <center><a href="<?php echo site_url('admin/editeaza-autori');?>/<?php echo $autor['id']; ?>"/>EDIT
                    </center>
                </td>
                <td class="lista">
                    <center>DELETE</center>
                </td>
            </tr>
            <?php }?>
    </table>
</div>