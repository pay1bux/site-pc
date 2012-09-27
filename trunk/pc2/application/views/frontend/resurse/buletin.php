<div class="clearBoth" style="height:10px;"></div>
<div id="PageContent">
    <div id="buletinGallery" style="width: 670; height: 475;">
        <div class="slider-wrapper theme-default">
            <div clasyys="ribbon"></div>
            <div id="slider" class="nivoSlider">
                <?php foreach ($buletine as $buletin): ?>
                <img src="<?php echo BASE_URL . $buletin['thumb']; ?>"  width="935" height="662"
                     alt="<?php echo $buletin['thumb']; ?>"/>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div id="continut">
        <?php foreach ($buletine as $buletin): ?>
        <div class="buletin">

        <a href="<?php echo BASE_URL . $buletin['url']; ?>">

        <img src="<?php echo BASE_URL . $buletin['thumb']; ?>" class="thumb_buletin"
             alt="<?php echo $buletin['thumb']; ?>"/>
            </a>
           <a href="<?php echo BASE_URL . $buletin['url']; ?>" ><p><?php echo $buletin['titlu']; ?></p></a>
            <p class="data"><?php echo prepareDateWithYear($buletin['data']); ?></p>
           <a href="<?php echo BASE_URL . $buletin['url']; ?>" style="position: absolute; bottom: 10px;  "><img src="<?php echo IMAGES_PATH;?>/player-audio/download.png" /></a>


        </div>


        <?php endforeach; ?>
    </div>

    <div id="right">
        <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/1.png)"></div>
        <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/2.png)"></div>
        <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/3.png)"></div>
    </div>

    <div class="clearBoth"></div>
</div>