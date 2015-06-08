<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Radio</title>
    <script src="<?php echo JS_PATH; ?>/jquery-1.4.4.min.js" type="text/javascript"></script>
    <script src="<?php echo JS_PATH; ?>/jquery.showinfo.js" type="text/javascript"></script>
    <script src="<?php echo JS_PATH; ?>/jqModal.js" type="text/javascript"></script>
    <script src="<?php echo JS_PATH; ?>jquery.jplayer.min.js" type="text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/themes/smoothness/jquery-ui.css" rel="stylesheet" type="text/css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>
    <link href="<?php echo CSS_PATH; ?>airtime-widgets.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_PATH; ?>radio-expand.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo CSS_PATH; ?>poartacerului.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript">
        //<![CDATA[
        $(document).ready(function(){
            $("#jquery_jplayer_1").jPlayer({
                ready: function (event) {
                    $(this).jPlayer("setMedia", {
                        mp3:"http://89.238.218.26:8000/airtime_128"
                    }).jPlayer("play");;
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
            $("#radioPlayer").airtimeLiveTrackInfo({
                sourceDomain: "http://89.238.218.26:6010/",
                text: {onAirNow:"", offline:"Offline", current:"Acum", next:"Urmeaza"},
                updatePeriod: 20 //seconds
            });
            $("#onAirToday").airtimeShowSchedule({
                sourceDomain: "http://89.238.218.26:6010/",
                updatePeriod: 20, //seconds
                showLimit: 10
            });

            //scrollText($('#status-current-show'), $("#liveTrackHolder"));
            scrollText($('#status-current-track'), $("#liveTrackHolder"));
            scrollText($('#status-next-track'), $("#nextTrackHolder"));

            $('#dialog').jqm();
        });
    </script>
</head>
<body>
<div id="radioBox" class="radioBox">

    <div id="jquery_jplayer_1"></div>
    <div id="jp_container_1" class="radioPower">
        <a href="javascript:;" class="jp-mute" tabindex="1" title="mute"><div class="radioMute"></div></a>
        <a href="javascript:;" class="jp-unmute" tabindex="1" title="unmute"><div class="radioUnmute"></div></a>

        <a id="showProgramPopup" href="#" class="jqModal"><div class="showProgramPopup"></div></a>

        <a href="javascript:;" class="jp-play" tabindex="1"><div class="radioPlay"></div></a>
        <a href="javascript:;" class="jp-pause" tabindex="1"><div class="radioPause"></div></a>
    </div>

    <div class="radioInfo">
        <div class="radioTitle">
            <br/>
            Radio Poarta Cerului
        </div>
        <div style="height: 15%"></div>
        <div id="radioPlayer" class="radioPlayer">
            <div id="liveTrackHolder" class="liveTrackHolder">
                <table>
                    <tr><td><div id='status-current-show' class='currentShowName'><br></div></td></tr>
                    <tr><td><div id='status-current-track' class='currentTrackName'><br></div></td></tr>
                </table>
                <div class='currentInfoLabel'>RULEAZA ACUM</div>
            </div>
            <div class="radioSeparator">

            </div>
            <div id="nextTrackHolder" class="nextTrackHolder">
                <table>
                    <tr><td><div style='padding: 3px'><br/></div></td></tr>
                    <tr><td><div id='status-next-track' class='nextTrackName'><br/></div></td></tr>
                </table>
                <div class='nextInfoLabel'>URMEAZA</div>
            </div>
        </div>
        <div style="height: 10%"></div>
    </div>
</div>

<div id="dialog" class="programModal">
    <div class="programTitle" align="center">
        <table style="width:100%; height:100%;">
            <tr>
                <td style="vertical-align:middle;text-align:center;">
                    Program
                </td>
            </tr>
        </table></div>
    <div class="jqmdBC">
        <div id="onAirToday"></div>
    </div>
</div>

</body>
</html>