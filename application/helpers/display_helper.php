<?php

function display_text($text) 
{
	return nl2br($text);
}

/*** ADMIN ***/
function get_image_path($source, $dir)
{
	switch ($dir)
	{
		case 'minithumb':
			$path = MINITHUMB_IMG_PATH;
			break;
		case 'thumb':
			$path = THUMB_IMG_PATH;
			break;
		case 'normal':
			$path = NORMAL_IMG_PATH;
			break;
		case 'zoom':
			$path = ZOOM_IMG_PATH;
			break;
		default: return;				
	}
	return site_url(substr($path,2).$source);
}

function render_image($source, $dir, $options = array())
{
	$options['src'] = get_image_path($source, $dir);
	return '<img'._tag_options($options).' />';
}


function _tag_options($options = array())
{
  $html = '';
  foreach ($options as $key => $value)
  {
    $html .= ' '.$key.'="'.$value.'"';
  }
  return $html;
}

