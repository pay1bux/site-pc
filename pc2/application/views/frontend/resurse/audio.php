<script type="text/javascript">
    //<![CDATA[

    $(document).ready(function () {

        // Local copy of jQuery selectors, for performance.
        var my_jPlayer = $("#jquery_jplayer"),
            my_trackName = $("#jp_container .track-name"),
            my_playState = $("#jp_container .play-state"),
            my_extraPlayInfo = $("#jp_container .extra-play-info");

        // Some options
        var opt_play_first = false, // If true, will attempt to auto-play the default track on page loads. No effect on mobile devices, like iOS.
            opt_auto_play = true, // If true, when a track is selected, it will auto-play.
            opt_text_playing = "Now playing", // Text when playing
            opt_text_selected = "Track selected"; // Text when not playing

        // A flag to capture the first track
        var first_track = true;

        // Change the time format
        $.jPlayer.timeFormat.padMin = false;
        $.jPlayer.timeFormat.padSec = false;
        $.jPlayer.timeFormat.sepMin = " min ";
        $.jPlayer.timeFormat.sepSec = " sec";

        // Initialize the play state text
        my_playState.text(opt_text_selected);

        // Instance jPlayer
        my_jPlayer.jPlayer({
            ready:function () {
                $("#jp_container .track-default").click();
            },
            timeupdate:function (event) {
                my_extraPlayInfo.text(parseInt(event.jPlayer.status.currentPercentAbsolute, 10) + "%");
            },
            play:function (event) {
                my_playState.text(opt_text_playing);
            },
            pause:function (event) {
                my_playState.text(opt_text_selected);
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
            $(".track").each(function(){
                var item = $(this);
                if (wanted != null) {
                    wanted.removeClass('playing');
                    item.addClass('playing');
                    my_jPlayer.jPlayer("stop");
                    my_jPlayer.jPlayer("setMedia", {
                        mp3:item.attr("href")
                    });
                    my_jPlayer.jPlayer("play");
                    return false;
                }
                if (item.attr('class').indexOf('playing') != -1) {
                    wanted = item;
                }
            });
        }

        function playPrev() {
            var wanted;
            $($(".track").get().reverse()).each(function(){
                var item = $(this);
                if (wanted != null) {
                    wanted.removeClass('playing');
                    item.addClass('playing');
                    my_jPlayer.jPlayer("stop");
                    my_jPlayer.jPlayer("setMedia", {
                        mp3:item.attr("href")
                    });
                    my_jPlayer.jPlayer("play");
                    return false;
                }
                if (item.attr('class').indexOf('playing') != -1) {
                    wanted = item;
                }
            });
        }

        // Create click handlers for the different tracks
        $("#jp_container .track").click(function (e) {
            my_trackName.text($(this).text());
            my_jPlayer.jPlayer("setMedia", {
                mp3:$(this).attr("href")
            });
            $(".playing").removeClass("playing");
            $(this).addClass("playing");
            if ((opt_play_first && first_track) || (opt_auto_play && !first_track)) {
                my_jPlayer.jPlayer("play");
            }
            first_track = false;
            $(this).blur();
            return false;
        });

    });
    //]]>
</script>


<div id="wrapper">
    <div class="chenar audio">

        <div class="chenar audioheader">
            <h1 style="line-height: 55px; margin-left: 20px;"> Arhiva Audio</h1>

        </div>
        <div class="chenar audioplayer">
        </div>

        <div id="audiomenu">

            <ul>
                <li><a href="#" tabindex="1">Cele mai noi</a></li>
                <li><a href="#" tabindex="2">Cele mai ascultate</a></li>
                <li><a href="#" tabindex="3">Predici</a></li>
                <li><a href="#" tabindex="4">Muzica</a></li>
                <li><a href="#" tabindex="5">Poezii</a></li>
                <li><a href="#" tabindex="6">Marturii</a></li>
                <li><a href="#" tabindex="7">Diverse</a></li>
            </ul>

            <div id="jquery_jplayer"></div>


            <div id="jp_container">

                <div class="jp-playlist-player">
                    <div class="jp-interface">
                        <ul class="jp-controls">
                            <li><a href="#" id="jplayer_play" class="jp-play" tabindex="1">play</a></li>
                            <li><a href="#" id="jplayer_pause" class="jp-pause" tabindex="1">pause</a></li>
                            <li><a href="#" id="jplayer_stop" class="jp-stop" tabindex="1">stop</a></li>
                            <li><a href="#" id="jp-mute" class="jp-mute" tabindex="1">min volume</a></li>
                            <li><a href="#" id="jp-unmute" class="jp-unmute" tabindex="1">min volume</a></li>
<!--                            <li><a href="#" id="jplayer_volume_max" class="jp-volume-max" tabindex="1">max volume</a>-->
                            </li>
                            <li><a href="#" id="jplayer_previous" class="jp-previous" tabindex="1">previous</a></li>
                            <li><a href="#" id="jplayer_next" class="jp-next" tabindex="1">next</a></li>
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
                        <div id="jplayer_total_time" class="jp-duration"></div>
                    </div>
                    <div id="jplayer_playlist" class="jp-playlist">
                        <ul>
                            <?php foreach ($audio as $i => $playlistItem): ?>
                            <li>
                                <a href="<?php echo($playlistItem["url"]) ?>"
                                   class="track<?php if ($i == 0) echo " track-default"?>">&nbsp;</a>
                                <span><?php echo($playlistItem["titlu"]) ?></span>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="clear"></div>
        </div>
    </div>
</div>