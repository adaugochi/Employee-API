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

Route::group(['prefix' => '/api'], function() {
	Route::get('getEmployeeType',          'Api\Setup\EmployeeTypeSetup@getEmployeeType');
	Route::get('getEmployeeDept',          'Api\Setup\EmployeeDeptSetup@getEmployeeDept');
	Route::get('getEmployeePosition',      'Api\Setup\EmployeePositionSetup@getEmployeePosition');
    Route::get('getEmployeeInformation',   'Api\Setup\EmployeeInformationSetup@getEmployeeInformation');
    Route::get('getAcademicInformation',   'Api\Setup\AcademicInformationSetup@getAcademicInformation');
    Route::get('getEmploymentInformation', 'Api\Setup\EmploymentInformationSetup@getEmploymentInformation');

	Route::post('addEmployeeType',          'Api\Setup\EmployeeTypeSetup@addEmployeeType');
	Route::post('addEmployeeDept',          'Api\Setup\EmployeeDeptSetup@addEmployeeDept');
	Route::post('addEmployeePosition',      'Api\Setup\EmployeePositionSetup@addEmployeePosition');
    Route::post('addEmployeeInformation',   'Api\Setup\EmployeeInformationSetup@addEmployeeInformation');
    Route::post('addAcademicInformation',   'Api\Setup\AcademicInformationSetup@addAcademicInformation');
    Route::post('addEmploymentInformation',   'Api\Setup\EmploymentInformationSetup@addEmploymentInformation');

	Route::put('updateEmployeeType/{id}',        'Api\Setup\EmployeeTypeSetup@updateEmployeeType');
	Route::put('updateEmployeeDept/{id}',        'Api\Setup\EmployeeDeptSetup@updateEmployeeDept');
	Route::put('updateEmployeePosition/{id}',    'Api\Setup\EmployeePositionSetup@updateEmployeePosition');
    Route::put('updateEmployeeInformation/{id}', 'Api\Setup\EmployeeInformationSetup@updateEmployeeInformation');
    Route::put('updateAcademicInformation/{id}', 'Api\Setup\AcademicInformationSetup@updateAcademicInformation');
    Route::put('updateEmploymentInformation/{id}', 'Api\Setup\EmploymentInformationSetup@updateEmploymentInformation');

	Route::delete('deleteEmployeeType/{id}',        'Api\Setup\EmployeeTypeSetup@deleteEmployeeType');
	Route::delete('deleteEmployeeDept/{id}',        'Api\Setup\EmployeeDeptSetup@deleteEmployeeDept');
	Route::delete('deleteEmployeePosition/{id}',    'Api\Setup\EmployeePositionSetup@deleteEmployeePosition');
    Route::delete('deleteEmployeeInformation/{id}', 'Api\Setup\EmployeeInformationSetup@deleteEmployeeInformation');
    Route::delete('deleteAcademicInformation/{id}', 'Api\Setup\AcademicInformationSetup@deleteAcademicInformation');
    Route::delete('deleteEmploymentInformation/{id}', 'Api\Setup\EmploymentInformationSetup@deleteEmploymentInformation');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
