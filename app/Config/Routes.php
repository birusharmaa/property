<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
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
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index');
$routes->get('/signin', 'Signin::index');
$routes->get('/forget-password', 'Login::forget_password');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/my-profile', 'Dashboard::my_profile');

$routes->get('/properties', 'Property::index');
$routes->get('/property-detail/(:any)', 'Property::property_detail/$1');
$routes->get('/edit-property-detail/(:any)', 'Property::edit_property_detail/$1');
$routes->get('/add-properties', 'Property::add_properties');
$routes->get('/duplicate-properties', 'Property::duplicate_properties');
$routes->get('/property-history', 'Property::property_history');
$routes->get('/allot-property', 'Property::allot_property');

$routes->get('/all-leads', 'Leads::index');
$routes->get('/lead-details', 'Leads::lead_details');
$routes->get('/add-leads', 'Leads::add_leads');
$routes->get('/leads-status', 'Leads::leads_status');
$routes->get('/leads-category', 'Leads::leads_category');
$routes->get('/leads-sub-category', 'Leads::leads_sub_category');
$routes->get('/leads-duplicate', 'Leads::leads_duplicate');
$routes->get('/assign-leads', 'Leads::assign_leads');
$routes->get('/agent-lead-commission', 'Leads::agent_lead_commission');
$routes->get('/all-employees', 'HR::index');
$routes->get('/add-employees', 'HR::add_employees');
$routes->get('/all-departments', 'HR::all_departments');
$routes->get('/all-designation', 'HR::all_designation');
$routes->get('/all-roles', 'HR::all_roles');
$routes->get('/attandance', 'HR::attandance');
$routes->get('/all-teams', 'HR::all_teams');
$routes->get('/add-teams', 'HR::add_teams');
$routes->get('/payroll', 'HR::payroll');
$routes->get('/leaves', 'HR::leaves');
$routes->get('/all-expenses', 'Finance::all_expenses');
$routes->get('/add-expense', 'Finance::add_expense');
$routes->get('/expense-type', 'Finance::expense_type');
$routes->get('/expense-report', 'Finance::expense_report');
$routes->get('/all-income', 'Finance::all_income');
$routes->get('/add-income', 'Finance::add_income');
$routes->get('/income-report', 'Finance::income_report');
$routes->get('/all-profit-loss', 'Finance::all_profit_loss');
$routes->get('/add-profit-loss', 'Finance::add_profit_loss');
$routes->get('/profile-loss-report', 'Finance::profile_loss_report');


$routes->get('/meetings', 'Meetings::index');

$routes->get('/front-office', 'FrontOffice::index');

$routes->get('/lead-status-report', 'Reports::lead_status_report');
$routes->get('/agent-commission-report', 'Reports::agent_commission_report');
$routes->get('/employee-sales-report', 'Reports::employee_sales_report');
$routes->get('/sales-report', 'Reports::sales_report');
$routes->get('/visit-report', 'Reports::visit_report');

$routes->get('/system', 'Security::index');
$routes->get('/data-storage', 'Security::data_storage');
$routes->get('/data-backup', 'Security::data_backup');
$routes->get('/data-extraction', 'Security::data_extraction');

$routes->get('/feedback', 'Feedback::index');

//Logout url
$routes->post('/login', 'Login::login');
$routes->get('/logout', 'Login::logout');



/**
 * Property Api routes
 */

$routes->group('api', function ($routes) {
    $routes->group('property', function ($routes) {
        $routes->post('save', 'Property::save');
        $routes->post('update', 'Property::update');
        $routes->post('uploadimages', 'Property::uploadImages');
        $routes->post('isPublished', 'Property::isPublished');
        $routes->post('delete', 'Property::delete');
        $routes->post('delete-image', 'Property::deleteImage');
        $routes->get('assign-property-list', 'Property::getAssignedAllList');
        $routes->get('show-assign/(:any)', 'Property::getAssignedListByid/$1');
        $routes->post('assign-property', 'Property::assignProperty');
        $routes->post('edit-assign', 'Property::editProperty');
        $routes->post('delete-assign', 'Property::deleteProperty');
    });

    $routes->group('hr', function ($routes) {
        $routes->group('designation', function ($routes) {
            $routes->get('list', 'HR::designationList');
            $routes->get('show/(:any)', 'HR::showDesignation/$1');
            $routes->post('save', 'HR::saveDesignation');
            $routes->post('update', 'HR::updateDesignation');
            $routes->post('delete', 'HR::deleteDesignation');
        });

        $routes->group('department', function ($routes) {
            $routes->get('list', 'HR::departmentList');
            $routes->get('show/(:any)', 'HR::showDepartment/$1');
            $routes->post('save', 'HR::saveDepartment');
            $routes->post('update', 'HR::updateDepartment');
            $routes->post('delete', 'HR::deleteDepartment');
        });

        $routes->group('employee', function ($routes) {
            $routes->get('list', 'Employees::index');
            $routes->get('show/(:any)', 'Employees::show/$1');
            $routes->get('edit/(:any)', 'HR::edit_employees/$1');
            $routes->post('save', 'Employees::create');
            $routes->post('update', 'Employees::update');
            $routes->post('delete', 'Employees::delete');
            $routes->post('uploadfile', 'Employees::uploadFiles');
        });
    });

    $routes->group('front-office', function ($routes) {
        $routes->get('list', 'FrontOffice::index');
        $routes->get('get-list', 'FrontOffice::getVisitorList');
        $routes->get('show/(:any)', 'FrontOffice::show/$1');
        $routes->post('save', 'FrontOffice::insert');
        $routes->post('update', 'FrontOffice::update');
        $routes->get('delete/(:any)', 'FrontOffice::delete/$1');
        $routes->get('out-time/(:any)', 'FrontOffice::updateOutTime/$1');
    });
    $routes->post('city/(:any)', 'Property::getCities/$1');
});



$routes->group('leadsApi', function ($routes) {
    $routes->get('all', 'Leads::allCategory');
    $routes->post('saveCategory', 'Leads::saveCategory');
    $routes->post('saveSubCategory', 'Leads::saveSubCategory');
    $routes->post('changeStatus', 'Leads::changeStatus');
    $routes->get('allSubCategory', 'Leads::allSubCategory');
    $routes->post('changeSubStatus', 'Leads::changeSubStatus');
    $routes->post('addLeads', 'Leads::addLeads');
    $routes->post('newLeads', 'Leads::newLeads');
    $routes->post('update-category', 'Leads::updatecategory');
    $routes->post('delete-category', 'Leads::deletecategory');
    $routes->post('update-subcategory', 'Leads::updatesubcategory');
    $routes->post('delete-subcategory', 'Leads::deletesubcategory');
    $routes->get('all-leads', 'Leads::all_leads');
    $routes->get('show-lead/(:any)', 'Leads::show_lead/$1');
    $routes->get('delete-lead', 'Leads::deletelead/$1');
    $routes->get('all-subcategory', 'Leads::getsubcategory');
    $routes->post('import', 'Leads::import');
    $routes->get('all-cities', 'Leads::allcities');
});


$routes->get('show-lead/(:any)', 'Leads::show_lead/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
