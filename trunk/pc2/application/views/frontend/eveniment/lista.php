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
    <div id="header" style="background-image: url(<?php echo IMAGES_PATH; ?>banner/devotional.png)"></div>
    <div id="continut">
        <div><?php echo getDayName($ziuaSaptamanii)?>, <?php echo prepareDateWithYear($data)?></div>
        <?php if (isset($evenimente) && count($evenimente) > 0): ?>
            <?php foreach ($evenimente as $eveniment): ?>
            <div class="articol">
                <?php if (isset($eveniment['thumb']) && $eveniment['thumb'] != ''): ?>
                    <img class="imgdev" src="<?php echo BASE_URL . "/" . $eveniment['thumb'];?>"/>
                <?php endif; ?>
                <div class="p_text" style="margin-top: 0px;">
                    <div class="i_title" style="margin-bottom: 0;"><?php echo $eveniment['titlu'];?></div>
                    <div class="i_details">
                        <p class="mic"><?php echo $eveniment['continut']; ?></p>
                        <p class="mic">Orele <?php echo $eveniment['ora_inceput']; ?>- <?php echo $eveniment['ora_sfarsit']; ?></p> <br/>
                        <?php if (isset($eveniment['invitat_predica']) && $eveniment['invitat_predica'] != ''): ?>
                            <p class="mic">Invitat: <?php echo $eveniment['invitat_predica']; ?></p> <br/>
                        <?php endif; ?>
                        <?php if (isset($eveniment['invitat_lauda']) && $eveniment['invitat_lauda'] != ''): ?>
                            <p class="mic">Lauda si inchinare: <?php echo $eveniment['invitat_lauda']; ?></p> <br/>
                        <?php endif; ?>
                        <?php if (isset($eveniment['organizator']) && $eveniment['organizator'] != ''): ?>
                            <p class="mic">Organizator: <?php echo $eveniment['organizator']; ?></p> <br/>
                        <?php endif; ?>
                        <?php if (isset($eveniment['site_organizator']) && $eveniment['site_organizator'] != ''): ?>
                            <p class="mic"><a href="<?php echo prep_url($eveniment['site_organizator']); ?>"><?php echo $eveniment['site_organizator']; ?></a> </p> <br/>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="clearBoth"></div>
            <?php endforeach;?>
        <?php else: ?>

        <?php

        if ($urmatoare != null): ?>
            <div class="p_text">
                <div class="i_title">
                    Urmatoarele evenimente
                </div>
            </div>     <div class="clearBoth"></div>

        <table>
            <?php foreach ($urmatoare as $urm): ?>
                <?php list($y, $m, $d) = explode('-', $urm["data"]);?>

                    <tr>
<td>

                 <div class="badge-data">
                  <p class="ziua"><?php echo $d;?></p>
                  <p  style="margin-top: 15px;"><?php echo prepareLunaName($m);?></p>
                  <p ><?php echo $y;?></p>

                 </div>
</td>
                    <td>
                    <div class="i_details">
                        <div class="ii_title"><?php echo $urm["titlu"]; ?></div>
                        <div class="ii_text"><?php echo $urm["continut"]; ?></div>
                    </div>
                    <div class="clearLeft"></div>
                </div>
                </td>
                    </tr>

                <?php endforeach; ?>
            </table>
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


        