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
$route['regisztracio']['POST'] = 'kezdolap/regisztracio_post';
$route['bejelentkezes']['POST'] = 'kezdolap/bejelentkezes_post';
$route['kijelentkezes'] = "kezdolap/kijelentkezes";
$route['regisztracio']['GET'] = 'kezdolap/regisztracio';
$route['bejelentkezes']['GET'] = 'kezdolap/bejelentkezes';
$route['proba'] = 'kezdolap/proba';
$route['hirdetes_feladas']['POST'] = 'hirdetes_feladas/hirdetes_post'; //hirdetés feladáshoz
$route['hirdetes_feladas']['GET'] = 'hirdetes_feladas/hirdetes_feladas';
$route['modositas/(:num)']['POST'] = 'profil/profil_modositas_post/$1'; //profil módosításhoz - 1. form
$route['hirdetes/(:num)'] = 'hirdetes_kereses/hirdetes_megtekintes/$1';
$route['hirdetes_kereses'] = 'hirdetes_kereses/hirdetes_kereses'; //bejelentkezés után a hirdetes_kereses oldalra irányítás
$route['kereses']['POST'] = 'hirdetes_kereses/hirdetes_kereses';
$route['profiltorles'] = 'profil/profil_torles'; 
$route['hirdetestorles/(:num)'] = 'profil/hirdetes_torles/$1'; 
$route['jelszomodositas/(:num)']['POST'] = 'profil/profil_modositas_jelszo_post/$1'; //profil módosításhoz - 2. form
$route['teszt'] = 'teszt/index'; //backend teszteléshez tesztútvonal


