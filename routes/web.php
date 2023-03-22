<?php

use App\Http\Controllers\OuterController;
use App\Http\Controllers\UsersController;
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

// index home page
Route::controller(OuterController::class)->group(function () {
    Route::get('/', 'index')->name('home');
    Route::get('/article/{id}', 'article_detail')->name('article_detail');
});

// users page and users validation
Route::controller(UsersController::class)->group(function () {
    Route::get('/login', 'login_form')->name('login_form');
    Route::post('/login', 'login_action')->name('login_action');


    Route::get('/dashboard', 'dashboard_index')->name('dashboard_index');
    Route::post('/dashboard', 'dashboard_logout')->name('dashboard_logout');
});
