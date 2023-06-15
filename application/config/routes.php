<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['search'] = 'welcome/search_student';
$route['admin-welcome'] = 'admin_welcome';
$route['save_register'] = 'register/save_register';
$route['admin-list-dorm'] = 'admin_dorm/list_dorm';
$route['admin-class-dorm'] = 'admin_dorm/class_dorm';
$route['admin-edit-dorm'] = 'admin_dorm/edit_dorm';
$route['admin-add-room'] = 'admin_dorm/add_room';
$route['admin-data-room'] = 'admin_dorm/data_room';
$route['admin-list-student'] = 'admin_student/list_student';
$route['update_dorm'] = 'admin_dorm/update_dorm';
$route['delete_dorm'] = 'admin_dorm/delete_dorm';
$route['insert_room'] = 'admin_dorm/insert_room';
$route['update_room'] = 'admin_dorm/update_room';
$route['del_room_byID'] = 'admin_dorm/del_room_byID';
$route['del_register_byID'] = 'admin_student/del_register_byID';
$route['del_register'] = 'admin_student/del_register';
$route['backend-login'] = 'login/frm_login';
$route['check_login'] = 'login/check_login';
$route['check_logout'] = 'login/check_logout';

$route['admin-list-employee'] = 'employee/list_employee';
$route['add-employee'] = 'employee/add_employee';
$route['save_employee'] = 'employee/save_employee';
$route['edit-employee'] = 'employee/edit_employee';
$route['update_employee'] = 'employee/update_employee';
$route['del_manager_byID'] = 'employee/del_manager_byID';

$route['edit-student'] = 'admin_student/edit_student';
$route['update_student'] = 'admin_student/update_student';
$route['update_profile'] = 'admin_profile/update_profile';

$route['em-welcome'] = 'em_welcome';

$route['profile'] = 'admin_profile/profile';
$route['reset-password'] = 'admin_profile/reset_password';
$route['update_password'] = 'admin_profile/update_password';

$route['file-manager'] = 'admin_system/file_manager';
$route['save_upload'] = 'admin_system/save_upload';
$route['del_file_byID'] = 'admin_system/del_file_byID';

$route['list-news'] = 'admin_system/list_news';
$route['add-news'] = 'admin_system/add_news';
$route['save_news'] = 'admin_system/save_news';
$route['edit-news'] = 'admin_system/edit_news';
$route['update_news'] = 'admin_system/update_news';
$route['del_news_byID'] = 'admin_system/del_news_byID';
$route['setting'] = 'admin_system/setting';
$route['update_setting'] = 'admin_system/update_setting';
$route['data-genaral'] = 'admin_system/data_genaral';
$route['update_genaral'] = 'admin_system/update_genaral';

$route['help-register'] = 'admin_system/help_register';
$route['about'] = 'admin_system/about';
$route['contact'] = 'admin_system/contact';

$route['admin-meter'] = 'admin_meter/index';
$route['admin-add-meter'] = 'admin_meter/add_meter';
$route['save-add-meter'] = 'admin_meter/save_meter';
$route['data-pay'] = 'admin_meter/data_pay';

$route['check-dorm'] = 'welcome/check_dorm';

$route['register'] = 'welcome/register';

$route['admin-report-register'] = 'admin_report/report_register';
$route['search-register'] = 'admin_report/search_register';

$route['help-print'] = 'admin_system/help_print';
$route['help-lop'] = 'admin_system/help_lop';
$route['import_room'] = 'admin_dorm/import_room';




