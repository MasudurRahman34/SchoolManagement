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

//admin deshboard api
Route::get('/api/search/totalstudent', 'backend\api\apiController@totalStudent')->name('api.totalStudent');
Route::get('api/search/StudentAttendancePercentage/{id}', 'backend\api\apiController@StudentAttendancePercentage')->name('api.StudentAttendancePercentage');
Route::get('api/search/totalTeacher', 'backend\api\apiController@totalTeacher')->name('api.totalTeacher');
Route::get('api/search/totalUser', 'backend\api\apiController@totalUser')->name('api.totalUser');
Route::get('api/search/totalsection', 'backend\api\apiController@totalsection')->name('api.totalsection');
Route::get('api/search/classwishAttentage', 'backend\api\apiController@classwishAttentage')->name('api.classwishAttentage');



Auth::routes();
//api routes

Route::post('api/search/sectionbyclass', 'backend\api\apiController@sectionbyclass')->name('api.sectionbyclass');
Route::post('api/search/classsubject', 'backend\api\apiController@classsubject')->name('api.classsubject');

Route::group(['prefix' => 'api', 'namespace'=>'backend\api'], function () {
    Route::post('/search/section', 'apiController@section')->name('api.section');
    Route::get('/roleHasClassTeacher/{id}', 'apiController@roleHasClassTeacher')->name('api.roleHasClassTeacher');
    Route::get('/lastRoll/{sectionId}', 'apiController@lastRoll')->name('api.lastRoll');
});


//end api routes


//student login

Route::group(['prefix' => 'student', 'namespace'=>'auth\student'], function () {
    Route::get('/login', 'LoginController@showLoginForm')->name('student.login');
    Route::post('/login', 'LoginController@login')->name('student.login');
    Route::post('/logout', 'LoginController@logout')->name('student.logout');
});


//student pages
Route::group(['prefix' => 'student', 'namespace'=>'backend\student'], function () {
Route::get('/index', 'StudentController@index')->name('student.index');
Route::get('/show/profile', 'StudentController@show')->name('student.show');
Route::get('edit/profile','StudentController@edit')->name('student.edit.profile');
Route::post('update/profile','StudentController@update')->name('student.update.profile');
//Student password change route
Route::post('/change/password','StudentController@changePassword')->name('change.password');
//Other information route
Route::post('update/otherInfo','StudentController@otherInfo')->name('update.otherInfo');


//studentTeacherList
Route::get('/teacher/list', 'StudentTeacherListController@index')->name('student.teacherList');
Route::get('/teacher/list/show', 'StudentTeacherListController@show')->name('student.teacherList.show');

//student subject List
Route::get('/subject/list', 'StudentSubjectListController@index')->name('student.subjectlist');
// Route::get('/subject/show', 'StudentSubjectListController@show')->name('student.');


//student class information
Route::get('/class/classmates', 'StudentClassController@index')->name('student.classmates');
Route::get('/class/classmates/show', 'StudentClassController@show')->name('student.classmates.show');

//student dashBord card

Route::get('/totalstudent', 'StudentController@totalStudent')->name('student.totalStudent');

//student Attendance view
Route::get('/attendance/index', 'StudentAttendanceController@index')->name('attendence.index');
Route::get('/attendance/show/{id}', 'StudentAttendanceController@show')->name('attendence.show');
Route::get('/attendance/attendancePercentage/{id}', 'StudentAttendanceController@attendancePercentage')->name('attendence.attendancePercentage');




//Student school Corner
Route::get('/school/corner', 'StudentController@schoolCorner')->name('school.corner');
Route::get('/event/details', 'StudentController@eventDetails')->name('event.details');
});
//endforstudent

//student pages for admin
Route::group(['middleware' => ['auth', 'role_or_permission:Student'], 'prefix'=>'mystudent', 'namespace'=>'backend'], function () {
    Route::get('/list/index', 'MyStudentConttroller@index')->name('mystudent.index');
    Route::get('/list', 'MyStudentConttroller@allstudentlist')->name('mystudent.allstudentlist');
    Route::get('/classwise', 'MyStudentConttroller@classwise')->name('mystudent.classwise');
    Route::get('/classwiseList/{id}', 'MyStudentConttroller@classwiseList')->name('mystudent.classwiseList');
    

    Route::get('/sectionwise', 'MyStudentConttroller@Sectionwise')->name('mystudent.sectionwise');
    Route::get('/sectionwiselist/{classId}/{sectionId}', 'MyStudentConttroller@sectionwiselist')->name('mystudent.sectionwiselist');

    Route::get('/previous', 'MyStudentConttrollerr@previous')->name('mystudent.previous');
    Route::get('/show/studentProfile/{id}', 'MyStudentConttroller@show')->name('mystudent.showProfile');
    Route::get('edit/studentProfile/{id}','MyStudentConttroller@edit')->name('mystudent.editProfile');
    Route::post('update/studentProfile/{id}','MyStudentConttroller@update')->name('mystudent.update');

});

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
Route::group(['middleware' => ['auth','role_or_permission:User Management'], 'namespace'=>'backend'], function () {
    Route::get('/create/userAndRole', 'UserController@createUserAndRole')->name('createUserAndRole');
    Route::get('/userAndRole/list', 'UserController@UserAndRoleList')->name('UserAndRole.list');
    Route::post('/add/userAndRole', 'UserController@addUserAndRole')->name('addUserAndRole');
    Route::get('/createRole', 'UserController@createRole')->name('createRole');
    Route::post('/addRole', 'UserController@addRole')->name('addRole');
    //show user profile
    Route::get('/show/Userprofile', 'UserController@show')->name('user.show');
    //edit
    Route::get('user/edit/profile','UserController@edit')->name('userEditProfile');
    //update
    Route::post('user/update/profile','UserController@update')->name('userUpdate.profile');
     //Student password change route
    Route::post('/user/change/password','UserController@changePassword')->name('userChange.password');
});
Route::group(['middleware' => ['api']], function () {
    Route::post('/add/userAndRole', 'backend\UserController@addUserAndRole')->name('addUserAndRole');
});

