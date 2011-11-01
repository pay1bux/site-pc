<h2>Lista Resurselor</h2>
<br/>
<p><a href="<?php echo BASE_URL();?>index.php/admin/adauga-resursa/">(+) Adauga Resursa</a></p>
<br/>

<table class="lista">
    <tr>
        <td style="background-color:#b6bb40;" class="lista">

            Titlu
        </td>
        <td style="background-color:#b6bb40;" class="lista">
            Autor
        </td>
        <td style="background-color:#b6bb40;" class="lista">
            Tip
        </td>
        <td style="background-color:#b6bb40;" class="lista">
            Categorie
        </td>
        <td style="background-color:#b6bb40;" class="lista">
            Continut
        </td>
        <td style="background-color:#b6bb40;" class="lista">
            Data
        </td>
        <!--              <td style="background-color:#b6bb40;" class="lista" >-->
        <!--              Nr.a-->
        <!--              </td>-->
        <td style="background-color:#b6bb40;" class="lista">
            Add att
        </td>
        <td style="background-color:#b6bb40;" class="lista">
            Atts
        </td>
        <td style="background-color:#b6bb40;" class="lista">
            Add tag
        </td>
          <td style="background-color:#b6bb40;" class="lista">
            Tags
        </td>
        <td style="background-color:#b6bb40;" class="lista">
            Editeaza
        </td>
        <td style="background-color:#b6bb40;" class="lista">
            Sterge
        </td>
    </tr>
    <?php
    //    var_dump($resurse); die();
    foreach ($resurse as $resursa)
    {
        ?>

        <tr>
            <td class="lista">
                <?php echo $resursa['titlu']; ?> <br/></td>

            <td class="lista">
                <?php echo $resursa['autor_nume']; ?> <br/></td>
            <td class="lista">
                <?php echo $resursa['tip_nume']; ?> <br/></td>
            <td class="lista">
                <?php echo $resursa['categorie_nume']; ?> <br/></td>
            <td class="lista">
                <?php echo myTruncate($resursa['continut'], 80, " "); ?> <br/>
            </td>

            <td class="lista">
                <?php echo $resursa['data']; ?> <br/></td>
            <td class="lista">
                <center><a href="<?php echo site_url('admin/adauga-atasament/' . $resursa['id']); ?>"/>+</center>
            </td>
            <td class="lista">
                <center><a href="<?php echo site_url('admin/lista-atasamente-resursa/' . $resursa['id']); ?>"/>▤</center>
            </td>

            <!--                       <td class="lista" >-->
            <!--                         --><?php // var_dump($nr_atasamente); ?>
            <!--                       </td>-->
            <td class="lista">
                <center><a href="<?php echo site_url('admin/adauga-tag/' . $resursa['id']); ?>"/>+</center>
            </td>
            <td class="lista">
                <center><a href="<?php echo site_url('admin/lista-taguri-resursa/' . $resursa['id']); ?>"/>▤</center>
            </td>
            <td class="lista">
                <center><a href="<?php echo site_url('admin/editeaza-resursa/' . $resursa['id']); ?>"/>EDIT</center>
            </td>
            <td class="lista">
                <center>DELETE</center>
            </td>
        </tr>

        <?php }?>
</table>