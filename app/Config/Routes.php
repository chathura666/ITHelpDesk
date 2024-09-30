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
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');

$routes->get('/', 'Login::index');
$routes->post('/login', 'Login::login');
$routes->get('/lock', 'Login::lock');
$routes->get('/logout', 'Login::logout');

$routes->get('/invalidLogin', 'Login::logout');
$routes->get('/errorLogin', 'Login::errorLogin');

$routes->get('/dashboard', 'Home::homepage');



$routes->get('/role/view', 'RoleManagementController::getrolelist');
$routes->get('/role/all', 'RoleManagementController::getallroles');
$routes->get('/role/add', 'RoleManagementController::getrolelisttoadd');
$routes->get('/role/edit', 'RoleManagementController::getrolelisttoedit');
$routes->get('/role/edit/(:any)', 'RoleManagementController::getselectedrole/$1');
$routes->get('/role/delete/(:any)', 'RoleManagementController::deleteselectedrole/$1');
$routes->post('/role/save', 'RoleManagementController::save');
$routes->post('/role/update', 'RoleManagementController::searchAndUpdate');
$routes->post('/role/change_status', 'RoleManagementController::searchAndUpdateStatus');

$routes->get('/rolemodel/view', 'RoleManagementController::getrole');
$routes->get('/rolemodel/view/permissions/(:num)', 'RoleManagementController::getrolegroupaccesslist/$1');
$routes->post('/rolemodel/update/permissions', 'RoleManagementController::updatepermissions');
$routes->post('/role/update_rolegroup', 'RoleManagementController::updaterolegroup');


$routes->get('/user/view', 'UserManagementController::getuserlist');
$routes->post('/user/viewreport', 'UserManagementController::getuserlistreport');
$routes->get('/user/add', 'UserManagementController::getuserlisttoadd');
$routes->get('/user/edit', 'UserManagementController::getloggedUser');
$routes->get('/user/edit/(:any)', 'UserManagementController::getselecteduser/$1');
$routes->get('/user/delete/(:any)', 'UserManagementController::deleteselecteduser/$1');
$routes->post('/user/save', 'UserManagementController::save');
$routes->post('/user/update', 'UserManagementController::searchAndUpdate');
$routes->post('/user/change_password', 'UserManagementController::searchAndUpdatePassword');
$routes->post('/user/reset_password', 'UserManagementController::searchAndResetPassword');
$routes->post('/user/change_status', 'UserManagementController::searchAndUpdateStatus');
$routes->post('/user/getDetails', 'UserManagementController::searchUser');



$routes->get('/unit/view', 'UnitManagementController::getunitlist');
$routes->get('/unit/all', 'UnitManagementController::getallunits');
$routes->get('/unit/add', 'UnitManagementController::getunitlisttoadd');
$routes->post('/unit/save', 'UnitManagementController::save');
$routes->get('/unit/edit', 'UnitManagementController::getunitlisttoedit');
$routes->get('/unit/edit/(:any)', 'UnitManagementController::getselectedunit/$1');
$routes->post('/unit/update', 'UnitManagementController::searchAndUpdate');
$routes->get('/unit/delete/(:any)', 'UnitManagementController::deleteselectedunit/$1');
$routes->post('/unit/change_status', 'UnitManagementController::searchAndUpdateStatus');


$routes->get('/hardwaretypes/view', 'HardwareController::gettypelist');
$routes->get('/hardwaretypes/add', 'HardwareController::gettypelisttoadd');
$routes->get('/hardwaretypes/edit', 'HardwareController::getuserlisttoedit');
$routes->get('/hardwaretypes/edit/(:any)', 'HardwareController::getselectedtype/$1');
$routes->get('/hardwaretypes/delete/(:any)', 'HardwareController::deletetype/$1');
$routes->post('/hardwaretypes/save', 'HardwareController::savetype');
$routes->post('/hardwaretypes/update', 'HardwareController::searchandupdatetype');

$routes->get('/hardwarebrands/view', 'HardwareController::getbrandlist');
$routes->get('/hardwarebrands/add', 'HardwareController::getbrandlisttoadd');
$routes->get('/hardwarebrands/edit', 'HardwareController::getbrandlisttoedit');
$routes->get('/hardwarebrands/edit/(:any)', 'HardwareController::getselectedbrand/$1');
$routes->get('/hardwarebrands/delete/(:any)', 'HardwareController::deletebrand/$1');
$routes->post('/hardwarebrands/save', 'HardwareController::savebrand');
$routes->post('/hardwarebrands/update', 'HardwareController::searchandupdatebrand');

$routes->get('/hardwaremodels/view', 'HardwareController::getmodellist');
$routes->get('/hardwaremodels/add', 'HardwareController::getmodellisttoadd');
$routes->get('/hardwaremodels/edit', 'HardwareController::getmodellisttoedit');
$routes->get('/hardwaremodels/edit/(:any)', 'HardwareController::getselectedmodel/$1');
$routes->get('/hardwaremodels/delete/(:any)', 'HardwareController::deletemodel/$1');
$routes->post('/hardwaremodels/save', 'HardwareController::savemodel');
$routes->post('/hardwaremodels/update', 'HardwareController::searchandupdatemodel');

