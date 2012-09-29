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
$route['acasa'] = "frontend/homepage";

$route['devotional'] = "frontend/devotional/lista";
$route['devotional/(\d+)'] = "frontend/devotional/lista/$1";
$route['devotional/(:any)/(\d+)'] = "frontend/devotional/index/$1/$2";

$route['live2'] = "frontend/live/live";

$route['despre-noi'] = "frontend/despre/index";

$route['gaseste'] = "frontend/gaseste/index";

$route['adauga-cerere'] = "frontend/ajax/adaugaCerere";

$route['contact'] = "frontend/contact";
$route['contact/send'] = "frontend/contact/send";

$route['arhiva-audio'] = "frontend/audio";
$route['arhiva-audio/cautare/(:any)'] = "frontend/audio/cautare/$1";
$route['arhiva-audio/(:any)'] = "frontend/audio/index/$1";
$route['arhiva-audio/(:any)/(:any)'] = "frontend/audio/index/$1/$2";
$route['arhiva-audio/(:any)/(:any)/(:any)'] = "frontend/audio/index/$1/$2/$3";

$route['buletin-duminical'] = "frontend/buletin/index";
$route['buletin-duminical/(\d+)'] = "frontend/buletin/index/$1";

$route['cereri-rugaciune'] = "frontend/cereri/index";
$route['cereri-rugaciune/(\d+)'] = "frontend/cereri/index/$1";
$route['ajax/abonare-buletin'] = "frontend/ajax/abonareBuletin";
$route['lista-evenimente'] = "frontend/eveniment/lista";
$route['lista-evenimente/(\d+-\d+-\d+)'] = "frontend/eveniment/lista/$1";

$route['administrator'] = "admin/administrator";
$route['login'] = "admin/login";
$route['login-form'] = "admin/login/verify";
$route['admin/adauga-resursa'] = "admin/resurse/add";
$route['admin/editeaza-resursa/(\d+)'] = "admin/resurse/edit/$1";
$route['admin/sterge-resursa/(\d+)'] = "admin/resurse/delete/$1";
$route['admin/lista-resurse'] = "admin/resurse/lista";
$route['admin/lista-resurse/(\d+)'] = "admin/resurse/lista/$1";
$route['admin/lista-resurse/cautare/(:any)'] = "admin/resurse/cautare/$1";
$route['admin/lista-resurse/cautare/(:any)/(:\d+)'] = "admin/resurse/cautare/$1/$2";

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

$route['admin/adauga-buletin'] = "admin/buletin/add";
$route['admin/editeaza-buletin/(\d+)'] = "admin/buletin/add/$1";
$route['admin/lista-buletine'] = "admin/buletin/lista";
$route['admin/sterge-buletin/(\d+)'] = "admin/buletin/delete/$1";

$route['admin/adauga-eveniment'] = "admin/eveniment/add";
$route['admin/editeaza-eveniment/(\d+)'] = "admin/eveniment/add/$1";
$route['admin/lista-evenimente'] = "admin/eveniment/lista";
$route['admin/sterge-eveniment/(\d+)'] = "admin/eveniment/delete/$1";

$route['admin/adauga-devotional'] = "admin/devotional/add";
$route['admin/editeaza-devotional/(\d+)'] = "admin/devotional/add/$1";
$route['admin/lista-devotionale'] = "admin/devotional/lista";
$route['admin/sterge-devotional/(\d+)'] = "admin/devotional/delete/$1";


$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */