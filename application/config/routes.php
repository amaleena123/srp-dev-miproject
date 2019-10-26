<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dagangan'] = "dagangan/index";
$route['daganganCreate']['post'] = "dagangan/store";
$route['daganganId/(:any)'] = "dagang/daganganid/$1";
$route['daganganEdit/(:any)'] = "dagangan/edit/$1";
$route['daganganUpdate/(:any)']['put'] = "dagangan/update/$1";
$route['daganganDelete/(:any)']['delete'] = "dagangan/delete/$1";

$route['perawis'] = "perawis/index";
$route['perawisCreate']['post'] = "perawis/store";
$route['perawisId/(:any)'] = "perawis/perawisid/$1";
$route['perawisEdit/(:any)'] = "perawis/edit/$1";
$route['perawisUpdate/(:any)']['put'] = "perawis/update/$1";
$route['perawisDelete/(:any)']['delete'] = "perawis/delete/$1";

$route['syarikat'] = "syarikat/index";
$route['syarikatCreate']['post'] = "syarikat/store";
$route['syarikatId/(:any)'] = "syarikat/syarikatid/$1";
$route['syarikatEdit/(:any)'] = "syarikat/edit/$1";
$route['syarikatUpdate/(:any)']['put'] = "syarikat/update/$1";
$route['syarikatDelete/(:any)']['delete'] = "syarikat/delete/$1";

$route['ejen'] = "ejen/index";
$route['ejenCreate']['post'] = "ejen/store";
$route['maklumatEjen/(:any)'] = "ejen/maklumatejen/$1";
$route['ejenEdit/(:any)'] = "ejen/edit/$1";
$route['ejenUpdate/(:any)']['put'] = "ejen/update/$1";
$route['ejenDelete/(:any)']['delete'] = "ejen/delete/$1";

$route['pembekal'] = "pembekal/index";
$route['pembekalCreate']['post'] = "pembekal/store";
$route['maklumatPembekal/(:any)'] = "pembekal/maklumatpembekal/$1";
$route['pembekalEdit/(:any)'] = "pembekal/edit/$1";
$route['pembekalUpdate/(:any)']['put'] = "pembekal/update/$1";
$route['pembekalDelete/(:any)']['delete'] = "pembekal/delete/$1";

$route['pengilang'] = "pengilang/index";
$route['pengilangCreate']['post'] = "pengilang/store";
$route['maklumatPengilang/(:any)'] = "pengilang/maklumatpengilang/$1";
$route['pengilangEdit/(:any)'] = "pengilang/edit/$1";
$route['pengilangUpdate/(:any)']['put'] = "pengilang/update/$1";
$route['pengilangDelete/(:any)']['delete'] = "pengilang/delete/$1";
