

<div class="clearBoth" style="height:10px;"></div>
<div id="PageContent">


    <div id="continut">

        <div id="wrapper_arhiva" ">

            <div id="header_arhiva">
                <div class="p_text">
                    <div class="i_title" style="margin-top: 5px;">Arhiva video</div>
                </div>
                <div class="right_text">
                    <div class="i_title" style="margin-top: 5px; margin-right: 10px;">
                        <a id="buton_cautare_audio" class="but_details"  style="float:right; " href="javascript: void(0);"><strong>Caută</strong><span class="i_icon">&nbsp;</span></a>
                        <!-- <button type="button" id="buton_cautare" style="margin-bottom: 5px;">Cauta</button>-->

                        <?php if ($selected == 'cautare'): ?>
                            <input type="text" id="text_cautare_audio" class="box_cautare" value="<?php echo $cuvinte?>"/>
                        <?php else: ?>
                            <input type="text" id="text_cautare_audio" class="box_cautare" style="float: right; margin-right: 5px;" />
                        <?php endif ?>
                       </div>
                </div>
            </div>
            <div class="clear"></div>
            <?php if ( count($video) > 0): ?>
                <div id="arhiva_playlist">





<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
                                            <ul>
                                            <?php if ($video != null): ?>
                                                <?php foreach ($video as $i => $playlistItem): ?>
                                                    <li>
                                                        <div class="audioline_playlist"></div>
                                                        <a href="<?php echo site_url("download/" . $playlistItem["atasament_id"]) ?>"
                                                           class="track<?php if ($i == 0) echo " track-default"?>">&nbsp;</a>
                                                        <span class="titlu"><?php echo(cropText($playlistItem["titlu"] . " - " . $playlistItem["nume_autor"], 50)) ?></span>
                                                        <span class="download"><a href="<?php echo site_url("download/" . $playlistItem["atasament_id"]) ?>" style="padding-left:2px; margin-left: 2px;"><img src="<?php echo IMAGES_PATH;?>/player-audio/download.png" /></a></span>
                                                        <span class="durata"> <?php echo(sec2hms($playlistItem["durata"])) ?></span>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            </ul>




                </div>
            <?php else: ?>
            <div id="audio_playlist">
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <div id="jp_container">
             <p style="font-size: 15px; text-align: center;"> Nici un rezultat gasit.</p>
                </div>
            </div>
            <?php endif; ?>
            <div id="audio_categories">
                <ul id="audio">
                    <?php $i = 0;?>
                    <?php if ($selected == 'cautare'): ?>
                        <li><a href="" class="selected"><?php echo count($video)?> rezultate ale cautare</a>
                            <div class="audioline"></div>
                        </li>
                    <?php endif ?>
                    <?php foreach($meniu as $key => $value): ?>
                        <li><a href="<?php echo site_url("arhiva-video/" . $key) ?>" tabindex="<?echo $i++; ?>" <?php if ($selected == $key) echo 'class="selected"'; ?>><?php echo $value["nume"] ?></a>
                            <?php foreach ($submenus as $sub): ?>
                                <?php if ($sub["cod"] == $value["cod"]): ?>
                                    <div class="submenu1"><a href="<?php echo site_url("arhiva-video/" . $key . "/" . $sub["cod_nume"]) ?>" <?php if ($selected_submenus == $sub["cod_nume"]) echo 'class="selected"'; ?>><?php echo $sub["nume"] ?></a></div>
                                    <?php foreach ($albume as $alb): ?>
                                        <?php if ($sub["id"] == $alb["parinte"]): ?>
                                            <div class="submenu2"><a href="<?php echo site_url("arhiva-video/" . $key . "/" . $sub["cod_nume"] . "/" . $alb["cod_nume"]) ?>" <?php if ($selected_albume == $alb["cod_nume"]) echo 'class="selected"'; ?>><?php echo $alb["nume"] ?></a></div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="audioline"></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <div class="paginare" style="  margin-top: 25px;">
                    <?php
                    if (isset($paginare)) {
                        echo $paginare;
                    }
                    else
                    {
                        echo 'nu exista paginare';
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

</div>


<div class="clearBoth"></div>
