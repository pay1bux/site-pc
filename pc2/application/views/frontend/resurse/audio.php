<script type="text/javascript">
//<![CDATA[

$(document).ready(function(){

	// Local copy of jQuery selectors, for performance.
	var	my_jPlayer = $("#jquery_jplayer"),
		my_trackName = $("#jp_container .track-name"),
		my_playState = $("#jp_container .play-state"),
		my_extraPlayInfo = $("#jp_container .extra-play-info");

	// Some options
	var	opt_play_first = false, // If true, will attempt to auto-play the default track on page loads. No effect on mobile devices, like iOS.
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
		ready: function () {
			$("#jp_container .track-default").click();
		},
		timeupdate: function(event) {
			my_extraPlayInfo.text(parseInt(event.jPlayer.status.currentPercentAbsolute, 10) + "%");
		},
		play: function(event) {
			my_playState.text(opt_text_playing);
		},
		pause: function(event) {
			my_playState.text(opt_text_selected);
		},
		ended: function(event) {
			my_playState.text(opt_text_selected);
		},
		swfPath: "<?php echo JS_PATH; ?>",
		cssSelectorAncestor: "#jp_container",
		supplied: "mp3",
		wmode: "window"
	});

	// Create click handlers for the different tracks
	$("#jp_container .track").click(function(e) {
		my_trackName.text($(this).text());
		my_jPlayer.jPlayer("setMedia", {
			mp3: $(this).attr("href")
		});
		if((opt_play_first && first_track) || (opt_auto_play && !first_track)) {
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
    <div class="chenar audio" ">

    <div class="chenar audioheader" >
       <h1 style="line-height: 55px; margin-left: 20px;"> Arhiva Audio</h1>
        
        </div>
    <div class="chenar audioplayer" >
         </div>

    <div id="audiomenu" >

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

    <!-- Using the cssSelectorAncestor option with the default cssSelector class names to enable control association of standard functions using built in features -->

    <div id="jp_container" class="demo-container">
        <ul>
            <li><span>Alege o piesa : </span></li>
            <?php foreach($audio as $i => $playlistItem): ?>
                <li><a href="<?php echo($playlistItem["url"]) ?>" class="track <?php if ($i == 0) echo "track-default"?>"><?php echo($playlistItem["titlu"]) ?></a></li>
                <li> | </li>
            <?php endforeach; ?>

        </ul>

        <div class="jp-progress">
            <div class="jp-seek-bar" style="width: 100%; ">
                <div class="jp-play-bar" style="width: 0%; "></div>

            </div>
        </div>
        <p>
            <span class="play-state"></span> :
            <span class="track-name">nothing</span>
            at <span class="extra-play-info"></span>
            of <span class="jp-duration"></span>, which is
            <span class="jp-current-time"></span>
        </p>
        <ul>
            <li><a class="jp-play" href="#">Play</a></li>
            <li><a class="jp-pause" href="#">Pause</a></li>
            <li><a class="jp-stop" href="#">Stop</a></li>
        </ul>
        <ul>
            <li>volume :</li>
            <li><a class="jp-mute" href="#">Mute</a></li>
            <li><a class="jp-unmute" href="#">Unmute</a></li>
            <li> <a class="jp-volume-bar" href="#">|&lt;----------&gt;|</a></li>
            <li><a class="jp-volume-max" href="#">Max</a></li>
        </ul>
    </div>


<div class="clear"></div>
        