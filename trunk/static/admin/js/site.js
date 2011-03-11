var highlightColor = "#def4fd";
var highlightColorClick = "#e8e4a7";

$(document).ready(function(){
	
	$('.delete').click(function(){
		var answer = confirm('Are you sure?');
		return answer; // answer is a boolean
	}); 
	
	$(".highlight-element").hightlightRow({ highlightColor: highlightColor, enableClick: false });
	
	// external links
	$("a[rel='external']").click(function() {
		return !window.open($(this).attr("href"));
	});
	$('.hide-with-js').hide(); // use this class to hide the message "please open this link in new window"
	
	// fade in messages
	$('.successMsg').hide();
	$('.successMsg').fadeIn(1000);
	$('.errorMsg div').hide();
	$('.errorMsg div').fadeIn(1000);
	$('.warningMsg').hide();
	$('.warningMsg').fadeIn(1000);
	$('.hidden').hide();
	
	// non-clickable links
	$(".return-false").click( function() {
		return false;
	});
	
	
	// JUMP MENU
	$("select.jump-menu").change(function(x){
		//var url = $("option:selected", this).attr("title");
		//if (url.length) {
			//window.location.href = url;
		//}
		var id = $("option:selected", this).attr("title");
		$("#form-display-filter" + id).submit();
		
	});
	
	
	// TOGGLE OTHER ATTRIBUTES TABLE
	$("#show-other-attributes").click(function(){
		$("#other-attributes-table").slideToggle();
		if($("#other-attributes-table").attr('rel') != '2')
			$("#show-save-warning").hide();
	});
	
	// TOGGLE SAVE WARNING
	$("#show-warning").click(function(){
		$("#show-save-warning").slideToggle();
	});
	
	// TOGGLE SEARCH
	$(".link-toggle-search").click(function(){
		var currentValue = $("em", this).text();
		var newValue = $(this).attr("rel");
		var status = $("#search-forms").css("display");
		if (status=="block") {
			$("em", this).removeClass("up");
			$("em", this).addClass("down");
		} else {
			$("em", this).removeClass("down");
			$("em", this).addClass("up");
		}
		$("em", this).text(newValue);
		$(this).attr("rel", currentValue);
		$("#search-forms").slideToggle(0);
		
		
		//alert(status);
	});
	
	
	// TOGGLE ALL CHECKBOX
	// toggle all checkboxes within and change label color
	$("input.toggle-all-checkbox").click(function(){
		var status = $(this).attr("checked");
		if (status==true) {
			$(this).parent().find("input:checkbox").attr("checked", true);
			$(this).parent().find("ul label[class!=toggle]").css("color", "#000000");
		} else {
			$(this).parent().find("input:checkbox").attr("checked", false);
			$(this).parent().find("ul label[class!=toggle]").css("color", "#a0a0a0");
		}
	});
	// change label color on individual checkbox
	$(".checkbox-list input:checkbox").click(function(){
		var status = $(this).attr("checked");
		if (status==true) {
			var cssObj = {
				//'font-weight' : 'bold',
				'color' : '#000000'
			}
			$(this).parent().find("label").css(cssObj);
		} else {
			var cssObj = {
				//'font-weight' : 'normal',
				'color' : '#a0a0a0'
			}
			$(this).parent().find("label").css(cssObj);
		}
	});
	// change label color on individual radio
	$(".checkbox-list input:radio").click(function(){
		var cssObjCheck = {
			//'font-weight' : 'bold',
			'color' : '#000000'
		}
		var cssObjUncheck = {
			//'font-weight' : 'normal',
			'color' : '#a0a0a0'
		}
		$(this).parent().parent().parent().find("label").css(cssObjUncheck);
		$(this).parent().find("label").css(cssObjCheck);
	});
	// change label color of checked labels on page load
	$(".checkbox-list input:checked").each(function(){
		var cssObj = {
			//'font-weight' : 'bold',
			'color' : '#000000'
		}
		$(this).parent().find("label").css(cssObj);
	});
	
	
	// BLUE HOVER ON ITEM WRAPPERS
	$(".hover-wrapper").hover(
		function () {
			$(this).css("background-color","#f2f9fc");
		},
		function () {
			$(this).css("background-color","transparent");
		}
	);
	
	// HEADER JUMP BOX
	$("#header .link-jump-box").show();
	$("#header .link-jump-box").click(function(){
		$("#jump-box").toggle();
	});
	$("#jump-box .return-false").click(function(){
		$("#jump-box").hide();
	});
	
	
	// READ MORE
	$("a.read-more").click(function(){
		$(this).parent().parent().find(".read-more-short").hide();
		$(this).parent().parent().find(".read-more-full").show();
		return false;
	});
	$("a.show-less").click(function(){
		$(this).parent().parent().find(".read-more-short").show();
		$(this).parent().parent().find(".read-more-full").hide();
		return false;
	});
	
	
	// clear inputs
	/*$("#form-newsletter input, #form-search input").each(function(i){
		var inputValue = $(this).val();
		
		$(this).focus(function(){ 
			if ($(this).val()==inputValue) {
				$(this).val("");
			}
		});
		$(this).blur(function(){ 
			if ($(this).val()=="") {
				$(this).val(inputValue);
			}
		});
	});*/
	
	
	$("#add_business_image").click(function(){
		var counter = $('#gallery_counter').val();
		counter = parseInt(counter) + 1;
		$.ajax({
	        type: "POST",
	        data: {
	            counter: counter
	        },
	        url: path + "/admin/ajax_action/render_gallery_input",
	        success: function(data){
				$('#selection_wrapper').append(data);
				$('#gallery_counter').val(counter);
	        }
	    });
		return false;
	});
	
	
	var minWidthBody = $("body").css("min-width");
	var minWidthHeader = $("#header").css("min-width");
	var minWidthContent = $("#content-wrapper").css("min-width");
	var minWidthFooter = $("#footer").css("min-width");
	mkwidth(minWidthBody, minWidthHeader, minWidthContent, minWidthFooter);
	
	
	
	$("input.date").datepicker({
		dateFormat: 'mm/dd/yy',
		showAnim: "fadeIn",
		navigationAsDateFormat: true,
		prevText: "< M",
		currentText: "M y",
		nextText: "M >",
		firstDay: 0,
		changeFirstDay: false

	});
	
	
	$.ajaxSetup( { type: "POST" } );
    $(".search-by-state-name").autocomplete(path + 'admin/ajax_action/autocomplete_state_name', {
    	width: 230,
        scrollHeight: 300,
        multiple: false,
        minChars: 2,
        mustMatch: false,
        scroll: true,
        delay: 0,
        selectFirst: false,
        parse: function(data){
					return $.map(eval(data), function(row){
						return {
							data: row,
							value: row,
							result: row
						}
					});
				},
        formatItem: function(item){
						return (item);
					}
    });
	
	
	 $(".search-by-state-area-name").autocomplete(path + 'admin/ajax_action/autocomplete_state_area_name', {
    	width: 230,
        scrollHeight: 300,
        multiple: false,
        minChars: 2,
        mustMatch: false,
        scroll: true,
        delay: 0,
		extraParams: {
			id_state: function(){
						return $('#state_areas_filter_state').val();
					}
			
		},
        selectFirst: false,
        parse: function(data){
					return $.map(eval(data), function(row){
						return {
							data: row,
							value: row,
							result: row
						}
					});
				},
        formatItem: function(item){
						return (item);
					}
    });
	
	$(".search-by-city-name").autocomplete(path + 'admin/ajax_action/autocomplete_city_name', {
    	width: 230,
        scrollHeight: 300,
        multiple: false,
        minChars: 2,
        mustMatch: false,
        scroll: true,
        delay: 0,
		extraParams: {
			id_state: function(){
						return $('#cities_filter_state').val();
					},
			id_state_area: function(){
						return $('#cities_filter_state_area').val();
					}	
			
		},
        selectFirst: false,
        parse: function(data){
					return $.map(eval(data), function(row){
						return {
							data: row,
							value: row,
							result: row
						}
					});
				},
        formatItem: function(item){
						return (item);
					}
    });
	
	
	$(".search-by-client-name").autocomplete(path + 'admin/ajax_action/autocomplete_client_name', {
    	width: 230,
        scrollHeight: 300,
        multiple: false,
        minChars: 2,
        mustMatch: false,
        scroll: true,
        delay: 0,
        selectFirst: false,
        parse: function(data){
					return $.map(eval(data), function(row){
						return {
							data: row,
							value: row,
							result: row
						}
					});
				},
        formatItem: function(item){
						return (item);
					}
		});
		
	$(".search-by-client-ass-name").autocomplete(path + 'admin/ajax_action/autocomplete_customer_name', {
    	width: 230,
        scrollHeight: 300,
        multiple: false,
        minChars: 2,
        mustMatch: false,
        scroll: true,
        delay: 0,
        selectFirst: false,
		extraParams: {
			'type': function() {
				var type = 2;
				return type;
			}
		},
        parse: function(data){
					return $.map(eval(data), function(row){
						return {
							data: row,
							value: row,
							result: row.name
						}
					});
				},
        formatItem: function(item){
						return (item.name);
					}
		}).result(function(event, item) {
			$("#admin_filter_all_assessments_email").val(item.email);
    });	
	
	
	$(".search-by-client-ass-email").autocomplete(path + 'admin/ajax_action/autocomplete_customer_email', {
    	width: 230,
        scrollHeight: 300,
        multiple: false,
        minChars: 2,
        mustMatch: false,
        scroll: true,
        delay: 0,
        selectFirst: false,
		extraParams: {
			'type': function() {
				var type = 2;
				return type;
			}
		},
        parse: function(data){
					return $.map(eval(data), function(row){
						return {
							data: row,
							value: row,
							result: row.email
						}
					});
				},
        formatItem: function(item){
						return (item.email);
					}
		}).result(function(event, item) {
			$("#admin_filter_all_assessments_name").val(item.name);
    });	
	
	
	$(".search-by-business-p-name").autocomplete(path + 'admin/ajax_action/autocomplete_customer_name', {
    	width: 230,
        scrollHeight: 300,
        multiple: false,
        minChars: 2,
        mustMatch: false,
        scroll: true,
        delay: 0,
        selectFirst: false,
		extraParams: {
			'type': function() {
				var type = 1;
				return type;
			}
		},
        parse: function(data){
					return $.map(eval(data), function(row){
						return {
							data: row,
							value: row,
							result: row.name
						}
					});
				},
        formatItem: function(item){
						return (item.name);
					}
		}).result(function(event, item) {
			$("#admin_filter_business_p_email").val(item.email);
    });	
	
	$(".search-by-business-p-email").autocomplete(path + 'admin/ajax_action/autocomplete_customer_email', {
    	width: 230,
        scrollHeight: 300,
        multiple: false,
        minChars: 2,
        mustMatch: false,
        scroll: true,
        delay: 0,
        selectFirst: false,
		extraParams: {
			'type': function() {
				var type = 1;
				return type;
			}
		},
        parse: function(data){
					return $.map(eval(data), function(row){
						return {
							data: row,
							value: row,
							result: row.email
						}
					});
				},
        formatItem: function(item){
						return (item.email);
					}
		}).result(function(event, item) {
			$("#admin_filter_business_p_name").val(item.name);
    });	
	
	
	
	$(".search-by-assessment-keyword").autocomplete(path + 'admin/ajax_action/autocomplete_assessment_name', {
    	width: 230,
        scrollHeight: 300,
        multiple: false,
        minChars: 2,
        mustMatch: false,
        scroll: true,
        delay: 0,
        selectFirst: false,
        parse: function(data){
					return $.map(eval(data), function(row){
						return {
							data: row,
							value: row,
							result: row
						}
					});
				},
        formatItem: function(item){
						return (item);
					}
    });
	
	$(".search-by-business-name").autocomplete(path + 'admin/ajax_action/autocomplete_business_name', {
    	width: 230,
        scrollHeight: 300,
        multiple: false,
        minChars: 2,
        mustMatch: false,
        scroll: true,
        delay: 0,
        selectFirst: false,
        parse: function(data){
					return $.map(eval(data), function(row){
						return {
							data: row,
							value: row,
							result: row
						}
					});
				},
        formatItem: function(item){
						return (item);
					}
    });
	
	
	
	
	$(".search-by-provider-name").autocomplete(path + 'admin/ajax_action/autocomplete_provider_name', {
    	width: 230,
        scrollHeight: 300,
        multiple: false,
        minChars: 2,
        mustMatch: false,
        scroll: true,
        delay: 0,
        selectFirst: false,
        parse: function(data){
					return $.map(eval(data), function(row){
						return {
							data: row,
							value: row,
							result: row
						}
					});
				},
        formatItem: function(item){
						return (item);
					}
    });
	
	
	
	
	$('#check').click(function(){

		$(".boxes").attr('checked', true);

	});
	
	$('#uncheck').click(function(){

		$(".boxes").attr('checked', false);

	});
	
	$("#customer_name").autocomplete(path + 'admin/ajax_action/autocomplete_customer_name', {
    	width: 230,
        scrollHeight: 300,
        multiple: false,
        minChars: 2,
        mustMatch: false,
        scroll: true,
        delay: 0,
        selectFirst: false,
        extraParams: {
			'type': function() {
				return $('#customer_type').val();
			}
		},
        parse: function(data){
					return $.map(eval(data), function(row){
						return {
							data: row,
							value: row,
							result: row.name
						}
					});
				},
        formatItem: function(item){
						return (item.name);
					}
    }).result(function(event, item) {
    	$("#customer_email").val(item.email);
    });


	$("#customer_email").autocomplete(path + 'admin/ajax_action/autocomplete_customer_email', {
    	width: 230,
        scrollHeight: 300,
        multiple: false,
        minChars: 2,
        mustMatch: false,
        scroll: true,
        delay: 0,
        selectFirst: false,
        extraParams: {
			'type': function() {
				return $('#customer_type').val();
			}
		},
        parse: function(data){
					return $.map(eval(data), function(row){
						return {
							data: row,
							value: row,
							result: row.email
						}
					});
				},
        formatItem: function(item){
						return (item.email);
					}
    }).result(function(event, item) {
    	$("#customer_name").val(item.name);
    });
	
});


