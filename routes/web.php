<?php

use App\Http\Controllers\AdminBlogCategoryController;
use App\Http\Controllers\AdminBlogPostController;
use App\Http\Controllers\AdminBlogTagController;
use App\Http\Controllers\AdminInfoEducationController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminUserDetailController;
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

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::name('admin.')->group(function () {

        Route::get(
            '/',
            [App\Http\Controllers\AdminDashboardController::class, 'index']
        )->name('index');

        Route::controller(AdminUserController::class)->group(function () {

            Route::prefix('user')->group(function () {

                Route::name('user.')->group(function () {

                    Route::get('/{user_id}/profile', 'profile')->name('profile');

                    Route::get('/registered-users', 'registeredUsers')->name('registered');

                    Route::put('/registered-user/{user_id}', 'makeAdmin')->name('admin.make');

                    Route::get('/admin-users', 'adminUsers')->name('admin');

                    Route::put('/admin-user/{user_id}', 'removeAdmin')->name('admin.remove');

                    Route::delete('/user/{user_id}', 'deleteUser')->name('admin.delete');

                    Route::put('/{user_id}/profile', 'profileUpdate')->name('profileUpdate');
                });
            });
        });
    });

    Route::prefix('blog')->group(function () {

        Route::resource('/category', AdminBlogCategoryController::class);

        Route::resource('/tag', AdminBlogTagController::class);

        Route::resource('/post', AdminBlogPostController::class);

        Route::controller(AdminBlogPostController::class)->group(function () {

            Route::name('post.')->group(function () {

                Route::get('/trashed-post', 'trashed')->name('trashed');

                Route::put('/restorPost/{id}', 'restore')->name('restore');
            });
        });
    });

    Route::prefix('info')->group(function () {

        Route::resource('/education', AdminInfoEducationController::class);
    });
});
