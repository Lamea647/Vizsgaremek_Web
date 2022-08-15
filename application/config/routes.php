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
$route['default_controller'] = 'kezdolap';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
//$route['fooldal/regisztracio'] = 'regisztracio'; //teszteléshez
//$route['fooldal/proba'] = 'kezdolap/regisztracio'; //teszteléshez
//$route['feladas'] = 'hirdetes_feladas/hirdetes_feladas'; //teszteléshez - hirdetés feladási felület megtekintése
//$route['kereses'] = 'hirdetes_kereses/hirdetes_kereses'; //teszteléshez - hirdetés keresőfelület megtekintése
$route['megtekintes'] = 'hirdetes_kereses/hirdetes_megtekintes'; //teszteléshez - hirdetés adatlap megtekintése
//$route['profil'] = 'profil/profil_megtekintes'; //teszteléshez - profil oldal megtekintése
//$route['statisztika'] = 'statisztika/ranglista_megtekintes'; //teszteléshez - ranglista oldal megtekintése
$route['modprofil'] = 'profil/profil_modositas'; //teszteléshez - módosított profil oldal megtekintése
$route['regisztracio']['POST'] = 'kezdolap/regisztracio_post';
$route['bejelentkezes']['POST'] = 'kezdolap/bejelentkezes_post';
$route['kijelentkezes'] = "kezdolap/kijelentkezes";
$route['regisztracio']['GET'] = 'kezdolap/regisztracio';
$route['bejelentkezes']['GET'] = 'kezdolap/bejelentkezes';
$route['proba'] = 'kezdolap/proba';
$route['hirdetes_feladas']['POST'] = 'hirdetes_feladas/hirdetes_post'; //hirdetés feladáshoz
$route['hirdetes_feladas']['GET'] = 'hirdetes_feladas/hirdetes_feladas';
$route['adatok_mod/(:num)']['PUT'] = 'profil/adatok_mod/$1'; //profil módosításhoz - jóváhagyás nélküli 1. form
//$route['api/(:num)']['POST'] = 'api/user/index_put/$1';
$route['hirdetes/(:num)'] = 'hirdetes_kereses/hirdetes_megtekintes/$1';

