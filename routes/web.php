<?php

use Illuminate\Support\Facades\Route;


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

Route::get('/', 'HomeController@show')->name('stars.main.page');

Auth::routes();

//Ajoutez un préfixe de 'dashboard' à ces routes et protégez-les avec le middleware 'isAdmin'
Route::group(['prefix' => 'dashboard', 'middleware' => 'isAdmin'], function() {
    Route::resource('stars', StarController::class);
    Route::resource('users', UserController::class);
    Route::resource('roles', RoleController::class);
});

Route::get('dashboard', 'HomeController@index')->name('home')->middleware('isAdmin'); //Ajouter un middleware à cette route

Auth::routes();


