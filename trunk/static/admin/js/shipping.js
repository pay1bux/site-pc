$(document).ready(function(){


	if ($("#shipping_world_shipping:checked").val() == true) {
		$("#world_shipping_holder").hide();
	} else {
		$("#world_shipping_holder").show();
	}

	$("#shipping_world_shipping").click(function(){
		var status = $(this).attr("checked");
		if (status==true) {
			$("#world_shipping_holder").hide();
		} else {
			$("#world_shipping_holder").show();
		}
	});

	if ($("#shipping_use_external:checked").val() == true) {
		$("#shipping_external").show();
	} else {
		$("#shipping_external").hide();
	}

	$("#shipping_use_external").click(function(){
		var status = $(this).attr("checked");
		if (status==true) {
			$("#shipping_external").show();
		} else {
			$("#shipping_external").hide();
		}
	});

	if ($("#use_flat_rate:checked").val() == true) {
		$("#flat_rate_holder").hide();
	} else {
		$("#flat_rate_holder").show();
	}

	$("#use_flat_rate").click(function(){
		var status = $(this).attr("checked");
		if (status==true) {
			$("#flat_rate_holder").hide();
		} else {
			$("#flat_rate_holder").show();
		}
	});

	if ($("#use_max_rate:checked").val() == true) {
		$("#max_rate_holder").show();
	} else {
		$("#max_rate_holder").hide();
	}

	$("#use_max_rate").click(function(){
		var status = $(this).attr("checked");
		if (status==true) {
			$("#max_rate_holder").show();
		} else {
			$("#max_rate_holder").hide();
		}
	});


	$("#shipping_country").click(function() {
		var country = $('#shipping_country').val();
		country = parseInt(country);
		$.ajax({
	        type: "POST",
	        data: {
	            country: country
	        },
	        url: path + "admin/ajax_action/render_form_option",
	        success: function(data){
				$('#new-options-wrapper').prepend(data);
				$('#new-options-count').val(count);

				langFormSwitchPreset();
				$('.lang-form-switch a').click(function(){
					var thisElem = $(this);
					langFormSwitchClick(thisElem);
					return false;
				});	        }
	    });
		return false;
	});


});



