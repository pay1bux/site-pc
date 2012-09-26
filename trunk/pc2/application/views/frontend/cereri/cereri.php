<div class="clearBoth" style="height:10px;"></div>
<div id="PageContent">
    <div id="header" style="background-image: url(<?php echo IMAGES_PATH; ?>banner/despre.png)"></div>

    <div id="continut">

        <div class="p_text">
            <div class="i_title">Cereri de rugaciune</div>
            <div class="i_details">
                <?php  foreach ($cereri as $cerere): ?>
                <p style="margin-bottom: 5px;margin-top: 10px;"><span
                    style="color: #adb164; font-weight: bold;"><?php echo $cerere['nume'];?></span><?php echo ' - ' . $cerere['localitate'] . ' | ' . prepareDateWithYear($cerere['data']);?>
                </p>
                <p><?php echo $cerere['continut'];?></p>

                <?php endforeach;?>
            </div>
            <div>
                <?php
                if (isset($paginare)) {
                    echo $paginare;
                }
                ?>
            </div>
        </div>
    </div>

    <div id="right">
        <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/1.png)"></div>
        <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/2.png)"></div>
        <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/3.png)"></div>
    </div>
</div>

<div class="clearBoth"></div>

