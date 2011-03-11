var totalSelectedItems = 0;

$(document).ready(function(){
	
	$('.hide-with-js').hide(); // use this class to hide the message "please open this link in new window"
	
	// JUMP MENU
	$("select.jump-menu").change(function(x){
		//var url = $("option:selected", this).attr("title");
		//if (url.length) {
			//window.location.href = url;
		//}
		var id = $("option:selected", this).attr("title");
		$("#form-display-filter" + id).submit();
		
	});
	
	$.ajaxSetup( { type: "POST" } );
    $(".search-by-category").autocomplete(path + 'admin/ajax_action/autocomplete_categories', {
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
	
	updateTotalSelectedItems(totalSelectedItems);
	
	var heightInner = parseInt(parent.screenSize['height']-400)+"px";
	var heightOuter = parseInt(parent.screenSize['height']-50)+"px";
	
	//$("#image-selection-results").css("height", heightInner);
	$(".iframe-popup-inner", top.document).css("height", heightOuter);
	
	
	$("a.add").click(function(){
		var id = $(this).attr('rel');
		var item = $(this).parent().find(".item").html();
		$("#selection_wrapper", top.document).append('<tr class="highlight-element" id="item'+id+'">'+item+'</tr>');
		$(this).parent().find(".delete").show();
		$(this).hide();
		totalSelectedItems++;
		updateTotalSelectedItems(totalSelectedItems);
		
		//alert($("#selection_wrapper .no-items", top.document).html());
		$("#selection_wrapper .no-items", top.document).hide();
		
		return false;
	});
	
	$("a.delete").click(function(){
		removeSelectedItem($(this));
		return false;
	});
	
	
	// get selected items
	//alert(val);
	$("input[name='selected_items[]']", top.document).each(
		function(i, val){
			var id = $(val).val();
			//alert(id);
			
			$(".item"+id+" .add").hide();
			$(".item"+id+" .delete").show();
			
			totalSelectedItems++;
			updateTotalSelectedItems(totalSelectedItems);
		}
	);
	
});

function removeSelectedItem(elem) {
	var id = $(elem).attr('rel');
	
	$('#item'+id, top.document).remove();
	$(elem).hide();
	$(elem).parent().find(".add").show();
	totalSelectedItems--;
	updateTotalSelectedItems(totalSelectedItems);
	
	if (totalSelectedItems==0) {
		$("#selection_wrapper .no-items", top.document).show();
	}
}

function updateTotalSelectedItems(nr) {
	$("#selectedItems span").text(nr);
}

