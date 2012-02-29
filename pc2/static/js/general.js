function trim(stringToTrim) {
	return stringToTrim.replace(/^\s+|\s+$/g,"");
}

function input_default_text(input_htmlid, default_text)
{
	var doc_input = document.getElementById(input_htmlid);
	if(doc_input)
	{
		var current_value = doc_input.value;
		if(current_value == default_text)
		{
			// stergem
			doc_input.value = '';
			doc_input.style.color = '#000';
		}
		else
		if(trim(current_value) == '')
		{
			// adaugam textul default
			doc_input.value = default_text;
			doc_input.style.color = '#666';
		}
	}
}

function hide_show(hide_htmlid, show_htmlid)
{
	doc_hide = document.getElementById(hide_htmlid);
	doc_show = document.getElementById(show_htmlid);
	
	if(hide_htmlid && show_htmlid)
	{
		$('#'+hide_htmlid).fadeOut('normal', function() {
			
			$('#'+show_htmlid).fadeIn('normal', function() {
				// ...
			});
		});
	}
	
	return false;
}