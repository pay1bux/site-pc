<link rel="stylesheet" charset="utf-8" type="text/css" href="<?php echo CSS_PATH; ?>jplayer.blue.monday.css" />
<script type="text/javascript">
    //<![CDATA[

    $(document).ready(function () {

        $('#scrollbar1').tinyscrollbar({ sizethumb: 50 });

        // Local copy of jQuery selectors, for performance.
        var my_jPlayer = $("#jquery_jplayer"),
                my_trackName = $(".jp-track-name-scroll");
                //my_trackName = $(".jp-track-name");

        // Some options
        var opt_play_first = false, // If true, will attempt to auto-play the default track on page loads. No effect on mobile devices, like iOS.
                opt_auto_play = true; // Text when not playing

        // A flag to capture the first track
        var first_track = true;

        // Change the time format
        $.jPlayer.timeFormat.padMin = true;
        $.jPlayer.timeFormat.padSec = true;
        $.jPlayer.timeFormat.sepMin = ":";
        $.jPlayer.timeFormat.sepSec = "";


        // Instance jPlayer
        my_jPlayer.jPlayer({
            ready:function () {
                $("#jp_container .track-default").click();
            },
            play:function (event) {
                $(".track-default").addClass("playing");
            },
            pause:function (event) {
                $(".track-default").removeClass("playing");
            },
            ended:function (event) {
                playNext();
            },
            swfPath:"<?php echo JS_PATH; ?>",
            cssSelectorAncestor:"#jp_container",
            supplied:"mp3",
            cssSelector:{
                play:'.jp-play',
                pause:'.jp-pause',
                stop:'.jp-stop',
                seekBar:'.jp-seek-bar',
                playBar:'.jp-play-bar',
                mute:'.jp-mute',
                unmute:'.jp-unmute',
                volumeBar:'.jp-volume-bar',
                volumeBarValue:'.jp-volume-bar-value',
                volumeMax:'.jp-volume-max',
                currentTime:'.jp-current-time',
                duration:'.jp-duration'
            },
            wmode:"window",
            preload:"none"
        });

        $("#jplayer_previous").click(function () {
            playPrev()
        });

        $("#jplayer_next").click(function () {
            playNext();
        });

        function playNext() {
            var wanted;
            $(".track").each(function() {
                var item = $(this);
                if (wanted != null) {
                    wanted.removeClass('playing');
                    wanted.removeClass('track-default');
                    item.addClass('playing');
                    item.addClass('track-default');
                    my_jPlayer.jPlayer("stop");
                    my_trackName.text(item.next("span").attr('title'));
                    my_jPlayer.jPlayer("setMedia", {
                        mp3:item.attr("href")
                    });
                    my_jPlayer.jPlayer("play");
                    return false;
                }
                if (item.attr('class').indexOf('track-default') != -1) {
                    wanted = item;
                }
            });
        }

        // Create click handlers for the different tracks
        $("#jp_container .track").click(function (e) {

            if ($(this).hasClass("playing")) {
                my_jPlayer.jPlayer("pause");
                $(".playing").removeClass("playing");
            } else {
                my_trackName.text($(this).next("span").attr('title'));
                my_jPlayer.jPlayer("setMedia", {
                    mp3:$(this).attr("href")
                });
                $(".playing").removeClass("playing");
                $(".track-default").removeClass("track-default");
                if (!first_track) {
                    $(this).addClass("playing");
                }
                $(this).addClass("track-default");
                if ((opt_play_first && first_track) || (opt_auto_play && !first_track)) {
                    my_jPlayer.jPlayer("play");
                }
                first_track = false;
                $(this).blur();
            }
            return false;
        });

    });
    //]]>
</script>

<div class="clearBoth" style="height:10px;"></div>
<div id="PageContent">

    <div id="continut">

        <div id="wrapper_audio">

            <div id="header_arhiva">
                <div class="p_text">
                    <div class="i_title" style="margin-top: 5px;">Arhiva audio</div>
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
            <?php if ( count($audio) > 0): ?>
                <div id="audio_playlist">
                    <div id="jquery_jplayer"></div>


                    <div id="jp_container">

                        <div class="jp-playlist-player">
                            <div class="jp-interface">
                                <ul class="jp-controls">
                                    <li><a href="#" id="jplayer_play" class="jp-play" tabindex="1">play</a></li>
                                    <li><a href="#" id="jplayer_pause" class="jp-pause" tabindex="1">pause</a></li>
                                    <!--                            <li><a href="#" id="jplayer_stop" class="jp-stop" tabindex="1">stop</a></li>-->
                                    <li><a href="#" id="jp-mute" class="jp-mute" tabindex="1">min volume</a></li>
                                    <li><a href="#" id="jp-unmute" class="jp-unmute" tabindex="1">min volume</a></li>
                                    <!--                            <li><a href="#" id="jplayer_volume_max" class="jp-volume-max" tabindex="1">max volume</a></li-->

                                    <!--                            <li><a href="#" id="jplayer_previous" class="jp-previous" tabindex="1">previous</a></li>-->
                                    <!--                            <li><a href="#" id="jplayer_next" class="jp-next" tabindex="1">next</a></li>-->
                                </ul>
                                <ul id="trackName">

