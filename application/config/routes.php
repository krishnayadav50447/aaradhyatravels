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
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['default_controller'] = 'viewer/pages';

$route['logout'] = 'viewer/logout';
$route['login'] = 'viewer/user';
$route['send-login-otp'] = 'viewer/user/send_login_otp';
$route['validate-login-otp'] = 'viewer/user/validate_login_otp';
$route['validate-account'] = 'viewer/user/validate_account';
$route['register'] = 'viewer/user/register';
$route['verify-user'] = 'viewer/user/verify_user';
$route['register-data'] = 'viewer/user/register_data';
$route['login-data'] = 'viewer/user/login_data';
$route['recover-pass-account'] = 'viewer/user/recover_pass_account';
$route['recover-pass-account-otp'] = 'viewer/user/recover_pass_account_otp';


$route['terms-condition'] = 'viewer/pages/terms_condition';
$route['privacy-policy'] = 'viewer/pages/privacy_policy';
$route['return-and-refund'] = 'viewer/pages/return_and_refund';

/***profile dashboard*****/
$route['dashboard'] = 'viewer/profile/dashboard';
$route['profile'] = 'viewer/profile/profile';
$route['transaction'] = 'viewer/profile/transaction';
$route['support'] = 'viewer/profile/support';
$route['refer-earn'] = 'viewer/profile/refer_earn';
$route['reffer-invite-email'] = 'viewer/profile/refer_earn_invite_email';
$route['setting'] = 'viewer/profile/setting';

$route['remove-profile-img'] = 'viewer/profile/remove_profile_img';
$route['upload-profile-img'] = 'viewer/profile/upload_profile_img';

$route['personal-form'] = 'viewer/profile/personal_form';
$route['contact-form'] = 'viewer/profile/contact_form';
$route['address-form'] = 'viewer/profile/address_form';
$route['change-password'] = 'viewer/profile/change_password';

$route['fetch-transaction'] = 'viewer/profile/fetch_transaction';
$route['fetch-reffer-transaction'] = 'viewer/profile/fetch_reffer_transaction';
$route['logout'] = 'viewer/logout';


/*****Payment Route******/
$route['make-payment'] = 'viewer/payment/make_payment';
$route['verify-payment'] = 'viewer/payment/verify_payment';
$route['cancel-booking'] = 'viewer/payment/cancel_booking';
$route['verify-refund-payment'] = 'viewer/payment/verify_refund_payment';
$route['check-payment-status'] = 'viewer/payment/check_payment_status';

$route['visitor-count'] = 'viewer/pages/visitor_count';


/*******Page Route*******/
$route['about-us'] = 'viewer/pages/about_us';
$route['contact-us'] = 'viewer/pages/contact_us';
$route['contact-us-data'] = 'viewer/pages/contact_form_data';
$route['contact-reload-captcha'] = 'viewer/pages/contact_reload_captcha';
$route['help'] = 'viewer/pages/help';
$route['tarrif'] = 'viewer/pages/tarrif';
$route['why-us'] = 'viewer/pages/why_us';

$route['vehicle-list'] = 'viewer/vehicle/vehicle_list';
$route['get-all-vehicle'] = 'viewer/vehicle/get_all_vehicle';
$route['get-vehicle-for-details'] = 'viewer/vehicle/get_vehicle_for_details';

$route['checkout'] = 'viewer/vehicle/checkout';
$route['vehicle-details'] = 'viewer/vehicle/vehicle_details';

//extra
$route['sample'] = 'viewer/extra_pages/sample';

//Admin route
$route['admin'] = 'admin/admin_login';
$route['admin/admin-logout'] = 'admin/admin_logout';
$route['admin/admin-dashboard'] = 'admin/admin_dashboard';

$route['admin/page'] = 'admin/admin_page/seo_manage';
$route['admin/banner'] = 'admin/admin_dynamic_data/banner';
$route['admin/faq'] = 'admin/admin_dynamic_data/faq';

$route['admin/my-profile'] = 'admin/admin_view_profile';
$route['admin/change-password'] = 'admin/admin_view_profile/change_password';

$route['admin/contact-data'] = 'admin/admin_view_notification';
$route['admin/email-data'] = 'admin/admin_view_notification/email_data';
$route['admin/review-contact'] = 'admin/admin_view_notification/review_contact';
$route['admin/all-users'] = 'admin/admin_view_customer';
$route['admin/user-transaction'] = 'admin/admin_view_transaction/user_transaction';

$route['admin/all-vehicle'] = 'admin/admin_view_vehicle/vehicle';

//Webinaservice
$route['get-states'] = 'service/webinaservice/get_states';
$route['get-cities'] = 'service/webinaservice/get_cities';
$route['get-uploader'] = 'service/webinaservice/get_uploader';
$route['get-countries'] = 'service/webinaservice/get_countries';
$route['uploader-upload'] = 'service/webinaservice/uploader_upload';
$route['get-img-compressor'] = 'service/webinaservice/get_img_compressor';

// EXTRA PAGES FOR THIS WEBSITE
$route['(:any)'] = 'viewer/extra_pages/run_page';