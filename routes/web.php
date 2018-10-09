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
    Route::get('/employees/create', 'EmployeeController@create')->name('employees.create');
    Route::post('/employees/create', 'EmployeeController@store')->name('employees.create');
    Route::get('/employees/{employee}', 'EmployeeController@show')->name('employees.show');
    Route::get('/employees/{employee}/edit', 'EmployeeController@edit')->name('employees.edit');
    Route::post('/employees/{employee}/update', 'EmployeeController@update')->name('employees.update');
    Route::delete('/employees/{employee}/delete', 'EmployeeController@destroy')->name('employees.delete');
});



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
