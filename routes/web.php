<?php

use App\Http\Controllers\AdminBlogCategoryController;
use App\Http\Controllers\AdminBlogPostController;
use App\Http\Controllers\AdminBlogTagController;
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

Route::resource(
    'admin/blog/category',
    AdminBlogCategoryController::class
);

Route::resource(
    'admin/blog/tag',
    AdminBlogTagController::class
);

Route::resource(
    'admin/blog/post',
    AdminBlogPostController::class
);
