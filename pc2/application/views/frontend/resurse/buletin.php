<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $("area[rel^='prettyPhoto']").prettyPhoto();

        $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal', theme:'light_square', slideshow:50, autoplay_slideshow:false, allow_resize:false});
        $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',theme:'light_square', slideshow:50, hideflash:true, allow_resize: false});

        $("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
            custom_markup:'<div id="map_canvas" style="width:260px; height:265px"></div>',
            changepicturecallback:function () {
                initialize();
            }
        });

        $("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
            custom_markup:'<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
            changepicturecallback:function () {
                _bsap.exec();
            }
        });
    });
</script>

<div class="clearBoth" style="height:10px;"></div>
<div id="PageContent">
<div style="background-color: #f9f9f9; height:305px; width: 939px; ">
        <ul class="gallery clearfix">
            <?php for ($i = 1; $i <= 4; $i++): ?>
            <li>
                <a href="<?php echo BASE_URL . FOLDER_IMAGINI_BULETINE . basename($bcurent[0]['url'], '.pdf') . "-pag" . $i . ".png";?>"
                   rel="prettyPhoto[<?php echo basename($bcurent[0]['url'], '.pdf');?>-curent]"><img
                    src="<?php echo BASE_URL . FOLDER_IMAGINI_BULETINE . basename($bcurent[0]['url'], '.pdf') . "-pag" . $i . ".png";?>"
                    class="buletin_curent" style="border: 1px solid #d8d8d8; "/>
                </a>
            </li>
            <?php endfor; ?>
        </ul>
</div>

    <div id="continut">

            <?php foreach ($buletine as $buletin): ?>
                <div class="buletin">

                    <img src="<?php echo BASE_URL . $buletin['thumb'];?>" class="thumb_buletin"/>

                    <div style="float:left; width:160px; ">
                        <p><?php echo $buletin['titlu']; ?></p>

                        <p class="data" style="margin-bottom: 20px;"><?php echo prepareDateWithYear($buletin['data']); ?></p>

                        <a href="<?php echo BASE_URL . $buletin['url']; ?>"
                           ><img
                            src="<?php echo IMAGES_PATH;?>/player-audio/download.png" style="float:left;" /></a>



                        <ul class="gallery clearfix">
                            <li  style="float:left; margin-left: 10px;">
                                <a
                                    href="<?php echo BASE_URL . FOLDER_IMAGINI_BULETINE . basename($buletin['url'], '.pdf') . "-pag1.png";?>"
                                    rel="prettyPhoto[<?php echo basename($buletin['url'], '.pdf');?>]"
                                    ><img
                                    src="<?php echo IMAGES_PATH;?>/buttons/citeste.png" style="float:left;"/></a>
                            </li>
                            <?php for ($i = 2; $i <= 4; $i++): ?>
                            <li><a
                                href="<?php echo BASE_URL . FOLDER_IMAGINI_BULETINE . basename($buletin['url'], '.pdf') . "-pag" . $i . ".png";?>"
                                rel="prettyPhoto[<?php echo basename($buletin['url'], '.pdf');?>]"></a></li>
                            <?php endfor; ?>
                        </ul>

                    </div>
                </div>
            <?php endforeach; ?>


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