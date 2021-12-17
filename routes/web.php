<?php

use App\Http\Controllers\API\UserController;
use App\Mail\mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', 'Customer\HomeController@index')->name('customer.home');
Route::get('mobile', function () {
    return view('frontend2mobile.property.index');
});
Route::resource('leadproperties', 'LeadPropertyController');


// -----------------------------------------------Customer Routes---------------------------------------------------------------------

Route::prefix('customer')->name('customer.')->namespace('Customer')->group(function () {
    Route::resource('home', 'HomeController');
    Route::resource('agency', 'AgencyController');
    Route::resource('agents', 'AgentController');
    Route::resource('property', 'PropertyController');
});
Route::post('customer/agency/ajax', 'Customer\AgencyController@ajax');
Route::post('customer/property/ajax', 'Customer\PropertyController@ajax');
// Route::post('customer/property/{id}','Customer\PropertyController@show')->name('customerproperty.show');
Route::post('customer/home/onstart', 'Customer\HomeController@onstartup');
Route::get('search', 'Customer\PropertyController@search')->name('customerproperty.search');
Route::get('propertyDetail', 'Customer\PropertyController@propertyDetail')->name('customerproperty.detail');
Route::get('/customer/agencyDetail/{id}', 'Customer\AgencyController@agencyDetail')->name('customeragency.detail');
Route::get('searchareas', 'Customer\PropertyController@searchajax');
Route::get('featuredproperties', 'Customer\PropertyController@search')->name('customer.properties.search');
Route::get('featuredprojects', 'Customer\ProjectController@index')->name('customer.projects.search');
Route::get('agencies/search', 'Customer\AgencyController@search')->name('customer.agencies.search');

Route::get('searchbar', 'Customer\HomeController@searchBar')->name('customer.searchbar');




// Route::name('customer.')->group(['prefix' => 'customer/'], function () {
//     Route::resource('properties', 'PropertyController');
// });




// -----------------------------------------------End Customer Routes---------------------------------------------------------------------


Auth::routes();
Route::group(['middleware' => 'auth'], function () {

    // Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('home/ajaxSearch', 'HomeController@ajaxSearch');

    Route::resource('users', 'UserController');
    Route::get('/userprofile', 'UserController@profile')->name('user.profile');
    Route::post('/usersajax', 'UserController@ajax');
    Route::post('saveimage', 'UserController@save_image');
    Route::post('imagerotate', 'UserController@rotate_image');
    Route::resource('agencies', 'AgencyController');
    Route::post('/agenciesajax', 'AgencyController@ajax');
    Route::resource('agentspecialities', 'AgentSpecialityController');
    Route::resource('agentareas', 'AgentAreaController');
    Route::resource('agents', 'AgentController');

    //-------------------Area Routes-----------------------------------

    Route::resource('areaones', 'AreaOneController');
    Route::resource('areatwos', 'AreaTwoController');
    Route::resource('areathrees', 'AreaThreeController');
    Route::resource('cities', 'CityController');

    //-------------------End Area Routes--------------------------------

    //-------------------Lead Routes------------------------------------

    Route::get('leads/filter', 'LeadController@filter')->name('leads.filter');
    Route::resource('leads', 'LeadController');
    Route::resource('leadassigns', 'LeadAssignController');
    Route::get('leadprojects/filter', 'LeadProjectController@filter')->name('leadprojects.filter');
    Route::resource('leadprojects', 'LeadProjectController');


    //-------------------End Lead Routes--------------------------------

    Route::resource('payments', 'PaymentController');

    //-------------------Extra Features--------------------------------
    Route::resource('leadsources', 'LeadSourceController');
    Route::resource('leadtypes', 'LeadTypeController');
    Route::resource('responsestatus', 'ResponseStatusController');
    Route::resource('callstatus', 'CallstatusController');
    Route::resource('propertytypes', 'PropertyTypeController');

    //-------------------Extra Features--------------------------------

    Route::get('categories/{id}', 'AgencyController@getSubCategory')->name('categories');
    Route::get('subcategories/{id}', 'AgencyController@getSubSubCategory')->name('subcategories');

    Route::post('lead/ajax', 'LeadController@ajax');
    Route::post('lead/ajaxSearch', 'LeadController@ajaxSearch');
    Route::post('users/ajaxSearch', 'LeadController@ajaxSearch');


    // --------------------------Project Routes-------------------------------------------

    Route::resource('projects', 'ProjectController');
    Route::resource('projectbuyers', 'ProjectBuyerController');
    Route::resource('projectshops', 'ProjectShopController');
    Route::resource('projectsales', 'ProjectSaleController');
    Route::resource('projectsalesinstallments', 'ProjectSaleInstallmentController');
    Route::resource('projects', 'ProjectController');
    Route::get('createproject', 'LeadController@createproject')->name('leads.createproject');
    Route::post('storeproject', 'LeadController@storeproject')->name('leads.storeproject');

    // ---------------------------End Project Routes-----------------------------------------

    // --------------------------------Property Routes-----------------------------------------------------------
    Route::get('filtered', 'PropertyController@filter')->name('properties.filter');
    Route::resource('properties', 'PropertyController');
    Route::resource('surveyproperties', 'SurveyPropertyController');
    Route::resource('propertyfor', 'PropertyForController');
    Route::resource('propertyimages', 'PropertyImageController');
    Route::get('propertyimages/delete/{id}', 'PropertyImageController@destroy')->name('propertyimages.delete');
    Route::resource('propertysocials', 'PropertySocialController');
    Route::resource('publicnotice', 'PublicNoticeController');

    // --------------------------------End Property Routes-----------------------------------------------------------

    Route::resource('roles', 'RoleController');
    Route::resource('specialities', 'SpecialityController');
    Route::resource('states', 'StateController');
    Route::resource('projectusers', 'ProjectUserController');

    Route::get('properties/byparent', 'PropertyController@byParent')->name('properties.by_parent');
    Route::get('surveyproperties/byparent', 'PropertyController@byParent')->name('surveyproperties.by_parent');

    Route::get('propertiessearch', 'PropertyController@search')->name('properties.search');
    Route::get('filter', 'AgencyController@filter')->name('agencies.filter');
    Route::get('filter1', 'AgentController@filter')->name('agents.filter');
    Route::get('filteredd', 'PropertyController@filter')->name('surveyproperties.filter');
    Route::post('user/locked', 'UserController@locked');

    Route::get('filtere', 'UserController@filter')->name('users.filter');
});

Route::get('upgrade', 'HomeController@upgrade')->name('upgrade');

Route::get('runscript', 'AreaOneController@show');

// --------------------------------------------Excel Routes-------------------------------------------------------------

Route::get('importExportView', 'MyController@importExportView')->name('leads.import');
Route::get('export', 'MyController@export')->name('export');
Route::post('import', 'MyController@import')->name('import');

// --------------------------------------------End Excel Routes---------------------------------------------------------


// ----------------------------------------------Payment Routes---------------------------------------------------------

Route::get('stripe', 'PaymentController@stripe')->name('stripe');
Route::post('stripe', 'PaymentController@stripePost')->name('stripe.post');

// ----------------------------------------------End Payment Routes-----------------------------------------------------