function mkwidth(minWidthBody, minWidthHeader, minWidthContent, minWidthFooter){
	document.body.style.width = document.body.clientWidth < minWidthBody ? minWidthBody+"px" : "100%";
	document.getElementById("header").style.width = document.getElementById("header").clientWidth < minWidthHeader ? minWidthHeader+"px" : "100%";
	document.getElementById("content-wrapper").style.width = document.getElementById("content-wrapper").clientWidth < minWidthContent ? minWidthContent+"px" : "100%";
	document.getElementById("footer").style.width = document.getElementById("footer").clientWidth < minWidthFooter ? minWidthFooter+"px" : "100%";
};	

function activate_record(id, type){
    $.ajax({
        type: "POST",
        url: path + "admin/ajax_action/activate_" + type,
        data: {
            id: id
        },
		dataType: 'json',
        success: function(data){
            if (data.success) {
                $('#record_' + id).removeClass('active_record');
                $('#record_' + id).addClass('inactive_record');
                $('#record_' + id).html('Hide');
            }
            else {
                $('#record_' + id).removeClass('inactive_record');
                $('#record_' + id).addClass('active_record');
                $('#record_' + id).html('Show');
            }
        }
    });
}


function ajax_states_restrict(country_id, state_id) {
	var selected_country_id = $('#' + country_id).val();
	
	$.ajax({
	    type: "POST",
	    url: path + "/admin/ajax_action/restrict_states",
	    data: {
	        country_id: selected_country_id
	    },
		dataType: 'json',
	    success: function(data){
	    		var options = '';
				for (var i = 0; i < data.length; i++) {
				  options += '<option value="' + data[i].optionValue + '">' + data[i].optionDisplay + '</option>';
				}
				$("select#" + state_id).html(options);
	    }
	});
}


