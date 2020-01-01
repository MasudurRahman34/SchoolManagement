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
// Route::get('/admin/sectionAttendance', 'backend\AdminController@sectionAttendance')->name('admin.sectionAttendance');
Route::get('/manage/classes', 'backend\ClassesController@index')->name('manage.class');

//admin deshboard api
Route::get('/api/search/totalstudent', 'backend\api\apiController@totalStudent')->name('api.totalStudent');
Route::get('api/search/StudentAttendancePercentage/{id}', 'backend\api\apiController@StudentAttendancePercentage')->name('api.StudentAttendancePercentage');
Route::get('api/search/totalTeacher', 'backend\api\apiController@totalTeacher')->name('api.totalTeacher');
Route::get('api/search/totalUser', 'backend\api\apiController@totalUser')->name('api.totalUser');
Route::get('api/search/totalsection', 'backend\api\apiController@totalsection')->name('api.totalsection');
Route::get('api/search/classwishAttentage', 'backend\api\apiController@classwishAttentage')->name('api.classwishAttentage');
Route::get('api/search/sectionAttendance/{classId}/{sectionId}/{dateId}', 'backend\api\apiController@sectionAttendance')->name('api.sectionAttendance');

//student section api for attendance count
Route::get('api/search/present/{id}', 'backend\api\apiController@present')->name('api.present');
Route::get('api/search/absent/{id}', 'backend\api\apiController@absent')->name('api.absent');
//student section api for datatable
Route::get('/api/search/studentname', 'backend\api\apiController@studentname')->name('api.studentname');


Route::post('/api/search/sectionbyclass', 'backend\api\apiController@sectionbyclass')->name('api.sectionbyclass');
Route::post('/api/search/classsubject', 'backend\api\apiController@classsubject')->name('api.classsubject');

//find fee list for class
Route::get('/api/search/classfeelist', 'backend\api\apiController@classfeelist')->name('api.classfeelist');

//find fee amount
Route::get('/api/search/feeamount', 'backend\api\apiController@feeamount')->name('api.feeamount');



Auth::routes();
//api routes



Route::group(['prefix' => 'api', 'namespace'=>'backend\api'], function () {
    Route::post('/search/section', 'apiController@section')->name('api.section');
    Route::get('/roleHasClassTeacher/{id}', 'apiController@roleHasClassTeacher')->name('api.roleHasClassTeacher');
    Route::get('/lastRoll/{sectionId}', 'apiController@lastRoll')->name('api.lastRoll');
    Route::get('/checkClassHasOptionalSubject/{classId}/{group}', 'apiController@checkClassHasOptionalSubject')->name('api.checkClassHasOptionalSubject');
});


//end api routes


//student login

Route::group(['prefix' => 'student', 'namespace'=>'Auth\student'], function () {
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
    Route::post('/change/password','StudentController@changePassword')->name('change.password');
    Route::post('update/otherInfo','StudentController@otherInfo')->name('update.otherInfo');
    Route::get('/teacher/list', 'StudentTeacherListController@index')->name('student.teacherList');
    Route::get('/teacher/list/show', 'StudentTeacherListController@show')->name('student.teacherList.show');
    Route::get('/subject/list', 'StudentSubjectListController@index')->name('student.subjectlist');
    Route::get('/class/classmates', 'StudentClassController@index')->name('student.classmates');
    Route::get('/class/classmates/show', 'StudentClassController@show')->name('student.classmates.show');
    Route::get('/totalstudent', 'StudentController@totalStudent')->name('student.totalStudent');
    Route::get('/attendance/index', 'StudentAttendanceController@index')->name('attendence.index');
    Route::get('/attendance/show/{id}', 'StudentAttendanceController@show')->name('attendence.show');
    Route::get('/attendance/attendancePercentage/{id}', 'StudentAttendanceController@attendancePercentage')->name('attendence.attendancePercentage');

    //Student school Corner
    Route::get('/school/corner', 'StudentController@schoolCorner')->name('school.corner');
    Route::get('/event/details', 'StudentController@eventDetails')->name('event.details');
    Route::get('/school/gallery', 'StudentController@gellary')->name('school.gallery');
    Route::get('/school/about', 'StudentController@about')->name('school.about');
    Route::get('/student/fee/index','StudentFeeController@index')->name('student.fee.index');
    Route::get('/fee/show/{id}', 'StudentFeeController@show')->name('student.fee.show');
    Route::get('/due/fee/show', 'StudentFeeController@dueFee')->name('student.due.fee');
    Route::get('/due2/fee/show/{id}', 'StudentFeeController@dueFee2')->name('student.due.fee2');

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
    Route::get('/show/Userprofile', 'UserController@show')->name('user.show');
    Route::get('user/edit/profile','UserController@edit')->name('userEditProfile');
    Route::post('user/update/profile','UserController@update')->name('userUpdate.profile');
    Route::post('/user/change/password','UserController@changePassword')->name('userChange.password');
});
Route::group(['middleware' => ['api']], function () {
    Route::post('/add/userAndRole', 'backend\UserController@addUserAndRole')->name('addUserAndRole');
});