//Admission
Route::group(['middleware' => ['auth','role_or_permission:Class'],'prefix'=>'admission', 'namespace'=>'backend'], function () {

    Route::get('/','AdmissionController@index')->name('admissison.index');
    Route::post('/store','AdmissionController@store')->name('admission.store');

});
//class Management
Route::group(['middleware' => ['auth','role_or_permission:Class']], function () {

    Route::get('/class','backend\ClassesController@index')->name('class.index');
    Route::post('/class/store','backend\ClassesController@store')->name('class.store');
    Route::get('/class/show','backend\ClassesController@show')->name('class.show');
    Route::get('/class/edit/{id}','backend\ClassesController@edit')->name('class.edt');
    Route::post('/class/update/{id}','backend\ClassesController@update')->name('class.update');
    Route::get('/class/delete/{id}','backend\ClassesController@destroy')->name('class.delete');
});

//section Management
Route::group(['middleware' => ['auth','role_or_permission:Section']], function () {

    Route::get('/section','backend\SectionController@index')->name('section.index');
    Route::post('/section/store','backend\SectionController@store')->name('section.store');
    Route::get('/section/show','backend\SectionController@show')->name('section.show');
    Route::get('/section/edit/{id}','backend\SectionController@edit')->name('section.edt');
    Route::post('/section/update/{id}','backend\SectionController@update')->name('section.update');
    Route::get('/section/delete/{id}','backend\SectionController@destroy')->name('section.delete');

});

//sessionYear Management
Route::group(['middleware' => ['auth','role_or_permission:SessionYear']], function () {

    Route::get('/sessionyear','backend\SessionYearController@index')->name('sessionyear.index');
    Route::post('/sessionyear/store','backend\SessionYearController@store')->name('sessionyear.store');
    Route::get('/sessionyear/show','backend\SessionYearController@show')->name('sessionyear.show');
    Route::get('/sessionyear/edit/{id}','backend\SessionYearController@edit')->name('sessionyear.edt');
    Route::post('/sessionyear/update/{id}','backend\SessionYearController@update')->name('sessionyear.update');
    Route::get('/sessionyear/delete/{id}','backend\SessionYearController@destroy')->name('sessionyear.delete');

});


//group Management
Route::group(['middleware' => ['auth','role_or_permission:Group']], function () {

    Route::get('/group','backend\GroupController@index')->name('group.index');
    Route::post('/group/store','backend\GroupController@store')->name('group.store');
    Route::get('/group/show','backend\GroupController@show')->name('group.show');
    Route::get('/group/edit/{id}','backend\GroupController@edit')->name('group.edt');
    Route::post('/group/update/{id}','backend\GroupController@update')->name('group.update');
    Route::get('/group/delete/{id}','backend\GroupController@destroy')->name('group.delete');

});

//subject Management
Route::group(['middleware' => ['auth','role_or_permission:Subject']], function () {

    Route::get('/subject','backend\SubjectController@index')->name('subject.index');
    Route::post('/subject/store','backend\SubjectController@store')->name('subject.store');
    Route::get('/subject/show','backend\SubjectController@show')->name('subject.show');
    Route::get('/subject/edit/{id}','backend\SubjectController@edit')->name('subject.edt');
    Route::post('/subject/update/{id}','backend\SubjectController@update')->name('subject.update');
    Route::get('/subject/delete/{id}','backend\SubjectController@destroy')->name('subject.delete');
});

//admission Management


//

//Attendance Management
Route::group(['middleware' => ['auth','role_or_permission:Attendance']], function () {
    Route::get('/student/attendance','backend\AttendanceController@index')->name('attendance.index');
    Route::post('/student/attendance/store','backend\AttendanceController@storeAttendence')->name('store.attendence');
    Route::post('/student/attendance/update','backend\AttendanceController@update')->name('update.attendence');
    Route::get('/student/attendance/edit/{sectionId}','backend\AttendanceController@edit')->name('attendance.edit');

    Route::get('/student/attendance/classwish','backend\AttendanceController@classwish')->name('attendance.classwish');

    Route::get('/student/attendance/bydate','backend\AttendanceController@bydate')->name('attendance.bydate');
    Route::post('/student/attendance/studentData','backend\AttendanceController@studentData')->name('studentData.attendence');
    Route::post('/student/attendance/studentDatabydate','backend\AttendanceController@studentDatabydate')->name('attendance.studentDatabydate');
    Route::get('/student/attendance/datewishAttendance/{dateId}/{sectionId}','backend\AttendanceController@datewishAttendance')->name('attendance.datewishAttendance');
});

//Marks Distribution
Route::get('adminview/student/marksdistribution','backend\MarksDistributionController@index')->name('marks.index');
Route::get('adminview/student/sectionwiselist/{classId}/{sectionId}', 'backend\MarksDistributionController@sectionwiselist')->name('mystudent.sectionwiselist');
Route::post('adminview/student/studentData','backend\MarksDistributionController@studentData')->name('studentData.mark');
Route::post('adminview/student/markstore','backend\MarksDistributionController@storemark')->name('store.mark');
//permission and role



//misuk14/11/19