function ajax_state_areas_restrict(id_state, id_state_area, id_city) {
	var selected_state_id = $('#' + id_state).val();
	
	$.ajax({
	    type: "POST",
	    url: path + "/admin/ajax_action/restrict_state_areas",
	    data: {
	        id_state: selected_state_id
	    },
		dataType: 'json',
	    success: function(data){
	    		var options = '';
				for (var i = 0; i < data.length; i++) {
				  options += '<option value="' + data[i].optionValue + '">' + data[i].optionDisplay + '</option>';
				}
				$("select#" + id_state_area).html(options);
				
				if (id_city != '') {
					$("select#" + id_city).html('<option value="">-</option>');
				}	
	    }
	});
}


function ajax_cities_restrict(id_state, id_state_area, id_city) {
	var selected_state_id 		= $('#' + id_state).val();
	var selected_state_area_id 	= $('#' + id_state_area).val();
	
	$.ajax({
	    type: "POST",
	    url: path + "/admin/ajax_action/restrict_cities",
	    data: {
	        id_state: selected_state_id,
			id_state_area: selected_state_area_id
	    },
		dataType: 'json',
	    success: function(data){
	    		var options = '';
				for (var i = 0; i < data.length; i++) {
				  options += '<option value="' + data[i].optionValue + '">' + data[i].optionDisplay + '</option>';
				}
				$("select#" + id_city).html(options);
	    }
	});
}

