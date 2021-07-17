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

//Basic Routes For all pages
Auth::routes();
Route::get('/','PagesController@index');
Route::get('/Dashboard', 'HomeController@index')->name('home');
Route::get('/Security','HomeController@showChangePasswordForm');
Route::get('/Report','PagesController@report');
Route::get('/Search','PagesController@search');
Route::get('/AccountSearch','PagesController@asearch');
Route::get('/Students','PagesController@students');
Route::get('/Librarian','PagesController@library');
Route::get('/Accountant','PagesController@account');
Route::get('/accountStudent','PagesController@accountstudent');
Route::get('/accountStudentverify','PagesController@accstudentverify');
Route::get('/libStudentverify','PagesController@libstudentverify');
Route::get('/libStudent','PagesController@libstudent');
//Route::get('/adddebtor','PagesController@adddebtor');
Route::get('/StudentEdit','PagesController@studentedit');
Route::get('/Add Operator','PagesController@aoperator');
Route::get('/lib_list','PagesController@liblist');
Route::get('/verified_student','studentaccverController@verified');
Route::get('/libproperty','PagesController@property');
Route::get('/account_list','PagesController@acclist');
Route::get('/libpdf','pdfController@view');
Route::get('/accpdf','pdfController@view2');
Route::get('/clearence','pdfController@view3');
Route::get('/property_Verify','libVerifyController@get');
Route::get('accountStudentverify/{id}','verificationaccController@viewfile');
//Route::get('documents/pdf-document/{id}', 'DocumentController@getDocument');

//RESOURCES

Route::resource('Verify_Students','studentaccverController');
Route::put('Verify_Students','studentaccverController@update');
Route::put('/Reset','studentaccverController@update2');
Route::get('/search','studentController@search');
Route::resource('Students', 'studentController');
Route::put('StudentEdit', 'studentController@update');
//Route::post('/StudentEdit', 'studentController@imageupdate');
Route::resource('adddebtor', 'debtorController');
Route::resource('libdebtor', 'libdebtorController');
Route::resource('property_debtor', 'propertylibController');
Route::resource('Verify','verificationaccController');
Route::resource('Verifylib','verificationlibController');
Route::resource('Duce', 'duceController');
Route::resource('infoVerify','infoverifyController');
Route::resource('libVerify','libVerifyController');
Route::resource('Library', 'librarianController');
Route::resource('Officer', 'accountantController');
Route::resource('accountantinfo', 'accinfoController');
Route::resource('Payment', 'paymentController');
Route::resource('Hostel', 'hostelController');
Route::resource('Program', 'programController');
Route::resource('Academic', 'academicController');
//Route::resource('Dashboard', 'adashController');

//POST ROUTE
Route::post('Verify','verificationaccController@store');
Route::post('Verifylib','verificationlibController@store');
Route::post('Students', 'studentController@store');
Route::POST('Accountant','accountantController@store');
Route::POST('Add Operator','duceController@store');
Route::POST('Librarian','librarianController@store');
Route::post('Payment', 'paymentController@store');
Route::post('Academic', 'academicController@store');
Route::post('Dashboard', 'feetypeController@store');
Route::post('Program', 'programController@store');
Route::post('Hostel', 'hostelController@store');
Route::post('adddebtor', 'debtorController@store');
Route::post('libdebtor', 'libdebtorController@store');
Route::post('property_debtor', 'propertylibController@store');
Route::put('accountantinfo','accinfoController@update');
Route::post('/Security','HomeController@changePassword')->name('changePassword');





//this will handle all auth system routings



