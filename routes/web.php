<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/profile', [App\Http\Controllers\HomeController::class, 'profile'])->name('show.profile');

Route::group(['namespace' => 'App\Http\Controllers'], function (){
    Route::resource('users', 'UserController');
    Route::post('user-store', 'UserController@store')->name('user.store');
    Route::get('all-users', 'UserController@allUsers')->name('user.all');
    Route::get('user_edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('user-update', 'UserController@userUpdate')->name('user.update');



    /*Role Routes*/
    Route::resource('role', 'RoleController');
    Route::get('allroles', 'RoleController@allRoles');
    Route::get('role-update/{id}', 'RoleController@roleStatusUpdate');
    Route::get('role-data-edit/{id}', 'RoleController@roleDataEdit');
    Route::put('role-data-update', 'RoleController@roleDataUpdate');
    Route::get('role-delete/{id}', 'RoleController@roleDelete');
});
