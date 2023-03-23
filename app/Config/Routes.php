<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();

// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
 $routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->options('(:any)', '', ['filter' => 'cors']);

$routes->get('/', 'Home::index');

$routes->get('/services', 'Services::index');

$routes->get('/contact', 'Contact::index');

/// RUTE FOR MULTIPLE PARAMETOR
$routes->get('/contact/(:any)', 'Contact::getparm/$1');

///// Login Page
$routes->get('/admin/', 'Admin::index');

///// Phone Login Page
$routes->get('/admin/phone-login/', 'Admin::phone_login');

$routes->match(['get', 'post'], '/admin/update_otp/(:any)', 'Admin::update_otp/$1');

///// Registration Page Routes And there Controllers
$routes->get('/admin/register/', 'Signup::index');
$routes->match(['get', 'post'], 'register/store', 'Signup::store');

// Login page for admin
$routes->match(['get', 'post'], 'SigninController/loginAuth', 'SigninController::loginAuth');
////API LOGIN
$routes->match(['get', 'post'], 'SigninController/loginAuth_Api', 'SigninController::loginAuth_Api');
 


//////// OTP LOGIN PATH
$routes->match(['get', 'post'], '/SigninController/phone_login', 'SigninController::phone_login');

// protection for without session page accessing 

$routes->get('/admin/profile', 'ProfileController::index',['filter' => 'authGuard']);

$routes->get('/admin/forgot_password', 'Admin::forgot_password');
$routes->match(['get', 'post'], '/admin/password_reset', 'Admin::password_reset');

/// Reset page 
$routes->get('/admin/reset_password', 'Admin::change_password');
$routes->match(['get', 'post'], '/admin/udpate_password', 'Admin::udpate_password');
/// Banner Slider
$routes->get('/admin/banner_section', 'Admin::banner_load',['filter' => 'authGuard']);
$routes->match(['get', 'post'], '/admin/banner_update', 'Admin::banner_update',['filter' => 'authGuard']);

// About Us page 
$routes->get('/admin/about_section', 'Admin::about_load',['filter' => 'authGuard']);
$routes->match(['get', 'post'], '/admin/about_update', 'Admin::about_update',['filter' => 'authGuard']);


// InfoBox Load 
$routes->get('/admin/infobox_section', 'Admin::infobox_load',['filter' => 'authGuard']);
$routes->match(['get', 'post'], '/admin/infoBox_Add', 'Admin::infoBox_Add',['filter' => 'authGuard']);
$routes->match(['get', 'post'], '/admin/infobox_export', 'Admin::infobox_export', ['filter' => 'authGuard']);



////InfoBox Edit 
$routes->match(['get','post'], '/admin/infobox_section/edit/(:any)', 'Admin::editInfobox/$1',['filter' => 'authGuard']);
////InfoBox Update
$routes->match(['get', 'post'], '/admin/infobox_udpate/(:any)', 'Admin::updateinfoBox',['filter' => 'authGuard']);
///// InfoBox Delete
$routes->match(['get','post'], '/admin/infobox_section/delete/(:any)', 'Admin::deleteInfobox/$1',['filter' => 'authGuard']);


//Gallery Load
$routes->get('/admin/gallery_section', 'Admin::gallery_load',['filter' => 'authGuard']);
$routes->match(['get', 'post'], '/admin/gallery_upload', 'Admin::gallery_upload',['filter' => 'authGuard']);
$routes->match(['get','post'], '/admin/gallery_section/delete/(:any)', 'Admin::deleteimage/$1',['filter' => 'authGuard']);


/// Testimonials
$routes->get('/admin/testimonials', 'Admin::testimonials_load',['filter' => 'authGuard']);
$routes->match(['get', 'post'], '/admin/testimonials_update', 'Admin::testimonials_update',['filter' => 'authGuard']);

///// Chef Team member
$routes->get('/admin/team_section', 'Admin::chefteam_load',['filter' => 'authGuard']);
$routes->match(['get', 'post'], '/admin/chef_add', 'Admin::Chef_Add',['filter' => 'authGuard']);

///// Profile update
$routes->get('/admin/setting', 'ProfileController::setting_profile',['filter' => 'authGuard']);
$routes->match(['get', 'post'], '/admin/setting_udpate', 'ProfileController::setting_update',['filter' => 'authGuard']);



$routes->get('/', 'SendMail::index');
$routes->match(['get', 'post'], 'SendMail/sendMail', 'SendMail::sendMail');

// Logout page Route define
$routes->get('/admin/logout', 'Admin::logout');

/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
?>