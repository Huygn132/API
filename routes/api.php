<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix('projects')->group(function () {
    Route::get('search', 'App\Http\Controllers\ProjectController@search')->name('project.search');
    Route::post('search', 'App\Http\Controllers\ProjectController@handleSearch')->name('project.handleSearch');
    Route::delete('delete/{id}', 'App\Http\Controllers\ProjectController@delete')->name('project.delete');
});
Route::prefix('project')->group(function () {
    Route::get('/edit/{id}', 'App\Http\Controllers\ProjectUpdateController@edit')->name('project.edit');
    Route::put('/update/{id}', 'App\Http\Controllers\ProjectUpdateController@update')->name('project.update');
});

Route::group(['prefix' => 'api'], function () {
    Route::post('/project', 'App\Http\Controllers\ProjectCreationController@store');
});
// Route::prefix('api')->group(function () {
//     Route::post('project', 'App\Http\Controllers\ProjectCreationController@store')->name('project.create');
// });

Route::get('plant/{selected_project_id}', 'App\Http\Controllers\PlantController@indexApi');

// Route::post('plant/save-data', 'App\Http\Controllers\PlantController@saveDataApi');
