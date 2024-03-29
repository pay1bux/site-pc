<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('STATIC_PATH',			BASE_URL.'static/');

# Admin assets
define('ADMIN_PATH',			STATIC_PATH.'admin/');
define('ADMIN_IMAGES',			ADMIN_PATH.'images/');
define('ADMIN_CSS',				ADMIN_PATH.'css/');
define('ADMIN_JS',				ADMIN_PATH.'js/');

# Frontend assets
define('IMAGES_PATH',		STATIC_PATH.'images/');
define('CSS_PATH',			STATIC_PATH.'css/');
define('JS_PATH',			STATIC_PATH.'js/');

# Foldere buletine
define("FOLDER_BULETINE", "uploads/buletine/");
define("FOLDER_IMAGINI_BULETINE", "uploads/imagini-buletine/");
define("FOLDER_IMAGINI_DEVOTIONAL", "uploads/imagini-devotional/");
define("FOLDER_IMAGINI_EVENIMENT", "uploads/imagini-evenimente/");
define("FOLDER_IMAGINI_PROMO", "uploads/imagini-promo/");
define("FOLDER_THUMB_VIDEO", "http://www.poartacerului.ro/");

define('TIP_DEVOTIONAL', "articole");
define('TIP_PREDICA_AUDIO', "predica-audio");
define('TIP_STUDIU_AUDIO', "studiu-audio");
define('TIP_CANTEC_AUDIO', "cantec-audio");
define('TIP_POEZIE_AUDIO', "poezie-audio");
define('TIP_MARTURIE_AUDIO', "marturie-audio");
define('TIP_DIVERSE_AUDIO', "diverse-audio");
define('TIP_ARHIVA_VIDEO', "arhiva-video-programe");
define('TIP_ARHIVA_VIDEO_TINERET', "arhiva-video-tineret");
define('TIP_ARHIVA_VIDEO_EVENIMENTE', "arhiva-video-evenimente");
define('TIP_STUDIU_VIDEO', "studiu-video");


define('EVENIMENT_THUMBNAIL_WIDTH', 304);
define('EVENIMENT_THUMBNAIL_HEIGHT', 171);

define('PROMO_IMAGE_WIDTH', 722);
define('PROMO_IMAGE_HEIGHT', 406);
/* End of file constants.php */
/* Location: ./application/config/constants.php */