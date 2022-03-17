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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/a', function () {
    return view('ar.index');
    # code...
});

Route::get('/b', function () {
    return view('hr.blog.show');
    # code...
});

Route::get('/c', function () {
    return view('hr.index');
});

Route::get('/d', function () {
    return view('hr.blog.index');
});
