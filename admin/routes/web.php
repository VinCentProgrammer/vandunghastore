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

Auth::routes(['verify' => true]);

// Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


Route::middleware(['auth'])->group(function () {
    //==============DASHBOARD===============
    Route::get('dashboard', 'DashboardController@show')->middleware('verified');
    //==============USER===============
    Route::get('user/list', 'UserController@list')->name('user.list');
    Route::get('user/add', 'UserController@add');
    Route::get('user/delete/{id}', 'UserController@delete')->name('user.delete');
    Route::get('user/edit/{id}', 'UserController@edit')->name('user.edit');
    Route::post('user/store', 'UserController@store')->name('user.store');
    Route::post('user/action/{status}', 'UserController@action')->name('user.action');
    Route::post('user/update/{id}', 'UserController@update')->name('user.update');
});
