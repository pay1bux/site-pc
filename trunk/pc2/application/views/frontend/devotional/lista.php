<?php
$this->load->helper('form');

$dropdown = 'class="dropdown"';
$clear = 'class="cleardefault"';
$buton = 'class="submit"';

?>
<div class="clearBoth" style="height:10px;"></div>
<div id="PageContent">
    <div id="header" style="background-image: url(<?php echo IMAGES_PATH; ?>banner/devotional.png)"></div>
    <div id="continut">
        <?php  foreach ($devotionale as $devotional): ?>
        <div class="articol">

            <img src="<?php echo BASE_URL . $devotional['thumb'];?>" class="imgdev">

            <div class="p_text" style="margin-top: 0px; float:left; width: 487px;">
                <a href="<?php echo linkDevotional($devotional["titlu"], $devotional["r_id"]);  ?>">
                    <div class="i_title" style="margin-bottom: 0;"><?php echo myTruncate($devotional['titlu'], 39, " ");?></div>
                </a>

                <div class="i_details">
                    <p class="mic"><?php echo  prepareDateWithYear($devotional['data'])?> -
                        <a href="<?php echo site_url("devotional/autor/" . $devotional['nume_autor']);?>" style="text-decoration: underline; display: inline; font-size: 12px;"><?php echo $devotional['nume_autor'];?></a>
                    </p> <br/>

                    <p class="mic intins"><?php echo  myTruncate($devotional['continut'], 250, " "); ?></p>
                    <a href="<?php echo linkDevotional($devotional["titlu"], $devotional["r_id"]);  ?>">
                        <p class="mic" style="text-align: right; text-decoration: underline;">Citește articolul</p>
                    </a>
                </div>
            </div>
        </div>
        <div class="clearBoth"></div>
        <?php endforeach;?>

        <div class="paginare" style="  margin-top: 25px;">
            <?php
            if (isset($paginare)) {
                echo $paginare;
            }
            ?>
        </div>

    </div>

    <div id="right">
        <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/3.png)"></div>
        <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/2.png)"></div>
        <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/1.png)"></div>
    </div>

    <div class="clearBoth"></div>
</div>


        