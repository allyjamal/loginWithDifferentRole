<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return redirect()->route('login');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', 'Auth\AuthController@getLoginForm')->name('login');
    Route::post('/login', 'Auth\AuthController@login')->name('login');

});

Route::group(['middleware' => 'auth:web'], function () {

    Route::get('/logout', 'Auth\AuthController@logout')->name('logout');


    Route::get('/dashboard',  function(){
        return Inertia::render('Dashboard/Index');

    })->name('dashboard');


    Route::get('/users',  function(){
        return Inertia::render('User/Index');

    })->name('users')->middleware('role:1,3,4');
});
