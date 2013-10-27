<div class="clearBoth"/>
<div class="admin">

    <h2>Lista Resurselor</h2>
    <div class="row">
    <div class="col-md-1">
    <a href="<?php echo BASE_URL();?>index.php/admin/adauga-resursa/">
        <button type="button" class="btn btn-default btn-md">
            <span class="glyphicon glyphicon-plus"></span> Adauga
        </button>
    </a>
        </div>


    <div class="col-md-2 col-md-push-6">
        <select id = "tip_cautare_admin" class="selectpicker">
            <option value="0">Toate resursele</option>
            <?php foreach($tipuri as $id => $tip):?>
            <option value="<?php echo $id; ?>"><?php echo $tip;?></option>

            <?php endforeach;?>
        </select>
    </div>

    <div class="col-md-3 col-md-push-6">

        <div class="input-group">



            <input type="text" id="text_cautare_admin" class="form-control" placeholder="Cuvinte cheie">

            <div class="input-group-btn">
                <button  class="btn btn-default" id="buton_cautare_admin" class="box_cautare" type="button">Cauta</button>

</div>

            </div>

        </div>
    </div>



<br />

    <table class="table table-striped table-hover table-bordered centerHead" >
        <thead>
        <tr class="success" >
            <th>
                Titlu
            </th>
            <th>
                Autor
            </th>
            <th>
                Tip
            </th>
            <th>
                Continut
            </th>
            <th>
                Data
            </th>
            <th colspan="2">
         Attach
            </th>
            <th colspan="2">
                Tag


            </th>
            <th>
                Edit
            </th>
            <th>
                Delete
            </th>

        </tr>
        </thead>
        <?php
        //    var_dump($resurse); die();
        if(isset($resurse)):
        foreach ($resurse as $resursa):

            ?>

            <tr>
                <td>
                    <?php echo $resursa['titlu']; ?> <br/></td>

                <td>
                    <?php echo $resursa['nume_autor']; ?> <br/></td>
                <td>
                    <?php echo $resursa['nume_tip']; ?> <br/></td>
                <!--                <td class="lista">-->
                <!--                    --><?php //echo $resursa['nume_categorie']; ?><!-- <br/></td>-->
                <td>
                    <?php echo myTruncate($resursa['continut'], 80, " "); ?> <br/>
                </td>

                <td>
                    <?php echo $resursa['data']; ?> <br/></td>
                <td>
                    <center> <a href="<?php echo site_url('admin/adauga-atasament/' . $resursa['r_id']); ?>"><span class="glyphicon glyphicon-plus"></span></a></center>
                </td>
                <td>
                    <center> <a href="<?php echo site_url('admin/lista-atasamente-resursa/' . $resursa['r_id']); ?>"/><span class="glyphicon glyphicon-list"></span></a></center>

                </td>

                <td>
                    <center><a href="<?php echo site_url('admin/adauga-tag/' . $resursa['r_id']); ?>"/><span class="glyphicon glyphicon-plus"></span></center>
                </td>
                <td>
                    <center><a href="<?php echo site_url('admin/lista-taguri-resursa/' . $resursa['r_id']); ?>"><span class="glyphicon glyphicon-list"></a></center>

                </td>
                <td>
                    <center><a href="<?php echo site_url('admin/editeaza-resursa/' . $resursa['r_id']); ?>"/><button type="button" class="btn btn-warning btn-sm">Editeaza</button></center>
                </td>
                <td>
                    <center><a href="sterge-resursa/<?php echo $resursa['r_id'];?>" class="sterge" ><button type="button" class="btn btn-danger btn-sm">Sterge</button></a></center>
                </td>
            </tr>

        <?php endforeach;

        else:

        ?>

        <tr>
            <td colspan="11"> Nu au fost gasite rezultate </td>
        </tr>
        <?php
        endif;
        ?>
  </table>



    <div class="text-center">
        <ul class="pagination pagination-centered">
            <?php
            if (isset($paginare)) {
                echo $paginare;
            }
            ?>
        </ul>
    </div>
</div>