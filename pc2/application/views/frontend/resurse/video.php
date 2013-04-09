<script type="text/javascript" charset="utf-8">
    $(document).ready(function () {
        $("area[rel^='prettyPhoto']").prettyPhoto();

        $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal', theme:'dark_rounded', slideshow:50, autoplay_slideshow:false, allow_resize:false, default_width: 750, default_height: 480});
        $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',theme:'dark_rounded', slideshow:50, hideflash:true, allow_resize: false, default_width: 750, default_height: 480});

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


    <div id="continut">

        <div id="wrapper_video"  ">

        <div id="header_arhiva">
            <div class="p_text">
                <div class="i_title" style="margin-top: 5px;">Arhiva video</div>
            </div>
            <div class="right_text">
                <div class="i_title" style="margin-top: 5px; margin-right: 10px;">
                    <a id="buton_cautare_video" class="but_details" style="float:right; "
                       href="javascript: void(0);"><strong>Caută</strong><span class="i_icon">&nbsp;</span></a>
                    <!-- <button type="button" id="buton_cautare" style="margin-bottom: 5px;">Cauta</button>-->

                    <?php if ($selected == 'cautare'): ?>
                    <input type="text" id="text_cautare_video" class="box_cautare" value="<?php echo $cuvinte?>"/>
                    <?php else: ?>
                    <input type="text" id="text_cautare_video" class="box_cautare"
                           style="float: right; margin-right: 5px;"/>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
        <?php if (count($video) > 0): ?>
        <?php     if (isset($ultimul)): ?>
        <div id="video_playlist" style="height: 1195px;">
            <?php else: ;?>
        <div id="video_playlist">
            <?php endif;?>
            <br/> <?php

    if (isset($ultimul)): ?>

            <br/>

            <div class="p_text" style="margin-top: 40px;">
                <div class="i_title">Ultima înregistrare</div>
            </div>
            <div>
                <div align="center" id="blcPlayer"></div>
                <?php
                    $thumbmare = str_replace("240", "720", $video[0]['thumb']);
                ?>
                <script type="text/javascript"
                        src="http://embed.bisericilive.com/get?cid=poartaceruluiro&w=625&h=351&autoPlay=false&stoppedImage=<?php echo $thumbmare ?>">
				</script>
            </div>
            <div class="audioline_playlist" style="margin: 15px 0 15px 15px;"></div>

            <?php endif;?>

<?php if(isset($ultimul)): ?>
            <ul class="gallery clearfix" >
                <?php else: ?>
                        <ul class="gallery clearfix">
                                        <ul class="gallery clearfix" style="margin-top: 60px;">


        <?php endif;?>
                <?php if ($video != null): ?>
                <?php foreach ($video as $i => $playlistItem): ?>

                    <li>
                        <a href="<?php echo site_url("embed/" . $playlistItem['atasament_id']).'?iframe=true';?>"
                           rel="prettyPhoto[<?php echo 'video-'.$playlistItem['atasament_id']?>]">
                            <div class="videoclip">
                                <div class="videoclip_img">
                                    <?php if (stripos($playlistItem['thumb'], "http://") === FALSE): ?>
                                        <img src="<?php echo FOLDER_THUMB_VIDEO . $playlistItem['thumb'];?>" height="112"/>
                                    <?php else: ?>
                                        <img src="<?php echo $playlistItem['thumb'];?>" height="112"/>
                                    <?php endif; ?>
                                </div>
                                <div class="videoclip_text">
                                    <p class="titlu"><span
                                    style="font-size: 14px;"><?php echo prepareDateWithYear($playlistItem["data"]) ?></span></p>
                                    <p class="titlu"><?php echo  $playlistItem["titlu"] ?></p>
                                    <p class="titlu"><?php echo cropText("Predica " . $playlistItem["nume_autor"], 70)?></p>
                                </div>
                        </div>
                            </a>
                    </li>

                    <?php endforeach; ?>
                <?php endif; ?>
        </ul>

            <div class="clearBoth"></div>

            <div class="paginare" style="  margin-top: 10px;">
                <?php
                if (isset($paginare)) {
                    echo $paginare;
                }
                ?>
            </div>
        </div>
        <?php else: ?>
        <div id="video_playlist">
<br/>
            <div id="jp_container" style="margin-top: 60px;">
                <p style="font-size: 15px; text-align: center;"> Niciun rezultat gasit.</p>
            </div>
        </div>
        <?php endif; ?>
          <?php     if (isset($ultimul)): ?>
        <div id="video_categories" style="height: 1200px;">
            <?php else: ;?>
          <div id="video_categories">
    <?php endif;?>
            <ul id="arhiva">
                <?php $i = 0;?>
                <?php if ($selected == 'cautare'): ?>
                <li><a href="" class="selected"><?php echo $cautare_total?> rezultate ale căutării</a>

                    <div class="audioline"></div>
                </li>
                <?php endif ?>
                <?php foreach ($meniu as $key => $value): ?>
                <li><a href="<?php echo site_url("arhiva-video/" . $key) ?>"
                       tabindex="<?echo $i++; ?>" <?php if ($selected == $key) echo 'class="selected"'; ?>><?php echo $value["nume"] ?></a>
                    <?php foreach ($submenus as $sub): ?>
                        <?php if ($sub["cod"] == $value["cod"]): ?>
                            <div class="submenu1"><a
                                    href="<?php echo site_url("arhiva-video/" . $key . "/" . $sub["cod_nume"]) ?>" <?php if ($selected_submenus == $sub["cod_nume"]) echo 'class="selected"'; ?>><?php echo $sub["nume"] ?></a>
                            </div>
                            <?php foreach ($albume as $alb): ?>
                                <?php if ($sub["id"] == $alb["parinte"]): ?>
                                    <div class="submenu2"><a
                                            href="<?php echo site_url("arhiva-video/" . $key . "/" . $sub["cod_nume"] . "/" . $alb["cod_nume"]) ?>" <?php if ($selected_albume == $alb["cod_nume"]) echo 'class="selected"'; ?>><?php echo $alb["nume"] ?></a>
                                    </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    <div class="audioline"></div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="clear"></div>
    </div>
</div>

</div>

<div class="clearBoth"></div>
