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

Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('admin.index');
    })->name('/');

    Route::get('/employees', 'EmployeeController@index')->name('employees.index');
    Route::post('/employees/ajax', 'EmployeeController@ajax')->name('employees.ajax');
});



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
