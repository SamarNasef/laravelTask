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
//Route::get('/map','EmployeeController@index');

Route::get('/employee/add','EmployeeController@create');
Route::post('/employee/add','EmployeeController@store');
Route::get('/employee/delete/{id}','EmployeeController@destroy');
Route::get('/employee/update/{id}','EmployeeController@edit');
Route::post('/employee/update/{id}','EmployeeController@update');
Route::get('/employee/search','EmployeeController@searchByName');

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home', 'EmployeeController@index')->name('home');