function ajax_rooms_restrict(location_id, location_room_id) {
	
	var selected_location_id = $('#' + location_id).val();
	$.ajax({
	    type: "POST",
	    url: path + "/admin/ajax_action/restrict_rooms",
	    data: {
	        location_id: selected_location_id
	    },
		dataType: 'json',
	    success: function(data){
	    		var options = '';
				for (var i = 0; i < data.length; i++) {
				  options += '<option value="' + data[i].optionValue + '">' + data[i].optionDisplay + '</option>';
				}
				$("select#" + location_room_id).html(options);
	    }
	});
}

function removeBusinessImage(id){
	var answer = confirm('Are you sure?');
	if (answer) {
		$.ajax({
	        type: "POST",
	        url: path + "/admin/ajax_action/delete_image",
	        data: {
	            id: id
	        },
	        success: function(data){
	        	$('#image_' + id).remove();
	        }
		});
	}
}


function delete_calendar_image(id, type){
	var answer = confirm('Are you sure?');
	if (answer) {
		$.ajax({
	        type: "POST",
	        url: path + "/admin/ajax_action/delete_calendar_image",
	        data: {
	            id: id,
	            type: type
	        },
	        success: function(data){
	        	$('#calendar_image_' + id).remove();
	        }
		});
	}
}

