<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'middleware' => 'auth',
    'uses' => 'MainPageController@index'
]);

Route::get('/dashboard', [
    'middleware' => 'auth',
    'uses' => 'MainPageController@chooseDashboard'
]);


Route::get('/get_farmer_add', [
    'middleware' => 'auth',
    'uses' => 'MainPageController@getFarmerAdd'
]);
Route::post('post_add', 'MainPageController@postAdd');
 


// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

//route for setting roles
Route::get('/permission/role','PermissionController@roleDisplay');
Route::post('/permission/submitrole','PermissionController@role');
//route for setting permission for the assigned roles
Route::get('/permission/permission','PermissionController@permissionDisplay');
Route::post('/permission/submitpermission','PermissionController@permission');
//route for setting the user-role
Route::get('/permission/user_role','PermissionController@user_role_display');
Route::get('/permission/{id}/submit_user_role','PermissionController@submit_user_role');
Route::post('/permission/store_role','PermissionController@add_user_role');
//route for setting the role-permission
Route::get('/permission/role_permission','PermissionController@role_permission_display');
Route::post('/permission/submit_role_permission','PermissionController@submit_role_permission');
 


Route::get('/getallvisitorsforthisdaterange','MainPageController@getAllVisitorForThisDateRange');
Route::get('/showresidentsguestlog','MainPageController@showLogForThisResident');
Route::get('/gethostnames','MainPageController@getAllHostNames');
Route::get('/guestrecords','MainPageController@getRecordsAgainstThisUser');


Route::post('/getallthana','MainPageController@getAllThana');
Route::post('/getallcategories','MainPageController@getAllCategories');