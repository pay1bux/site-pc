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

define('FOPEN_READ', 							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE', 		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE', 	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE', 					'ab');
define('FOPEN_READ_WRITE_CREATE', 				'a+b');
define('FOPEN_WRITE_CREATE_STRICT', 			'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

define('STATIC_PATH',			BASE_URL.'static/');
	
# Admin assets
define('ADMIN_PATH',			STATIC_PATH.'admin/');
define('ADMIN_IMAGES',			ADMIN_PATH.'images/');
define('ADMIN_CSS',				ADMIN_PATH.'css/');
define('ADMIN_JS',				ADMIN_PATH.'js/');

# Frontend assets
define('FRONTEND_PATH',			STATIC_PATH.'frontend/');
define('FRONTEND_IMAGES',		FRONTEND_PATH.'images/');
define('FRONTEND_CSS',			FRONTEND_PATH.'css/');
define('FRONTEND_JS',			FRONTEND_PATH.'js/');

# Uploads paths (first is for upload file library)
define('UPLOADS_PATH',			'./uploads/');
define('UPLOADS_IMG_PATH',		UPLOADS_PATH.'images/');
define('FULL_UPLOADS_IMG_PATH',		BASE_URL.'uploads/images/');


define('MINITHUMB_IMG_PATH',		UPLOADS_PATH.'images/minithumb/');
define('NORMAL_IMG_PATH',		UPLOADS_PATH.'images/normal/');
define('ORIGINAL_IMG_PATH',		UPLOADS_PATH.'images/original/');
define('THUMB_IMG_PATH',		UPLOADS_PATH.'images/thumb/');
define('ZOOM_IMG_PATH',		UPLOADS_PATH.'images/zoom/');

define('GALLERY_THUMB_IMG_WIDTH', 100);
define('GALLERY_THUMB_IMG_HEIGHT', 85);
define('GALLERY_NORMAL_IMG_WIDTH', 300);
define('GALLERY_NORMAL_IMG_HEIGHT', 300);
define('GALLERY_ZOOM_IMG_WIDTH', 800);
define('GALLERY_ZOOM_IMG_HEIGHT', 600);

define('SITE_TITLE', 'Electrologus');
define('RESULTS_PER_PAGE', 25);
/* End of file constants.php */
/* Location: ./system/application/config/constants.php */