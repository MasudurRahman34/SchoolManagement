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



//only for Super Admin
Route::group(['middleware' => ['auth', 'role_or_permission:Super Admin']], function () {
    Route::post('/addSchoolBranch/store', 'backend\UserController@addSchoolBranch')->name('addSchoolBranch.store');
    Route::get('/createSchoolBranch', 'backend\UserController@createSchoolBranch')->name('createSchoolBranch');
    Route::get('/requestedUser', 'backend\UserController@requestedUser')->name('requestedUser');
    Route::get('/requestedUserData', 'backend\UserController@requestedUserData')->name('requestedUserData');
    Route::get('/accepRequestedUser', 'backend\UserController@requestedUserData')->name('requestedUserData');
});


//

//open route
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/applyInstitute', 'ApplyInstituteController@create')->name('applyInstitute');
Route::post('/applyInstitute/store', 'ApplyInstituteController@store')->name('applyInstitute.store');
Route::get('/createPermission', 'backend\UserController@createPermission')->name('createPermission');
Route::post('/addPermission', 'backend\UserController@addPermission')->name('addPermission');
//end open route



//userManagement
Route::group(['middleware' => ['auth','role_or_permission:User Management']], function () {
    Route::get('/create/userAndRole', 'backend\UserController@createUserAndRole')->name('createUserAndRole');
    Route::post('/add/userAndRole', 'backend\UserController@addUserAndRole')->name('addUserAndRole');
    Route::get('/createRole', 'backend\UserController@createRole')->name('createRole');
    Route::post('/addRole', 'backend\UserController@addRole')->name('addRole');
});
Route::group(['middleware' => ['api']], function () {
    Route::post('/add/userAndRole', 'backend\UserController@addUserAndRole')->name('addUserAndRole');
});

//class Management
Route::get('/class','backend\ClassesController@index')->name('class.index');
Route::post('/class/store','backend\ClassesController@store')->name('class.store');
Route::get('/class/show','backend\ClassesController@show')->name('class.show');
Route::get('/class/edit/{id}','backend\ClassesController@edit')->name('class.edt');
Route::post('/class/update/{id}','backend\ClassesController@update')->name('class.update');
Route::get('/class/delete/{id}','backend\ClassesController@destroy')->name('class.delete');

//

//section Management
Route::get('/section','backend\SectionController@index')->name('section.index');
Route::post('/section/store','backend\SectionController@store')->name('section.store');
Route::get('/section/show','backend\SectionController@show')->name('section.show');
Route::get('/section/edit/{id}','backend\SectionController@edit')->name('section.edt');
Route::post('/section/update/{id}','backend\SectionController@update')->name('section.update');
Route::get('/section/delete/{id}','backend\SectionController@destroy')->name('section.delete');

//sessionYear Management
Route::get('/sessionyear','backend\SessionYearController@index')->name('sessionyear.index');
Route::post('/sessionyear/store','backend\SessionYearController@store')->name('sessionyear.store');
Route::get('/sessionyear/show','backend\SessionYearController@show')->name('sessionyear.show');
Route::get('/sessionyear/edit/{id}','backend\SessionYearController@edit')->name('sessionyear.edt');
Route::post('/sessionyear/update/{id}','backend\SessionYearController@update')->name('sessionyear.update');
Route::get('/sessionyear/delete/{id}','backend\SessionYearController@destroy')->name('sessionyear.delete');






//permission and role



//misuk

