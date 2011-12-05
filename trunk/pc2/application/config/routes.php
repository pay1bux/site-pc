<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "frontend/homepage";

$route['devotional'] = "frontend/devotional/lista";
$route['devotional/(\d+)'] = "frontend/devotional/index/$1";

$route['live'] = "frontend/live/live";

$route['contact'] = "frontend/contact";

$route['arhiva-audio'] = "frontend/arhiva/audio";

$route['login'] = "admin/login";
$route['verificare'] = "admin/verificare";
$route['admin/adauga-resursa'] = "admin/resurse/add";
$route['admin/editeaza-resursa/(\d+)'] = "admin/resurse/edit/$1";
$route['admin/lista-resurse'] = "admin/resurse/lista";
$route['ajax/abonare-buletin'] = "frontend/ajax/abonareBuletin";

$route['admin/adauga-autori'] = "admin/autori/add";
$route['admin/editeaza-autori/(\d+)'] = "admin/autori/edit/$1";
$route['admin/lista-autori'] = "admin/autori/lista";

$route['admin/adauga-categorii'] = "admin/categorii/add";
$route['admin/editeaza-categorii/(\d+)'] = "admin/categorii/edit/$1";
$route['admin/lista-categorii'] = "admin/categorii/lista";

$route['admin/lista-atasamente-resursa/(\d+)'] = "admin/atasamente/lista/$1";
$route['admin/adauga-atasament/(\d+)'] = "admin/atasamente/add/$1";
$route['admin/editeaza-atasament/(\d+)/(\d+)'] = "admin/atasamente/edit/$1/$2";

$route['admin/lista-taguri-resursa/(\d+)'] = "admin/taguri/lista/$1";
$route['admin/adauga-tag/(\d+)'] = "admin/taguri/add/$1";
$route['admin/editeaza-tag/(\d+)/(\d+)'] = "admin/taguri/edit/$1/$2";


$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */