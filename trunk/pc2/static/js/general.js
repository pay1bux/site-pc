

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

function getBaseUrl() {
    var url = window.location.href;
    var indexPos = url.indexOf("index.php");
    var slashPos = 0;
    if (indexPos != -1) {
        slashPos = url.indexOf("/", indexPos);
    } else {
        slashPos = url.indexOf("/", 8);
    }

    var baseUrl = url.substring(0, slashPos);

    return baseUrl + "/";
}

$(document).ready(

    function () {
        $('#text_cautare_audio').keyup( function(e){
            key($(this), e, 'arhiva-audio/cautare/');
        });

        $('#text_cautare_video').keyup( function(e){
            key($(this), e, 'arhiva-video/cautare/');
        });

        $('#text_cautare_admin').keyup( function(e){
            key($(this), e, 'admin/lista-resurse/');
        });

        $('#buton_cautare_audio').click(function() {
            var cuvinte =$('#text_cautare_audio').val();
            cuvinte = encodeURIComponent(trim(cuvinte));
            var url = getBaseUrl() + 'arhiva-audio/cautare/' + cuvinte;
            document.location = url;
        });

        $('#buton_cautare_video').click(function() {
            var cuvinte =$('#text_cautare_video').val();
            cuvinte = encodeURIComponent(trim(cuvinte));
            var url = getBaseUrl() + 'arhiva-video/cautare/' + cuvinte;
            document.location = url;
        });

        $('#buton_cautare_admin').click(function() {
            var cuvinte =$('#text_cautare_admin').val();
            if( cuvinte != '' ){
                var tip =$('#tip_cautare_admin').val();
                var page = 0;
                cuvinte = encodeURIComponent(trim(cuvinte));
                var url = getBaseUrl() + 'admin/lista-resurse/cauta/'+ tip + '/' + cuvinte + '/' + page;
                document.location = url;
            }
            else{
                $('#text_cautare_admin').css("background-color", "#e77373");
            }

        });

        $('.sterge').click(function(){
                if(!confirm('Esti sigur(a) ca doresti sa stergi aceasta resursa?'))
                    return false;
            });

    }

);





function key(object, e, url) {
    var code = (e.keyCode ? e.keyCode : e.which);
    if(code == 13) { //Enter keycode
        var cuvinte = object.val();
        if ( cuvinte != '')
        {
        var tip =$('#tip_cautare_admin').val();
        var page = 0;
        cuvinte = encodeURIComponent(trim(cuvinte));
        var url = getBaseUrl() + url + 'cauta/' + tip + '/' + cuvinte + '/' + page;
        document.location = url;
        }
        else
            $('#text_cautare_admin').css("background-color", "#e77373");

    }
}

