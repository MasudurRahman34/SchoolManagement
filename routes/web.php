<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin2', 'backend\AdminController@index')->name('admin.index');
Route::get('/manage/classes', 'backend\ClassesController@index')->name('manage.class');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/applyInstitute', 'ApplyInstituteController@create')->name('applyInstitute');
Route::post('/applyInstitute/store', 'ApplyInstituteController@store')->name('applyInstitute.store');



//userManagement
Route::get('/requestedUser', 'backend\UserController@requestedUser')->name('requestedUser');

Route::get('/create/userAndRole', 'backend\UserController@createUserAndRole')->name('createUserAndRole');
Route::post('/add/userAndRole', 'backend\UserController@addUserAndRole')->name('addUserAndRole');
Route::post('/addSchoolBranch/store', 'backend\UserController@addSchoolBranch')->name('addSchoolBranch.store');
Route::get('/createSchoolBranch', 'backend\UserController@createSchoolBranch')->name('createSchoolBranch');
//permission and role
Route::get('/createPermission', 'backend\UserController@createPermission')->name('createPermission');
Route::get('/createRole', 'backend\UserController@createRole')->name('createRole');
Route::post('/addPermission', 'backend\UserController@addPermission')->name('addPermission');
Route::post('/addRole', 'backend\UserController@addRole')->name('addRole');
Route::get('/createRole', 'backend\UserController@createRole')->name('createRole');
