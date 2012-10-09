<div class="clearBoth"/>
<div class="admin">
    <br />
    <h3><a href="<?php echo site_url("administrator"); ?>">Intoarcere la Administrare</a></h3>
    <br />
    <h1>Lista Resurselor</h1>
    <br />
    Cauta:
    <input type="text" id="text_cautare_admin" class="box_cautare" style="float: right; margin-right: 5px;" />
    </br>
    <a class="but_details" id="buton_cautare_admin" style="float:right; " href="#"><strong>Caută</strong><span class="i_icon">&nbsp;</span></a>
    </br>
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
<!--            <td style="background-color:#b6bb40;" class="lista">-->
<!--                Categorie-->
<!--            </td>-->
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
        foreach ($resurse as $resursa) {
            ?>

            <tr>
                <td class="lista">
                    <?php echo $resursa['titlu']; ?> <br/></td>

                <td class="lista">
                    <?php echo $resursa['nume_autor']; ?> <br/></td>
                <td class="lista">
                    <?php echo $resursa['nume_tip']; ?> <br/></td>
<!--                <td class="lista">-->
<!--                    --><?php //echo $resursa['nume_categorie']; ?><!-- <br/></td>-->
                <td class="lista">
                    <?php echo myTruncate($resursa['continut'], 80, " "); ?> <br/>
                </td>

                <td class="lista">
                    <?php echo $resursa['data']; ?> <br/></td>
                <td class="lista">
                    <center><a href="<?php echo site_url('admin/adauga-atasament/' . $resursa['r_id']); ?>"/>+</center>
                </td>
                <td class="lista">
                    <center><a href="<?php echo site_url('admin/lista-atasamente-resursa/' . $resursa['r_id']); ?>"/>▤
                    </center>
                </td>

                <!--                       <td class="lista" >-->
                <!--                         --><?php // var_dump($nr_atasamente); ?>
                <!--                       </td>-->
                <td class="lista">
                    <center><a href="<?php echo site_url('admin/adauga-tag/' . $resursa['r_id']); ?>"/>+</center>
                </td>
                <td class="lista">
                    <center><a href="<?php echo site_url('admin/lista-taguri-resursa/' . $resursa['r_id']); ?>"/>▤
                    </center>
                </td>
                <td class="lista">
                    <center><a href="<?php echo site_url('admin/editeaza-resursa/' . $resursa['r_id']); ?>"/>EDIT</center>
                </td>
                <td class="lista">
                    <center>
                    <a href="sterge-resursa/<?php echo $resursa['r_id'];?>" class="sterge" >DELETE</a></center>
                </td>
            </tr>

            <?php }?>
    </table>
    <br />
   <center><?php

       if( isset($paginare))
       { echo $paginare;}


     ?></center>
    <br />
</div>