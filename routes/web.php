<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'WelcomeController@index')->name('welcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//category routes
Route::resource('categories', 'CategoryController')->only(['index']);

//article routes
Route::resource('articles', 'ArticleController')->only(['index', 'show']);

//contact us request routes
Route::resource('contact_us_requests', 'ContactUsRequestController')->only(['store']);