function delete_hp_image(id, type){
	var answer = confirm('Are you sure?');
	if (answer) {
		$.ajax({
	        type: "POST",
	        url: path + "/admin/ajax_action/delete_hp_image",
	        data: {
	            id: id,
	            type: type
	        },
	        success: function(data){
	        	$('#hp_image_' + id).remove();
	        }
		});
	}
}

function fill_booked_section_id() {
	var section = $('select#section').val();
	var class_activity_id = $('select#class_activity_id').val();
	var class_type_id = $('select#class_type_id').val();
	var class_target_group_id = $('select#class_target_group_id').val();
	var location_id = $('select#location_id').val();
	var class_activity_id = $('select#class_activity_id').val();
	var start_date = $('input#start_date').val();
	
	$.ajax({
	    type: "POST",
	    url: path + "/admin/ajax_action/fill_booked_section_id",
	    data: {
			section: section,
	        class_activity_id: class_activity_id,
	        class_type_id: class_type_id,
	        class_target_group_id: class_target_group_id,
	        location_id: location_id,
	        start_date: start_date
	    },
		dataType: 'json',
	    success: function(data){
	    		$("#search_results").html("");
				var result = '<table>';
				for (var i = 0; i < data.length; i++) {
					result += '<tr><td>' + data[i].optionDisplay + ' (' + data[i].optionStartDate + ')</td><td><a href="' + data[i].optionTitle + '"><strong>Book this</strong></a></td></tr>';
				}
				result += '</table>';
				$("#search_results").append(result);
	    }
	});
}

