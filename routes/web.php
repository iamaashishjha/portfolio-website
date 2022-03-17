<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['reset' => false, 'verify' => false, 'register' => false]);

Route::get(
    '/home',
    [App\Http\Controllers\HomeController::class, 'index']
)->name('home');

Route::get(
    '/admin',
    [App\Http\Controllers\AdminDashboardController::class, 'index']
)->name('admin.index');

Route::get(
    '/admin/{user_id}/profile',
    [App\Http\Controllers\AdminUserDetailController::class, 'profile']
)->name('admin.profile');

Route::put(
    '/admin/{user_id}/profile',
    [App\Http\Controllers\AdminUserDetailController::class, 'profileUpdate']
)->name('admin.profileUpdate');

Route::get('/profile', function () {
    return view('auth.profile');
});

Route::get('/a', function () {
    return view('ar.index');
    # code...
});

Route::get('/b', function () {
    return view('hr.blog.show');
});

Route::get('/c', function () {
    return view('hr.index');
});

Route::get('/d', function () {
    return view('hr.blog.index');
});

Route::get('/abcd', function () {
    return view('ar.base.create');
    // return "hello";
});

Route::get('/abc', function () {
    return view('ar.blog.blog-post.create');
    // return "hello";
});

Route::get('/f', function () {
    return view('ar.base.index');
});

Route::get('/g', function () {
    return view('ar.base.show');
});

Route::get('/h', function () {
    return view('ar.base.trash');
});



Route::get('/login1', function () {
    return view('auth.login1');
});

Route::get('/register1', function () {
    return view('auth.register1');
});
