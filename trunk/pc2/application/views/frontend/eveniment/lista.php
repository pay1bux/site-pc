<?php
$this->load->helper('form');

echo validation_errors();
echo form_open(current_url());
$dropdown = 'class="dropdown"';
$clear = 'class="cleardefault"';
$buton = 'class="submit"';

?>
<div class="clearBoth" style="height:10px;"></div>
<div id="PageContent">
    <div id="header" style="background-image: url(<?php echo IMAGES_PATH; ?>banner/evenimente.png)"></div>
    <div id="continut">
   <!--     <div><?php echo getDayName($ziuaSaptamanii)?>, <?php echo prepareDateWithYear($data)?></div>-->
        <?php if (isset($evenimente) && count($evenimente) > 0): ?>

        <div class="p_text" style="margin-bottom: 20px;">
            <div class="i_title">
                Calendar evenimente
            </div>
        </div>     <div class="clearBoth"></div>
        <?php foreach ($evenimente as $event): ?>
            <?php list($y, $m, $d) = explode('-', $event["data"]);?>




            <div class="badge-data">
                <p class="ziua"><?php echo $d;?></p>

                <p  style="margin-top: 15px;"><?php echo prepareLunaName($m);?></p>
                <p ><?php echo $y;?></p>
            </div>


            <div style="float:left; width:590px; margin-left: 15px;">
                <div class="e_titlu"><?php echo $event["titlu"]; ?></div>
                <div class="e_text"><?php echo $event["continut"]; ?></div>
                <div class="e_text"><span style="font-weight: bold;">Ora: </span><?php echo $event['ora_inceput'].' - '.$event['ora_sfarsit']; ?></div>
                <?php if(isset($event['invitat_predica'])):?>
                <div class="e_text"><span style="font-weight: bold;">Vorbitor: </span><?php echo $event['invitat_predica']; ?></div>
                <?php endif;?>
                <?php if(isset($event['invitat_lauda'])):?>
                <div class="e_text"><span style="font-weight: bold;">Lauda si inchinare: </span><?php echo $event['invitat_lauda']; ?></div>
                <?php endif;?>
                <?php if(isset($event['organizator'])):?>
                <?php if(isset($event['site_organizator'])):?>
                    <a href=" <?php echo $event['site_organizator']; ?>">
                        <div class="e_text"><?php echo $event['organizator']; ?></div>
                    </a>
                    <?php else: ?>
                    <div class="e_text"><?php echo $event['organizator']; ?></div>
                    <?php endif;?>
                <?php endif;?>



            </div>

            <div class="clearLeft"></div>

            <div class="FooterLine" style="margin: 20px 0 20px 0;"></div>
            <?php endforeach; ?>
        <?php else: ?>

        <?php

        if ($urmatoare != null): ?>
            <div class="p_text" style="margin-bottom: 20px;">
                <div class="i_title">
                    Urmatoarele evenimente
                </div>
            </div>     <div class="clearBoth"></div>


            <?php foreach ($urmatoare as $urm): ?>
                <?php list($y, $m, $d) = explode('-', $urm["data"]);?>




                 <div class="badge-data">
                  <p class="ziua"><?php echo $d;?></p>
                  <p  style="margin-top: 15px;"><?php echo prepareLunaName($m);?></p>
                  <p ><?php echo $y;?></p>
                 </div>


                   <div style="float:left; width:590px; margin-left: 15px;">
                        <div class="e_titlu"><?php echo $urm["titlu"]; ?></div>
                        <div class="e_text"><?php echo $urm["continut"]; ?></div>
                        <div class="e_text"><span style="font-weight: bold;">Ora: </span><?php echo $urm['ora_inceput'].' - '.$urm['ora_sfarsit']; ?></div>
                       <?php if(isset($urm['invitat_predica'])):?>
                        <div class="e_text"><span style="font-weight: bold;">Vorbitor: </span><?php echo $urm['invitat_predica']; ?></div>
                            <?php endif;?>
                <?php if(isset($urm['invitat_lauda'])):?>
                        <div class="e_text"><span style="font-weight: bold;">Lauda si inchinare: </span><?php echo $urm['invitat_lauda']; ?></div>
                       <?php endif;?>
                <?php if(isset($urm['organizator'])):?>
                <?php if(isset($urm['site_organizator'])):?>
                       <a href=" <?php echo $urm['site_organizator']; ?>">
                       <div class="e_text"><?php echo $urm['organizator']; ?></div>
                       </a>
                       <?php else: ?>
                           <div class="e_text"><?php echo $urm['organizator']; ?></div>
                       <?php endif;?>
                       <?php endif;?>



                    </div>

                <div class="clearLeft"></div>

                <div class="FooterLine" style="margin: 20px 0 20px 0;"></div>
                <?php endforeach; ?>

            <?php else: ?>
            <div class="ii_text">Nu exista evenimente urmatoare</div>
            <?php endif; ?>
        <?php endif; ?>
        <div class="clearBoth"></div>
    </div>

    <div id="right">
        <?php echo $calendar; ?>
    </div>

    <div class="clearBoth"></div>
</div>


        