//Admission
Route::group(['middleware' => ['auth','role_or_permission:Admission'],'prefix'=>'admission', 'namespace'=>'backend'], function () {

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

    //Fee Management for admin
    Route::get('/fee','backend\FeeController@index')->name('fee.index');
    Route::post('/fee/store','backend\FeeController@store')->name('fee.store');
    Route::get('/fee/show','backend\FeeController@show')->name('fee.show');
    Route::get('/fee/edit/{id}','backend\FeeController@edit')->name('fee.edt');
    Route::post('/fee/update/{id}','backend\FeeController@update')->name('fee.update');
    Route::get('/fee/delete/{id}','backend\FeeController@destroy')->name('fee.delete');
    Route::get('/getAllFeesByClass/{classId}','backend\FeeController@getAllFeesByClass')->name('getAllFeesByClass');

    //feeHisory admin view
    Route::get('/feehistory','backend\FeeHistoryController@index')->name('feehistory.index');
    Route::get('/feehistory/show','backend\FeeHistoryController@show')->name('feehistory.show');



    //feecollection management for admin
    Route::get('/feecollection','backend\FeeCollectionController@index')->name('feecollection.index');
    Route::post('/feecollection/student/Data','backend\FeeCollectionController@student')->name('feecollection.studentdata');
    Route::post('/feecollection/store','backend\FeeCollectionController@store')->name('store.feecollection');
    Route::post('/feecollection/update','backend\FeeCollectionController@update')->name('update.feecollection');

    //individual fee Collection Management for admin
    Route::get('/feecollection/individual','backend\FeeCollectionController@individualCollection')->name('individualFee.individualCollection');
    Route::get('/feecollection/individualStudent','backend\FeeCollectionController@individualStudent')->name('individualFee.individualStudent');
    Route::get('/feecollection/individualStudentfind','backend\FeeCollectionController@individualStudentfind')->name('individualFee.individualStudentfind');
    Route::get('/feecollection/scholarshipAmount','backend\FeeCollectionController@scholarshipAmount')->name('individualFee.scholarshipAmount');
    Route::post('/feecollection/individual/store','backend\FeeCollectionController@storeIndividualy')->name('store.individualFeecollection');
    Route::post('/feecollection/individual/update','backend\FeeCollectionController@updateIndividualStudent')->name('update.individualFeecollection');

    //Student Fee Details
    Route::get('/feecollection/student/feeDetails','backend\FeeCollectionController@studentFeeDetails')->name('student.feeDetails');
    Route::get('/feecollection/individualStudentDetails','backend\FeeCollectionController@individualFeeDetails')->name('individualStudent.feeDtails');
    Route::get('/feecollection/details/show/{month}/{studentId}', 'backend\FeeCollectionController@dueDetailsFee')->name('individualStudent.studentDue.fees');
    //Route::get('/feecollection/studentMonthly/paiedFee/{month}/{studentId}','backend\FeeCollectionController@studentMonthlyPaiedFee')->name('student.monthlyPaiedFee');






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

    //my class option
    Route::get('/myclass/attendance','backend\AttendanceController@myclassattendance')->name('myclass.attendance');

});

//Marks Distribution
Route::get('adminview/student/marksdistribution','backend\MarksDistributionController@index')->name('marks.index');
Route::get('adminview/student/sectionwiselist/{classId}/{sectionId}', 'backend\MarksDistributionController@sectionwiselist')->name('mystudent.sectionwiselist');
Route::post('adminview/student/studentData','backend\MarksDistributionController@studentData')->name('studentData.mark');
Route::post('adminview/student/markstore','backend\MarksDistributionController@storemark')->name('store.mark');

//schoolarship Management for admin 
Route::get('/schoolarship/Management','backend\ScholarshipController@index')->name('scholarship.management');
Route::post('/schoolarship/store','backend\ScholarshipController@store')->name('scholarship.store');
Route::get('/schoolarship/show','backend\ScholarshipController@show')->name('scholarship.show');
Route::get('/schoolarship/edit/{id}','backend\ScholarshipController@edit')->name('scholarship.edt');
Route::post('/schoolarship/update/{id}','backend\ScholarshipController@update')->name('scholarship.update');
Route::get('/schoolarship/delete/{id}','backend\ScholarshipController@destroy')->name('scholarship.delete');

    // Route::get('/class/edit/{id}','backend\ClassesController@edit')->name('class.edt');
    // Route::post('/class/update/{id}','backend\ClassesController@update')->name('class.update');
    // Route::get('/class/delete/{id}','backend\ClassesController@destroy')->name('class.delete');
// Route::group(['middleware' => ['auth','role_or_permission:Scholarship'], 'namespace'=>'backend'], function () {

// });
//


//permission and role



//misuk14/11/19
