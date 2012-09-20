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
        <div>
            <a href="<?php echo BASE_URL . $buletin['url']; ?>">
                <img src="<?php echo BASE_URL . $buletin['thumb']; ?>" width="200" height="142"
                    alt="<?php echo $buletin['thumb']; ?>"/>
            </a>
            <span><?php echo $buletin['titlu']; ?></span>
            <span><a href="<?php echo BASE_URL . $buletin['url']; ?>">Descarca</a></span>
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