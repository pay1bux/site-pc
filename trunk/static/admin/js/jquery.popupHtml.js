/*
 * HTML Popup script 
 * powered by jQuery (http://www.jquery.com)
 * 
 * written by Andrei Pfeiffer (http://www.upsidedown.ro)
 * based on Alen Grakalic (http://cssglobe.com) tooltip scripts
 *
 */
 


this.popupHtml = function(){	
	/* CONFIG */		
		xOffsetHtml = 30;
		yOffsetHtml = -200;		
		// these 2 variable determine popup's distance from the cursor
		// you might want to adjust to get the right result		
	/* END CONFIG */		
	
	$(".popup-html").hover(function(e){											  
		this.t = this.title;
		this.title = "";
		var content = $("." + this.t).html();
		//alert(content)
		$("body").append("<div id='popup-html'>"+ content +"</div>");
		$("#popup-html")
			.css("top",(e.pageY + yOffsetHtml) + "px")
			.css("left",(e.pageX + xOffsetHtml) + "px")
			.show();		
    },
	function(){
		this.title = this.t;		
		$("#popup-html").remove();
    });	
	$(".popup-html").mousemove(function(e){
		$("#popup-html")
			.css("top",(e.pageY + yOffsetHtml) + "px")
			.css("left",(e.pageX + xOffsetHtml) + "px");
	});			
};



// starting the script on page load
$(document).ready(function(){
	popupHtml();
});