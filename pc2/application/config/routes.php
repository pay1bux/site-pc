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
$route['devotional/autor/(:any)'] = "frontend/devotional/listaAutor/$1";
$route['devotional/autor/(:any)/(\d+)'] = "frontend/devotional/listaAutor/$1/$2";
$route['devotional/(:any)/(\d+)'] = "frontend/devotional/index/$1/$2";

$route['live'] = "frontend/live/live";

$route['radio'] = "frontend/radio/index";
$route['radio-expand'] = "frontend/radioexpand/index";

$route['despre-noi'] = "frontend/despre/index";

$route['gaseste'] = "frontend/gaseste/index";

$route['scoala-biblica'] = "frontend/scoalabiblica/index";

$route['adauga-cerere'] = "frontend/ajax/adaugaCerere";

$route['trimite-email'] = "frontend/ajax/trimiteEmail";

$route['contact'] = "frontend/contact";
$route['contact/send'] = "frontend/contact/send";

$route['arhiva-audio'] = "frontend/audio";
$route['arhiva-audio/cautare/(:any)'] = "frontend/audio/cautare/$1";
$route['arhiva-audio/(:any)'] = "frontend/audio/index/$1";
$route['arhiva-audio/(:any)/(:any)'] = "frontend/audio/index/$1/$2";
$route['arhiva-audio/(:any)/(:any)/(:any)'] = "frontend/audio/index/$1/$2/$3";

$route['arhiva-video'] = "frontend/video";
$route['arhiva-video/cautare/(:any)'] = "frontend/video/cautare/$1";
$route['arhiva-video/(:any)'] = "frontend/video/index/$1";
$route['arhiva-video/(:any)/(:any)'] = "frontend/video/index/$1/$2";
$route['arhiva-video/(:any)/(\d+)'] = "frontend/video/index/$1/$2";
$route['arhiva-video/(:any)/(:any)/(:any)'] = "frontend/video/index/$1/$2/$3";
$route['arhiva-video/(:any)/(:any)/(\d+)'] = "frontend/video/index/$1/$2/$3";
$route['arhiva-video/(:any)/(:any)/(:any)/(\d+)'] = "frontend/video/index/$1/$2/$3/$4";

$route['buletin-duminical'] = "frontend/buletin/index";
$route['buletin-duminical/(\d+)'] = "frontend/buletin/index/$1";

$route['cereri-rugaciune'] = "frontend/cereri/index";
$route['cereri-rugaciune/(\d+)'] = "frontend/cereri/index/$1";
$route['ajax/abonare-buletin'] = "frontend/ajax/abonareBuletin";
$route['lista-evenimente'] = "frontend/eveniment/lista";
$route['lista-evenimente/(\d+-\d+-\d+)'] = "frontend/eveniment/lista/$1";
$route['plan-citire-biblie'] = "frontend/plan/index";
$route['plan-citire-biblie/(\d+-\d+-\d+)'] = "frontend/plan/index/$1";

$route['download/(\d+)'] = "frontend/download/down/$1";
$route['playonline/(\d+)'] = "frontend/playonline/play/$1";
$route['embed/(\d+)'] = "frontend/embed/getembed/$1";

$route['pcadmin'] = "admin/administrator";
$route['login'] = "admin/login";
$route['login-form'] = "admin/login/verify";
$route['logout'] = "admin/logout";
$route['admin/adauga-resursa'] = "admin/resurse/add";
$route['admin/editeaza-resursa/(\d+)'] = "admin/resurse/edit/$1";
$route['admin/sterge-resursa/(\d+)'] = "admin/resurse/delete/$1";
$route['admin/lista-resurse'] = "admin/resurse/lista";
$route['admin/lista-resurse/(\d+)'] = "admin/resurse/lista/$1";
$route['admin/lista-resurse/cauta/(\d+)/(:any)/(\d+)'] = "admin/resurse/lista/$1/$2/$3";

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
$route['admin/lista-buletine/(\d+)'] = "admin/buletin/lista/$1";
$route['admin/sterge-buletin/(\d+)'] = "admin/buletin/delete/$1";

$route['admin/adauga-eveniment'] = "admin/eveniment/add";
$route['admin/editeaza-eveniment/(\d+)'] = "admin/eveniment/add/$1";
$route['admin/lista-evenimente'] = "admin/eveniment/lista";
$route['admin/lista-evenimente/(\d+)'] = "admin/eveniment/lista/$1";
$route['admin/sterge-eveniment/(\d+)'] = "admin/eveniment/delete/$1";

$route['admin/adauga-devotional'] = "admin/devotional/add";
$route['admin/editeaza-devotional/(\d+)'] = "admin/devotional/add/$1";
$route['admin/lista-devotionale'] = "admin/devotional/lista";
$route['admin/lista-devotionale/(\d+)'] = "admin/devotional/lista/$1";
$route['admin/sterge-devotional/(\d+)'] = "admin/devotional/delete/$1";

$route['admin/adauga-audio'] = "admin/adaugaaudio/add";
$route['admin/adauga-video'] = "admin/adaugavideo/add";

$route['admin/adauga-imagine-promo'] = "admin/imaginepromo/add";
$route['admin/editeaza-imagine-promo/(\d+)'] = "admin/imaginepromo/add/$1";
$route['admin/lista-imagini-promo'] = "admin/imaginepromo/lista";
$route['admin/sterge-imagine-promo/(\d+)'] = "admin/imaginepromo/delete/$1";

$route['admin/adauga-user'] = "admin/user/add";
$route['admin/editeaza-user/(\d+)'] = "admin/user/add/$1";
$route['admin/lista-useri'] = "admin/user/lista";
$route['admin/sterge-user/(\d+)'] = "admin/user/delete/$1";
$route['admin/schimba-parola'] = "admin/password/schimbaparola";

$route['admin/lista-cereri'] = "admin/cereri/lista";
$route['admin/lista-cereri/(\d+)'] = "admin/cereri/lista/$1";
$route['admin/sterge-cerere/(\d+)'] = "admin/cereri/delete/$1";

$route['youtube'] = "admin/youtube/lista";

$route['404_override'] = '';

/* End of file routes.php */
/* Location: ./application/config/routes.php */