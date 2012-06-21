<script type="text/javascript">
    //<![CDATA[

    $(document).ready(function () {

        $('#scrollbar1').tinyscrollbar({ sizethumb: 50 });

        // Local copy of jQuery selectors, for performance.
        var my_jPlayer = $("#jquery_jplayer"),
                my_trackName = $(".jp-track-name");

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
            wmode:"window"
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
                    my_trackName.text(item.next("span").text());
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
                my_trackName.text($(this).next("span").text());
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

            <div id="header_audio">
                <div class="p_text">
                    <div class="i_title" style="margin-top: 15px; margin-left: 10px;">Arhiva audio</div>
                </div>
            </div>
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
                            <div class="jp-track-name"></div>
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
                                                    <a href="<?php echo($playlistItem["url"]) ?>"
                                                       class="track<?php if ($i == 0) echo " track-default"?>">&nbsp;</a>
                                                    <span class="titlu"><?php echo(cropText($playlistItem["titlu"] . " - " . $playlistItem["nume_autor"], 50)) ?></span>
                                                    <span class="download"><a href="<?php echo($playlistItem["url"]) ?>" style="padding-left:2px; margin-left: 2px;"><img src="<?php echo IMAGES_PATH;?>/player-audio/download.png" /></a></span>
                                                    <span class="durata"> <?php echo(sec2hms($playlistItem["durata"])) ?></span>
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
            <div id="audio_categories">
                <ul id="audio">
                    <li><a href="<?php echo site_url("arhiva-audio") ?>" tabindex="1" <?php if ($selected == 'celeMaiNoi') echo 'class="selected"'; ?>>Cele mai noi</a>

                        <div class="audioline"></div>
                    </li>
                    <li><a href="<?php echo site_url("arhiva-audio/cele-mai-ascultate") ?>" tabindex="2" <?php if ($selected == 'celeMaiAscultate') echo 'class="selected"'; ?>>Cele mai ascultate</a>

                        <div class="audioline"></div>
                    </li>
                    <li><a href="<?php echo site_url("arhiva-audio/predici") ?>" tabindex="3" <?php if ($selected == 'predici') echo 'class="selected"'; ?>>Predici</a>

                        <div class="audioline"></div>
                    </li>
                    <li><a href="<?php echo site_url("arhiva-audio/studii") ?>" tabindex="4" <?php if ($selected == 'studii') echo 'class="selected"'; ?>>Studii</a>

                        <div class="audioline"></div>
                    </li>
                    <li><a href="<?php echo site_url("arhiva-audio/muzica") ?>" tabindex="5" <?php if ($selected == 'muzica') echo 'class="selected"'; ?>>Muzica</a>

                        <div class="audioline"></div>
                    </li>
                    <li><a href="<?php echo site_url("arhiva-audio/poezii") ?>" tabindex="6" <?php if ($selected == 'poezii') echo 'class="selected"'; ?>>Poezii</a>

                        <div class="audioline"></div>
                    </li>
                    <li><a href="<?php echo site_url("arhiva-audio/marturii") ?>" tabindex="7" <?php if ($selected == 'marturii') echo 'class="selected"'; ?>>Marturii</a>

                        <div class="audioline"></div>
                    </li>
                    <li><a href="<?php echo site_url("arhiva-audio/diverse") ?>" tabindex="8" <?php if ($selected == 'diverse') echo 'class="selected"'; ?>>Diverse</a>

                        <div class="audioline"></div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>


</div>


<div class="clearBoth"></div>