$routes->post('/hardwareMapping/getbrandsbytype', 'HardwareController::getmappinglistbytype');
$routes->post('/hardwareMapping/getmodelsbytypeandbrand', 'HardwareController::getmappinglistbytypeandbrand');

$routes->get('/issue/view', 'IssueController::getissuelist');
$routes->get('/issue/add', 'IssueController::getissuelisttoadd');
$routes->get('/issue/edit', 'IssueController::getissuelisttoedit');
$routes->get('/issue/edit/(:any)', 'IssueController::getselectedissue/$1');
$routes->get('/issue/delete/(:any)', 'IssueController::deleteselectedissue/$1');
$routes->post('/issue/save', 'IssueController::saveissue');
$routes->post('/issue/update', 'IssueController::searchAndUpdate');
$routes->post('/issue/gethardwareissues', 'IssueController::gethardwareissues');
$routes->post('/issue/getsoftwareissues', 'IssueController::getsoftwareissues');
$routes->post('/issue/gethardwareissuesbytype', 'IssueController::gethardwareissuesbytype');

//view all tickets
$routes->get('/ticket/all', 'TicketController::getallticketlist');
$routes->get('/ticket/edit/(:any)', 'TicketController::getselectedtickettoedit/$1');


$routes->get('/ticket/personalview', 'TicketController::getallticketlist');
$routes->get('/ticket/agentview/(:any)', 'TicketController::getagentticketlist/$1');
$routes->get('/ticket/pending', 'TicketController::getunitpending');
$routes->get('/ticket/approve', 'TicketController::getapprovalpending');


$routes->post('/ticket/viewreport', 'TicketController::getticketlistreport');
$routes->get('/ticket/manageticket', 'TicketController::manageticketlist');
$routes->get('/ticket/unitwise/(:any)', 'TicketController::getallticketlistunitwise/$1');
$routes->get('/ticket/add', 'TicketController::getticketlisttoadd');
$routes->post('/ticket/save', 'TicketController::saveticket');

$routes->post('/ticket/update', 'TicketController::searchAndUpdate');
$routes->post('/ticket/upload', 'TicketController::fileupload');

$routes->get('/ticket/history/(:any)', 'TicketController::tickethistory/$1');
$routes->get('/ticket/status/(:any)', 'TicketController::ticketStatusList/$1');
$routes->get('/ticket/assign/(:any)', 'TicketController::ticketAssignList/$1');
$routes->get('/ticket/transfer/(:any)', 'TicketController::ticketTransferList/$1');

$routes->get('/ticket/details/(:any)', 'TicketController::getselecteticket/$1');
$routes->get('/ticket/manage/(:any)', 'TicketController::getsearchedticket/$1');
$routes->get('/ticket/remote/(:any)', 'TicketController::startRemoteSession/$1');
$routes->post('/ticket/changestatus', 'TicketController::searchAndUpdateStatus');
$routes->post('/ticket/changeagent', 'TicketController::searchAndUpdateAgent');
$routes->post('/ticket/changeunit', 'TicketController::searchAndUpdateUnit');

$routes->get('/issueVsUnit/view', 'IssueVsUnitController::getIssueVsUnitList');
$routes->get('/issueVsUnit/add', 'IssueVsUnitController::getIssueVsUnitListToAdd');
$routes->get('/issueVsUnit/edit', 'IssueVsUnitController::getIssueVsUnitListToEdit');
$routes->get('/issueVsUnit/edit/(:any)', 'IssueVsUnitController::getSelectedIssueVsUnit/$1');
$routes->get('/issueVsUnit/delete/(:any)', 'IssueVsUnitController::deleteSelectedIssueVsUnit/$1');
$routes->post('/issueVsUnit/save', 'IssueVsUnitController::saveIssueVsUnit');
$routes->post('/issueVsUnit/update', 'IssueVsUnitController::searchAndUpdateIssueVsUnit');


$routes->get('/notification/latestNotifications', 'NotificationController::getlatestNotifications');
$routes->get('/notification/latestNotificationsCount', 'NotificationController::getlatestCount');
$routes->get('/notification/markasread/(:any)', 'NotificationController::searchAndUpdateNotification/$1');
$routes->get('/notification/markallasread', 'NotificationController::searchAndUpdateAllNotification');
$routes->get('/notification/sendEmail', 'NotificationController::sendEmail');






$routes->get('/rolerequest/getroletoedit/(:any)', 'RoleManagementController::getselectedrole/$1');
$routes->get('/user/new', 'Usermanagement::getrolelist');

$routes->get('/report', 'ReportController::viewReports');
$routes->get('/report/user', 'ReportController::viewUserReports');
$routes->get('/report/ticket', 'ReportController::viewTicketReports');


$routes->get('/FAQ/view', 'FAQController::viewFAQ');
$routes->get('/FAQ/(:segment)', 'FAQController::download/$1');
$routes->get('/attachment/(:segment)', 'FAQController::downloadattachment/$1');



// $routes->get('/authentication/authorise', 'Firewallrequest::pendingrequestlist');

$routes->setAutoRoute(true);

// $routes->get('/requests/pendinglist', 'Firewallrequest::addnew')






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
