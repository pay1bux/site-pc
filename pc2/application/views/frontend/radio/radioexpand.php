<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Radio</title>
    <script src="<?php echo JS_PATH; ?>/jquery-1.4.4.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_PATH; ?>/jquery.showinfo.js" type="text/javascript"></script>
<!--    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>-->
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <script type="text/javascript" src="<?php echo JS_PATH; ?>jquery.jplayer.min.js"></script>
    <link href="<?php echo CSS_PATH; ?>/airtime-widgets.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_PATH; ?>jplayer.radio.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_PATH; ?>poartacerului.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        //<![CDATA[
        $(document).ready(function(){
            $("#jquery_jplayer_1").jPlayer({
                ready: function (event) {
                    $(this).jPlayer("setMedia", {
                        mp3:"http://89.238.218.26:8000/airtime_128"
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
    <script>
        $(document).ready(function() {
            $("#headerLiveHolder").airtimeLiveInfo({
                sourceDomain: "https://89.238.218.26:600/",
                text: {onAirNow:"Ruleaza acum", offline:"Offline", current:"Acum", next:"Urmeaza"},
                updatePeriod: 20 //seconds
            });
            $("#onAirToday").airtimeShowSchedule({
                sourceDomain: "https://89.238.218.26:600/",
                text: {onAirToday:"Programul de azi"},
                updatePeriod: 20, //seconds
                showLimit: 10
            });
        });
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
                            <li id="headerLiveHolder">RADIO OFFLINE</li>
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
<br/>
<!--<div id="headerLiveHolder" style="border: 1px solid #999999; padding: 10px;"></div>-->
<br/>
<div id="onAirToday"></div>
<br/>
<br/>

</body>
</html>
