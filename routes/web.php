<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// //search-delete
// Route::get('search', 'App\Http\Controllers\ProjectController@search')->name('project.search');
// Route::post('search', 'App\Http\Controllers\ProjectController@handleSearch')->name('project.handleSearch');
// Route::delete('/project/delete/{id}', 'App\Http\Controllers\ProjectController@delete')->name('project.delete');

// //create
// Route::get('/project/create', 'App\Http\Controllers\ProjectCreationController@create')->name('project.create');
// Route::post('/project/store', 'App\Http\Controllers\ProjectCreationController@store')->name('project.store');

// //oderdetail
// Route::get('/project/edit/{id}', 'App\Http\Controllers\ProjectUpdateController@edit')->name('project.edit');
// Route::put('/project/update/{id}', 'App\Http\Controllers\ProjectUpdateController@update')->name('project.update');