<li class="jp-track-name-scroll"></li>
                                     </ul>

                                <div class="jp-progress">
                                    <div id="jplayer_seek_bar" class="jp-seek-bar">
                                        <div id="jplayer_play_bar" class="jp-play-bar"></div>
                                    </div>
                                </div>
                                <div id="jplayer_volume_bar" class="jp-volume-bar">
                                    <div id="jplayer_volume_bar_value" class="jp-volume-bar-value"></div>
                                </div>
                                <div id="jplayer_play_time" class="jp-current-time"></div>
                                <div id="jplayer_time_separator" class="jp-time-separator"> / </div>
                                <div id="jplayer_total_time" class="jp-duration"></div>
                            </div>
                            <div id="scrollbar1">
                                <div class="scrollbar"><div class="tracking"><div class="thumb"><div class="end"></div></div></div></div>
                                <div class="viewport">
                                    <div class="overview">
                                        <div id="jplayer_playlist" class="jp-playlist">
                                            <ul>
                                            <?php if ($audio != null): ?>
                                                <?php foreach ($audio as $i => $playlistItem): ?>
                                                    <li>
                                                        <div class="audioline_playlist"></div>
                                                        <a href="<?php echo site_url("playonline/" . $playlistItem["atasament_id"]) ?>"
                                                           class="track<?php if ($i == 0) echo " track-default"?>">&nbsp;</a>
                                                        <span title="<?php echo $playlistItem["titlu"] . " - " . $playlistItem["nume_autor"];?>" class="titlu"><?php echo(cropText($playlistItem["titlu"] . " - " . $playlistItem["nume_autor"], 44)) ?></span>
                                                        <span class="download"><a href="<?php echo site_url("download/" . $playlistItem["atasament_id"]) ?>" style="padding-left:2px; margin-left: 2px;"><img src="<?php echo IMAGES_PATH;?>/player-audio/download.png" /></a></span>
                                                        <span class="durata"> <?php echo(sec2hms($playlistItem["durata"])) ?></span>
                                                       <?php if($playlistItem["data"] != 0000-00-00):?>
                                                        <span class="audio_date" > <?php echo prepareDateDMY($playlistItem["data"]); ?></span>
                                                        <?php endif;?>

                                                    </li>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php else: ?>
            <div id="audio_playlist">
                <br />
                <div id="jp_container" style="margin-top: 60px;">

             <p style="font-size: 15px; text-align: center;">Niciun rezultat găsit.</p>
                </div>
            </div>
            <?php endif; ?>
            <div id="audio_categories">
                <ul id="arhiva">
                    <?php $i = 0;?>
                    <?php if ($selected == 'cautare'): ?>
                        <li><a href="" class="selected"><?php echo count($audio)?> rezultate ale căutării</a>
                            <div class="audioline"></div>
                        </li>
                    <?php endif ?>
                    <?php foreach($meniu as $key => $value): ?>
                        <li><a href="<?php echo site_url("arhiva-audio/" . $key) ?>" tabindex="<?echo $i++; ?>" <?php if ($selected == $key) echo 'class="selected"'; ?>><?php echo $value["nume"] ?></a>
                            <?php foreach ($submenus as $sub): ?>
                                <?php if ($sub["cod"] == $value["cod"]): ?>
                                    <div class="submenu1"><a href="<?php echo site_url("arhiva-audio/" . $key . "/" . $sub["cod_nume"]) ?>" <?php if ($selected_submenus == $sub["cod_nume"]) echo 'class="selected"'; ?>><?php echo $sub["nume"] ?></a></div>
                                    <?php foreach ($albume as $alb): ?>
                                        <?php if ($sub["id"] == $alb["parinte"]): ?>
                                            <div class="submenu2"><a href="<?php echo site_url("arhiva-audio/" . $key . "/" . $sub["cod_nume"] . "/" . $alb["cod_nume"]) ?>" <?php if ($selected_albume == $alb["cod_nume"]) echo 'class="selected"'; ?>><?php echo $alb["nume"] ?></a></div>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            <div class="audioline"></div>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>

</div>

<div class="clearBoth"></div>
