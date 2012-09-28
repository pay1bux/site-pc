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
        <ul class="gallery clearfix">
        <?php foreach ($buletine as $buletin): ?>
        <div class="buletin">
<?php

            $fisier = end(explode('/', $buletin['url']));
            $numele= explode('.', $fisier);

            $dir = base_url()."uploads/imagini-buletine/".$numele[0]."-p";

            $images = glob($dir . "*.png");


            ?>

        <a href="<?php echo BASE_URL . $buletin['url']; ?>">

        <img src="<?php echo BASE_URL . $buletin['thumb']; ?>" class="thumb_buletin"
             alt="<?php echo $buletin['thumb']; ?>"/>
            </a>
            <?php

            foreach($images as $image)
            {
                ?>
                <li><a href="<?php echo $image;?>" rel="prettyPhoto[gallery2]">IMAGINEA</a></li>

                <?php
            }
?>


            <p class="data"><?php echo prepareDateWithYear($buletin['data']); ?></p>
           <a href="<?php echo BASE_URL . $buletin['url']; ?>" style="position: absolute; bottom: 10px;  "><img src="<?php echo IMAGES_PATH;?>/player-audio/download.png" /></a>




        </div>
        <?php endforeach; ?>
        </ul>


        <div class="paginare" style="  margin-top: 550px;">
            <?php
            if (isset($paginare)) {
                echo $paginare;
            }
            ?>
        </div>
    </div>



    <div id="right">
        <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/1.png)"></div>
        <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/2.png)"></div>
        <div class="item" style="background-image: url(<?php echo IMAGES_PATH; ?>right/3.png)"></div>
    </div>

    <div class="clearBoth"></div>
</div>