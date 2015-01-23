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
            <div class="p_text" style="margin-bottom: 20px;">
                <div class="i_title">
                    Plan de citire a Bibliei
                </div>
            </div>     <div class="clearBoth"></div>

                <div class="badge-data">
                    <p class="ziua"><?php echo $zi;?></p>

                    <p  style="margin-top: 15px;"><?php echo prepareLunaName($luna);?></p>
                    <p ><?php echo $an;?></p>
                </div>

                <div style="float:left; width:590px; margin-left: 15px;">
                    <div class="e_titlu"><?php echo $planSaptamana[0]["titlu"]; ?></div>
                    <div class="e_text"><b>Gând:</b> <?php echo $planSaptamana[0]["gand"]; ?></div>
                    <div class="e_text"><b>Referință:</b> <?php echo $planSaptamana[0]["referinta"]; ?></div>
                    <div class="e_text"><b>De citit azi:</b>
                        <?php foreach($plan as $p) echo $p["referinta"].". "; ?></div>
                </div>

                <div class="clearLeft"></div>
<!---->
<!--                --><?php //if(count($evenimente) != $i+1):?>
<!--                    <div class="FooterLine" style="margin: 20px 0 20px 0;"></div>-->
<!--                --><?php //endif;?>

        <div class="clearBoth"></div>
    </div>

    <div id="right">
        <?php echo $calendar; ?>
    </div>

    <div class="clearBoth"></div>
</div>