<div class="clearBoth" style="height:10px;" xmlns="http://www.w3.org/1999/html"></div>
<div id="PageContent">
    <div id="header" style="background-image: url(<?php echo IMAGES_PATH; ?>banner/devotional.png)"></div>

    <div id="continut">
        <div class="p_text">
            <div class="i_title" style="margin-bottom: 0px;"><?php echo $devotionale[0]['titlu'];?></div>
            <div class="i_details">
                <p class="mic"><?php echo prepareDateWithYear($devotionale[0]['data']) ?> -
                    <a href="<?php echo site_url("devotional/autor/" . $devotionale[0]['nume_autor']);?>" style="text-decoration: underline; display: inline; font-size: 12px;"><?php echo $devotionale[0]['nume_autor'];?></a>
                </p>
                <br/>
                <img src="<?php echo BASE_URL . $devotionale[0]['url'];?>" width=150px; align="left"
                     style="padding: 0 10px 10px 0;">

                <p style="text-align: justify;"><?php echo nl2br($devotionale[0]['continut']);?> </p>

                <?php if ($prev != 0): ?>
                <p align="left">
                    <a class="buton_prev"
                       href="<?php echo linkDevotional($prev["titlu"], $prev['id']); ?>"/> &laquo; <?php echo $prev['titlu']; ?> </a>
                </p>
                <?php endif; ?>

                <?php if ($next != 0): ?>
                <p align="right">
                    <a class="buton_next"
                       href="<?php echo linkDevotional($next["titlu"], $next['id']); ?>"/> <?php echo $next['titlu'];?> &raquo; </a>
                </p>
                <?php endif; ?>
            </div>
            <div class="clearBoth"></div>
        </div>
        <div class="clearBoth"></div>
    </div>
    <div id="right">
        <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/3.png)"></div>
        <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/2.png)"></div>
        <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/1.png)"></div>
        <div>
            <p class="mediu">Postări recente</p>

            <div class="ModuleLine"></div>
            <?php
            foreach ($recente as $recent):?>
                <a href="<?php echo linkDevotional($recent["titlu"], $recent['r_id']); ?>"/>   <p
                        class="titluri"><?php echo $recent['titlu'];?></p></a>
                <br/>
                <?php
            endforeach;
            ?>
        </div>
    </div>
    <div class="clearBoth"></div>
</div>