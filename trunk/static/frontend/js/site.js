$(document).ready(function(){
	
	// Deal of the day
	nrBannerMaxDEAL = $("#banner_header li").size();
	timerDEAL = setTimeout(getNextItemDEAL, intervalDEAL);
	
});


//Deal of the day Slideshow
var currentBannerDEAL = 1;
var nrBannerMaxDEAL;
var timerDEAL;
var intervalDEAL = 7000;
function changeImageDEAL() {
	$("#banner_header li").hide();
	$("#banner_header"+currentBannerDEAL).fadeIn(1000);
}
function getNextItemDEAL() {
	var next;
	if (parseInt(currentBannerDEAL)==parseInt(nrBannerMaxDEAL)) {
		next = 1;
	} else {
		next = currentBannerDEAL + 1;
	}
	currentBannerDEAL = next;
	changeImageDEAL();
	clearTimeout(timerDEAL);
	timerDEAL = setTimeout(getNextItemDEAL, intervalDEAL);
}