<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['default_controller'] = 'asrama';
$route['logout'] = 'asrama/logout';
$route["admin"] = 'admin/(:any)';
$route["Musahil/insert_penghuni"] = "Admin/insert_penghuni";
$route["Musahil/ManagePassword"] = "Admin/ManagePassword";
$route["Musahil/reset_password"] = "Admin/reset_password";
$route["Musahil/managePassword"] = "Admin/ManagePassword";
$route["Musahil/data_pendaftaran"] = "Admin/data_pendaftaran";
$route["Musahil/data_gedung"] = "Admin/data_gedung";
$route["Musahil/add_penghuni"] = "Admin/add_penghuni";
$route["Admin/manage_token/(:any)"] = "musahil/manage_token/$1";
$route["Admin/validasi_berkas/view"] = "musahil/validasi_berkas/view";
$route["Admin/manage_token/edit/(:any)"] = "musahil/manage_token/edit/$1";
$route["Admin/manage_token/delete/(:any)"] = "musahil/manage_token/delete/$1";
$route["Admin/validasi_berkas/validasi/(:any)"] = "musahil/validasi_berkas/validasi/$1";
$route["Admin/validasi_berkas/view/(:any)"] = "musahil/validasi_berkas/view/$1";
$route["Admin/validasi_berkas/unvalidasi/(:any)"] = "musahil/validasi_berkas/unvalidasi/$1";
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
