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

	Route::post('addEmployeeType',          'Api\Setup\EmployeeTypeSetup@addEmployeeType');
	Route::post('addEmployeeDept',          'Api\Setup\EmployeeDeptSetup@addEmployeeDept');
	Route::post('addEmployeePosition',      'Api\Setup\EmployeePositionSetup@addEmployeePosition');
    Route::post('addEmployeeInformation',   'Api\Setup\EmployeeInformationSetup@addEmployeeInformation');

	Route::put('updateEmployeeType/{id}',        'Api\Setup\EmployeeTypeSetup@updateEmployeeType');
	Route::put('updateEmployeeDept/{id}',        'Api\Setup\EmployeeDeptSetup@updateEmployeeDept');
	Route::put('updateEmployeePosition/{id}',    'Api\Setup\EmployeePositionSetup@updateEmployeePosition');
    Route::put('updateEmployeeInformation/{id}', 'Api\Setup\EmployeeInformationSetup@updateEmployeeInformation');

	Route::delete('deleteEmployeeType/{id}',        'Api\Setup\EmployeeTypeSetup@deleteEmployeeType');
	Route::delete('deleteEmployeeDept/{id}',        'Api\Setup\EmployeeDeptSetup@deleteEmployeeDept');
	Route::delete('deleteEmployeePosition/{id}',    'Api\Setup\EmployeePositionSetup@deleteEmployeePosition');
    Route::delete('deleteEmployeeInformation/{id}', 'Api\Setup\EmployeeInformationSetup@deleteEmployeeInformation');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
