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
	Route::get('test/{id}', 'PostController@index');
	Route::post('test', 'PostController@create');

	Route::get('getEmployeeType',          'Api\Setup\EmployeeTypeSetup@getEmployeeType');
	Route::get('getEmployeeDept',          'Api\Setup\EmployeeDeptSetup@getEmployeeDept');
	Route::get('getEmployeePosition',      'Api\Setup\EmployeePositionSetup@getEmployeePosition');

	Route::post('addEmployeeType',          'Api\Setup\EmployeeTypeSetup@addEmployeeType');
	Route::post('addEmployeeDept',          'Api\Setup\EmployeeDeptSetup@addEmployeeDept');
	Route::post('addEmployeePosition',      'Api\Setup\EmployeePositionSetup@addEmployeePosition');

	Route::put('updateEmployeeType/{id}',        'Api\Setup\EmployeeTypeSetup@updateEmployeeType');
	Route::put('updateEmployeeDept/{id}',        'Api\Setup\EmployeeDeptSetup@updateEmployeeDept');
	Route::put('updateEmployeePosition/{id}',    'Api\Setup\EmployeePositionSetup@updateEmployeePosition');

	Route::delete('deleteEmployeeType/{id}',     'Api\Setup\EmployeeTypeSetup@deleteEmployeeType');
	Route::delete('deleteEmployeeDept/{id}',     'Api\Setup\EmployeeDeptSetup@deleteEmployeeDept');
	Route::delete('deleteEmployeePosition/{id}', 'Api\Setup\EmployeePositionSetup@deleteEmployeePosition');
});
