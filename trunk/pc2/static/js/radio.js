    $(document).ready(function () {

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
