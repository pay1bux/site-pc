

<div class="clearBoth" style="height:10px;"></div>
<div id="PageContent">


    <div id="continut">

        <div id="wrapper_video" ">

            <div id="header_arhiva">
                <div class="p_text">
                    <div class="i_title" style="margin-top: 5px;">Arhiva video</div>
                </div>
                <div class="right_text">
                    <div class="i_title" style="margin-top: 5px; margin-right: 10px;">
                        <a id="buton_cautare_video" class="but_details"  style="float:right; " href="javascript: void(0);"><strong>Caută</strong><span class="i_icon">&nbsp;</span></a>
                        <!-- <button type="button" id="buton_cautare" style="margin-bottom: 5px;">Cauta</button>-->

                        <?php if ($selected == 'cautare'): ?>
                            <input type="text" id="text_cautare_video" class="box_cautare" value="<?php echo $cuvinte?>"/>
                        <?php else: ?>
                            <input type="text" id="text_cautare_video" class="box_cautare" style="float: right; margin-right: 5px;" />
                        <?php endif ?>
                       </div>
                </div>
            </div>
            <div class="clear"></div>
            <?php if ( count($video) > 0): ?>
                <div id="video_playlist" >





<br/>
<br/>
<br/>
<br/>
<br/>
<br/> <?php if ($selected == 'cele-mai-noi'): ?>
<br/>

                    <div class="p_text" style="margin-top: -20px;">
                        <div class="i_title" >Ultima inregistrare</div>
                    </div>
                    <div style=" margin-left: 25px;  "  >
                        <div align="center" id="blcPlayer">
                </div>
                        <script type="text/javascript" src="http://embed.bisericilive.com/get?cid=poartaceruluiro&w=625&h=351"></script>

                    </div>
                    <div class="audioline_playlist" style="margin: 15px 0 15px 15px;"></div>

                    <?php endif;?>
                                            <ul>



                                            <?php if ($video != null): ?>
                                                <?php foreach ($video as $i => $playlistItem): ?>

                                                    <li>
                                                        <div class="videoclip">
                                                        <img src="<?php echo FOLDER_THUMB_VIDEO.$playlistItem['thumb'];?>" />
                                                            <div class="videoclip_text">
                                                        <p class="titlu"><span style="font-size: 14px;"><?php echo $playlistItem["data"] ?></span> </p>
                                                        <p class="titlu"><?php echo cropText( "Predica ". $playlistItem["nume_autor"], 30 )?></p>
                                                        <p class="titlu"><?php echo  $playlistItem["titlu"] ?></p>
                                                        </div>
                                                        </div>
                                                    </li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>

                                            </ul>
                    <div class="clearBoth"></div>

                    <div class="paginare" style="  margin-top: 25px;">
                        <?php
                        if (isset($paginare)) {
                            echo $paginare;
                        }
                        ?>
                    </div>


                </div>
            <?php else: ?>
            <div id="video_playlist">
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
            <div id="video_categories">
                <ul id="video">
                    <?php $i = 0;?>
                    <?php if ($selected == 'cautare'): ?>
                        <li><a href="" class="selected"><?php echo $cautare_total?> rezultate ale cautare</a>
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

            </div>

        <div class="clear"></div>

    </div>
    </div>

</div>


<div class="clearBoth"></div>
