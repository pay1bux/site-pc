/*	highlightRow jQuery Plug-in v1.3
	Copyright (c) 2009 Andrei Pfeiffer [www.upsidedown.ro]
	
	ATTRIBUTES:
	- highlightColor: "#f5f1bf" - sets the color for the HOVER Event (HEX, 6 digits)
	- highlightColorClick: "#d2ebff" - sets the color for the CLICK Event (HEX, 6 digits)
	- enableClick: true - enable/disable to change the color on click (Boolean)
	
	HISTORY:
	- v1.3 (october 2010)
		- added pre-highlighting of checked elements when "enableClick" is set to true
	
	- v1.2 (august 2009)
		- added support for IE8
	
	- v1.1 (june 2009)
		- added support for IE6
	
	- v1.0 (april 2009)
		- pseudo-stable version
		- highlight elements on Hover with define-able colors
		- enable click on element (with color change and check any radio/checkbox input within that element)
	
	USAGE:
	- this was created to hightlight a Table Row (<tr>)
	- set the background-color on the <tr> and DO NOT PUT ANY BACKGROUND-COLOR ON <td>
	
	- default:
		$(document).ready(function(){
			$("table tbody tr").hightlightRow();
		});
	
	- or, customizabile:
		$(document).ready(function(){
			$("table tbody tr").hightlightRow({
				highlightColor: "#e0f0f6",
				highlightColorClick: "#cc0000",
				enableClick: false
			});
		});
	
*/

(function($){  
	$.fn.hightlightRow = function(options) {  
		
		var defaults = {  
			highlightColor: "#f5f1bf",
			highlightColorClick: "#d2ebff",
			enableClick: true
		};  
		var options = $.extend(defaults, options); 
		
		var allElements = $(this);
		
		// browser detect
		var ie6 = false;
		if (navigator.appName == "Microsoft Internet Explorer") { // from v1.2
		//if(typeof document.body.style.maxHeight === "undefined") { // from v1.1
			ie6 = true;
		}
		
		return this.each(function() {
			highlightElement = $(this);
			var defaultBgColor = $(highlightElement).css("background-color"); // taken from CSS
			
			// HOVER event
			$(highlightElement).hover(
				function() {
					var currentBgColor = $(this).css("background-color");
					var currentBgColorHEX = String(convertRGB(currentBgColor));
					
					// Check IE6
					if (ie6==false) {
						if (currentBgColorHEX!=options.highlightColorClick) {
							$(this).css({"background-color":options.highlightColor});
						}
					}
					// IE6 retuns the HEX Color code, not the RGB, so we do not convert
					else {
						if (currentBgColor!=options.highlightColorClick) {
							$(this).css({"background-color":options.highlightColor});
						}
					}
				},
				function() {
					var currentBgColor = $(this).css("background-color");
					var currentBgColorHEX = String(convertRGB(currentBgColor));
					
					var defaultBgColorHEX = String(convertRGB(defaultBgColor));
					
					// Check IE6
					if (ie6==false) {
						if (currentBgColorHEX==options.highlightColor) {
							$(this).css({"background-color":defaultBgColorHEX});
						}
					}
					// IE6 retuns the HEX Color code, not the RGB, so we do not convert
					else {
						if (currentBgColor==options.highlightColor) {
							$(this).css({"background-color":defaultBgColor});
						}
					}
				}
			);
			
			// CLICK event
			if (options.enableClick==true) {
				
				// pre-highlight checked elements
				if ($("input:checkbox[checked], input:radio[checked]", this).length>0) {
					$(this).css({"background-color":options.highlightColorClick});
				}
				
				$(highlightElement).click(
					function() {
						
						if ( $("input:radio", this).length>0 ) {
							
							resetAllElements(defaultBgColor);
							
							//$($(this).parent().find(String(highlightElement))).css({"background-color":defaultBgColor});
							$($(this).parent().find(":radio")).attr("checked", "");
							
							$(this).css({"background-color":options.highlightColorClick});
							$(":radio", this).attr("checked", "checked");
							
							var grandTotal = $(".grand-total", this).text();
							$("#grand-total strong").text(grandTotal);
							
						} // end IF (there is a radio input)
						else {
						
							var currentBgColor = $(this).css("background-color");
							
							// Check IE6
							if (ie6==false) {
								var currentBgColorHEX = String(convertRGB(currentBgColor));
								var colorToCheck = currentBgColorHEX;
							}
							// IE6 retuns the HEX Color code, not the RGB, so we do not convert
							else {
								var colorToCheck = currentBgColor;
							}
							
							if (colorToCheck==options.highlightColorClick) {
								// return to unclicked
								$(this).css({"background-color":options.highlightColor});
								$(":checkbox", this).attr("checked", false);
								console.log("x");
							
							} else {
								// set clicked							
								$(this).css({"background-color":options.highlightColorClick});
								$(":checkbox", this).attr("checked", "checked");
								console.log("x");
							}
							
						} // end ELSE (no radio input)
					}
				);
			} // end IF (click enabled)
			
		});
		
		
		function resetAllElements(defaultBgColor) {
			
			$.each(allElements, function(){
				$(this).css({"background-color":defaultBgColor});
			});
		}
		
		
		// converts a string "rgb(0, 70, 255)" to "0070ff"
		function convertRGB(inputColor) {
			//var rgbString = "rgb(0, 70, 255)";
			
			var parts = inputColor.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/);
			// parts now should be ["rgb(0, 70, 255", "0", "70", "255"]
			
			if (parts==null) {
				return "transparent";
			}
			
			delete (parts[0]);
			for (var i = 1; i <= 3; ++i) {
			    parts[i] = parseInt(parts[i]).toString(16);
			    if (parts[i].length == 1) parts[i] = '0' + parts[i];
			}
			var hexString = parts.join(''); // "0070ff"
			
			return "#"+hexString;
		}
		
	};  
})(jQuery);  
