<script type="text/javascript" charset="utf-8">
    $(document).ready(function(){
        $("area[rel^='prettyPhoto']").prettyPhoto();

        $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:50, autoplay_slideshow: false});
        $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:50, hideflash: true});

        $("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
            custom_markup: '<div id="map_canvas" style="width:260px; height:265px"></div>',
            changepicturecallback: function(){ initialize(); }
        });

        $("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
            custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
            changepicturecallback: function(){ _bsap.exec(); }
        });
    });
</script>

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



       <img src="<?php echo BASE_URL . $buletin['thumb'];?>"  class="thumb_buletin"  />

           <p><?php echo $buletin['titlu']; ?></p>
            <li><a href="<?php echo BASE_URL . FOLDER_IMAGINI_BULETINE . basename($buletin['url'], '.pdf') . "-pag1.png";?>" rel="prettyPhoto[<?php echo basename($buletin['url'], '.pdf');?>]" style="position: absolute; bottom: 10px; left: 165px;"><img src="<?php echo IMAGES_PATH;?>/player-audio/download.png" /></a></li>

            <?php

            for($i=2;$i<=4;$i++)
            {
                ?>
                <li><a href="<?php echo BASE_URL . FOLDER_IMAGINI_BULETINE . basename($buletin['url'], '.pdf') . "-pag".$i.".png";?>" rel="prettyPhoto[<?php echo basename($buletin['url'], '.pdf');?>]"></a></li>

                <?php
            }

?>


            <p class="data"><?php echo prepareDateWithYear($buletin['data']); ?></p>
           <a href="<?php echo BASE_URL . $buletin['url']; ?>" style="position: absolute; bottom: 10px; left: 95px; "><img src="<?php echo IMAGES_PATH;?>/player-audio/download.png" /></a>




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