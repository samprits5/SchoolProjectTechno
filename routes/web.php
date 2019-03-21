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

Route::get('/', 'HomeController@index')->name('root');
Route::get('/#about', 'HomeController@index')->name('about');
Route::get('/#exams', 'HomeController@index')->name('rootexams');
Route::get('/#contact', 'HomeController@index')->name('rootcontact');
Route::get('/#team', 'HomeController@index')->name('rootadmission');
Route::get('/#notice', 'HomeController@index')->name('rootnotice');
Route::get('/#result', 'HomeController@index')->name('rootresult');

Route::get('/login/student', 'HomeController@studend_login')->middleware('clog')->name('std_login');
Route::post('/login/student/send', 'HomeController@loginStudent')->middleware('clog')->name('loginStudent');

Route::get('/login/teacher', 'HomeController@teacher_login')->middleware('clog')->name('tch_login');
Route::get('/logout', 'HomeController@logout')->name('uilogout')	;
Route::post('/login/teacher/send', 'HomeController@loginTeacher')->middleware('clog')->name('loginTeacher');

Route::post('/query', 'HomeController@query')->name('uiquery');
Route::post('/contact', 'HomeController@contact')->name('uicontact');


Route::get('/admin', 'AdminLoginController@index')->name('adminIndex');

Route::post('/admin/login', 'AdminLoginController@login')->name('adminLogin');

Route::group(['prefix' => 'admin', 'middleware' => 'vauth'], function () {

		Route::get('/logout', 'AdminLoginController@logout')->name('adminLogout');

		Route::get('/dashboard', 'AdminLoginController@dashboard')->name('dashboard');

		Route::get('/section', 'AdminSectionController@index')->name('section');

		Route::get('/section/create', 'AdminSectionController@create')->name('sectionCreate');

		Route::get('/section/delete/{id}', 'AdminSectionController@delete')->name('sectionDelete');

		Route::post('/section/insert', 'AdminSectionController@insert')->name('saveSection');

		Route::get('/class', 'AdminClassController@index')->name('class');

		Route::get('/class/create', 'AdminClassController@create')->name('classCreate');

		Route::post('/class/insert', 'AdminClassController@insert')->name('saveClass');

		Route::get('/class/delete/{id}', 'AdminClassController@delete')->name('classDelete');

		Route::get('/class/edit/{id}', 'AdminClassController@edit')->name('classEdit');

		Route::post('/class/update/{id}', 'AdminClassController@update')->name('updateClass');

		Route::get('/notice', 'AdminNoticeController@index')->name('notice');

		Route::get('/notice/create', 'AdminNoticeController@create')->name('noticeCreate');

		Route::post('/notice/insert', 'AdminNoticeController@insert')->name('noticeInsert');

		Route::get('/notice/delete/{id}', 'AdminNoticeController@delete')->name('noticeDelete');

		Route::get('/notice/show/{id}', 'AdminNoticeController@show')->name('noticeView');

		Route::get('/students', 'AdminStudentController@index')->name('student');

		Route::get('/students/create', 'AdminStudentController@create')->name('studentCreate');

		Route::post('/students/insert', 'AdminStudentController@insert')->name('saveStudent');

		Route::post('/students/section', 'AdminStudentController@getSections')->name('getSections');

		Route::post('/students/fetch', 'AdminStudentController@fetchStudents')->name('studentFetch');

		Route::get('/students/upload', 'AdminStudentController@upload')->name('studentUpload');

		Route::post('/students/upload/db', 'AdminStudentController@uploaddb')->name('saveRecords');

		Route::get('/students/download', 'AdminStudentController@downloadExcel')->name('studentDownload');

		Route::get('/student/delete/{id}', 'AdminStudentController@delete')->name('deleteStudent');


		Route::get('/results', 'AdminResultController@index')->name('result');

		Route::get('/results/upload', 'AdminResultController@upload')->name('resultUpload');

		Route::post('/results/upload/db', 'AdminResultController@uploaddb')->name('saveResults');

		Route::get('/results/download', 'AdminResultController@downloadExcel')->name('resultDownload');

		Route::post('/results/fetch', 'AdminResultController@fetchResults')->name('resultFetch');

		Route::get('/results/edit/{id}', 'AdminResultController@edit')->name('editResult');

		Route::post('/results/update/{id}', 'AdminResultController@update')->name('updateResults');

		Route::get('/results/delete/{id}', 'AdminResultController@delete')->name('editResult');



		Route::get('/exams', 'AdminExamController@index')->name('exam');

		Route::get('/exams/upload', 'AdminExamController@upload')->name('examUpload');

		Route::post('/exams/upload/file', 'AdminExamController@uploadExam')->name('saveExam');

		Route::get('/exams/delete/{id}', 'AdminExamController@delExam')->name('delExam');


		Route::get('/user/index', 'AdminUserController@index')->name('userindex');
		Route::get('/user/create', 'AdminUserController@create')->name('usercreate');
		Route::post('/user/save', 'AdminUserController@save')->name('saveUser');
		Route::get('/user/delete/{id}', 'AdminUserController@delete')->name('usrDelete');



		Route::get('/teachers/index', 'AdminTeacherController@index')->name('teacher');
		Route::get('/teachers/create', 'AdminTeacherController@create')->name('teacherCreate');
		Route::post('/teachers/save', 'AdminTeacherController@save')->name('saveTeacher');
		Route::get('/teachers/delete/{id}', 'AdminTeacherController@delete')->name('teacherDelete');


		Route::get('/settings/gallaries', 'AdminSettingsController@index')->name('settings');
		Route::get('/gallaries/upload', 'AdminSettingsController@upload')->name('uploadPics');
		Route::post('/gallaries/upload/file', 'AdminSettingsController@uploadFile')->name('uploadFile');
		Route::get('/gallaries/delete/{id}', 'AdminSettingsController@delete')->name('picDelete');


		Route::get('/mail/student/{id}', 'AdminMailController@std_password_send')->name('passwordSend');
		Route::get('/mail/teacher/{id}', 'AdminMailController@tch_password_send')->name('passwordTchSend');
		Route::get('/mail/all/{id}', 'AdminMailController@notice_all')->name('noticeAll');
		Route::get('/mail/students/{id}', 'AdminMailController@notice_students')->name('noticeStudents');
		Route::get('/mail/teachers/{id}', 'AdminMailController@notice_teachers')->name('noticeTeachers');


		Route::get('/queries', 'AdminQueryController@index')->name('query');
		Route::get('/queries/delete/{id}', 'AdminQueryController@delete')->name('qDelete');


		Route::get('/contact', 'AdminContactController@index')->name('contact');
		Route::get('/contact/delete/{id}', 'AdminContactController@delete')->name('cDelete');


});


