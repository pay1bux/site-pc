<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8 />

    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link href="<?php echo CSS_PATH; ?>jplayer.radio.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_PATH; ?>poartacerului.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH; ?>jquery.jplayer.min.js"></script>
    <script type="text/javascript">
        //<![CDATA[
        $(document).ready(function(){

            $("#jquery_jplayer_1").jPlayer({
                ready: function (event) {
                    $(this).jPlayer("setMedia", {
                        mp3:"http://audio.poartaceruluiro.bisericilive.com:8080/poartaceruluiro.mp3"
                    });
                },
                swfPath: "static/js",
                supplied: "mp3",
                wmode: "window",
                smoothPlayBar: true,
                keyEnabled: true
            });
        });
        //]]>
    </script>
</head>
<body>
<div id="radioBox">
    <div class="top"></div>

    <div id="jquery_jplayer_1" class="jp-jplayer"></div>

    <div id="jp_container_1" class="jp-audio">
        <div class="jp-type-single">
            <div class="jp-gui jp-interface">
                <div id="player">
                    <ul class="jp-controls">
                        <li><a href="javascript:;" class="jp-mute" tabindex="1" title="mute">mute</a></li>
                        <li><a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute">unmute</a></li>
                        <li><a href="javascript:;" class="jp-volume-max" tabindex="1" title="max volume">max volume</a></li>
                    </ul>
                    <div class="jp-volume-bar">
                        <div class="jp-volume-bar-value"></div>
                    </div>
                </div>
            </div>
            <div id="playerInfo">
                <div class="jp-gui jp-interface">
                    <ul class="jp-controls" style="width: 73px; float: left;">
                        <li><a href="javascript:;" class="jp-play" tabindex="1">play</a></li>
                        <li><a href="javascript:;" class="jp-pause" tabindex="1">pause</a></li>

                    </ul>
                    <div class="jp-title" style="float:left;">
                        <ul>
                            <li>Asculti: Numai T...</li>
                        </ul>
                    </div>
                </div>
                <div class="clearLeft"></div>

                <div class="jp-no-solution">
                    <span>Update Required</span>
                    To play the media you will need to either update your browser to a recent version or update your <a href="http://get.adobe.com/flashplayer/" target="_blank">Flash plugin</a>.
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>