//Quantity spin buttons
function increase_by_one(field) {
	var nr = document.getElementById(field).value;
	
	var newVal = 1;
	
	if (IsNumeric(nr)==true) {
		newVal = parseInt(nr)+1;
	}
	document.getElementById(field).value = newVal;
}

function decrease_by_one(field, min_quantity) {
	nr = document.getElementById(field).value;
	var newVal = 1;
	
	if (IsNumeric(nr)==true) {
		if (nr > min_quantity) {
			newVal = parseInt(nr)-1;
		} else {
			newVal = min_quantity;
		}
	}
	
	document.getElementById(field).value = newVal;
}

//check for valid numeric strings	
function IsNumeric(strString) {
	var strValidChars = "0123456789.-";
	var strChar;
	var blnResult = true;
	
	if (strString.length == 0) return false;
	
	//  test strString consists of valid characters listed above
	for (i = 0; i < strString.length && blnResult == true; i++) {
		strChar = strString.charAt(i);
		if (strValidChars.indexOf(strChar) == -1) {
			blnResult = false;
		}
	}
	
	return blnResult;
}

function calculate_booking_price() {

	var state_id = $('#billing_state_id').val();
	var ids_array = new Array();
	var i = 0 ;
	
	$(".cart-quantity input").each(function(){
		var seats = $(this).val();
		var id = $(this).attr('id');
		seats = jQuery.trim(seats);
		id = jQuery.trim(id);
		id = id.substr(6);
		ids_array[i] =  seats + ',' + id;
		i = i + 1;
	});
	
	var seats_ids = ids_array.join('|');
	
	$.ajax({
        type: "POST",
        url: path + "admin/ajax_action/calculate_booking_price",
        data: {
			seats_ids: seats_ids,
            state_id: state_id
        },
        dataType: 'json',
        success: function(data){
        	$('#subtotal').html(data.subtotal);
        	$('#discount_value').html(data.discount_value);
        	$('#tax_value').html(data.tax_value);
        	$('#total').html(data.total);
        	
        	for (var id in data.cart_items) {
        		$('#price_'+id).text(data.cart_items[id]);
        	}
        	
        }
	});
}

/*
function calculate_booking_price(section, section_id) {
	
	var grandTotal = 0;
	
	$(".cart-quantity input").each(function(){
		var quantity = $(this).val();
		
		var price = $(this).parent().parent().parent().find(".price-per-seat").val();
		
		quantity = _getValue(quantity);
		price = _getValue(price);
		
		var total = quantity * price;
		grandTotal = grandTotal + total;
		
		total = String(total);
		total = _setFloat(total, 2);
		
		$(this).parent().parent().parent().find(".price").text(display_price(total));
	});
	
	grandTotal = String(grandTotal);
	grandTotal = _setFloat(grandTotal, 2);
	$('#subtotal').text(display_price(grandTotal));
}
*/
function display_price(price)
{
	return '$'+price;
}

//extract element individual value (price)
function _getValue(value) {
	value = jQuery.trim(value);
	value = value.replace('.', '');
	value = value.replace(',', '');
	value = parseInt(value);
	return value;
}

// gets a String and an Integer, and creates a Float with the Integer number of decimals
function _setFloat(stringValue, nrDecimals) {
	var parteIntreaga = stringValue.substr(0, stringValue.length-nrDecimals);
	var parteZecimala = stringValue.substr(parteIntreaga.length, stringValue.length);
	
	floatValue = String(parteIntreaga) + '.' + String(parteZecimala);
	
	return floatValue;
}
