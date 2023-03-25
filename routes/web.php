<?php

use App\Http\Controllers\OuterController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ArticlesController;
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
    // index page
    Route::get('/', 'index')->name('home');

    // article page
    Route::get('/article/{id}', 'article_detail')->name('article_detail');
});

// users page and users validation
Route::controller(UsersController::class)->group(function () {
    // login page
    Route::get('/login', 'login_form')->name('login_form');
    Route::post('/login', 'login_action')->name('login_action');

    //article create,update,delete
    Route::post('/article/create', 'article_create')->name('article_create');
    Route::post('/article/delete', 'article_delete')->name('article_delete');
    Route::get('/article/{id}/edit', 'article_edit')->name('article_edit');
    Route::post('/article/update', 'article_update')->name('article_update');

    // dashboard page
    Route::get('/dashboard', 'dashboard_index')->name('dashboard_index');
    Route::post('/dashboard', 'dashboard_logout')->name('dashboard_logout');
});
