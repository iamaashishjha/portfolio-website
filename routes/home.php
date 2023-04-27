<?php

use App\Http\Controllers\HomeCommitteeMemberController;
use App\Http\Controllers\HomeContentPageController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembershipController;

/*
|--------------------------------------------------------------------------
| Home Routes
|--------------------------------------------------------------------------
|
| Here is where you can register home routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::name('home.')->controller(HomeController::class)->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/contact', 'contactPage')->name('contact');
    Route::get('/about', 'aboutUsPage')->name('about');
    Route::get('/donation', 'donationPage')->name('donation');

    Route::post('/sliderForm', 'indexPageSliderForm')->name('sliderForm');
    Route::post('/subscribeUsForm', 'indexPageSubscribeUsForm')->name('SubscribeUsForm');
    Route::post('/ContactUsForm', 'storeContactData')->name('contactForm');

    Route::prefix('/events')->name('events.')->group(function () {
        Route::get('/', 'listEvent')->name('index');
        Route::get('/{id}', 'showEvent')->name('show');
    });

    Route::prefix('/news')->name('news.')->group(function () {
        Route::get('/', 'listNews')->name('index');
        Route::get('/{id}', 'showNews')->name('show');
        Route::get('/category/{id}', 'listCategoryNews')->name('categoryShow');
        Route::post('/{id}', 'storeNewsComments')->name('comment');
    });

    Route::prefix('/blogs')->name('blogs.')->group(function () {
        Route::get('/', 'listBlog')->name('index');
        Route::get('/{id}', 'showBlog')->name('show');
        Route::get('/category/{id}', 'listCategoryBlogs')->name('categoryShow');
        Route::post('/{id}', 'storeBlogComments')->name('comment');
    });

    Route::prefix('/library')->name('library.')->group(function () {
        Route::get('/', 'listLibrary')->name('index');
    });

    Route::prefix('/videos')->name('video.')->group(function () {
        Route::get('/', 'listVideos')->name('index');
    });

    Route::prefix('/committee')->name('committee.')->group(function () {
        Route::get('/', 'listCommittee')->name('index');
        Route::get('/{id}', 'showCommittee')->name('show');
    });
});

Route::prefix('/member')->name('home.member.')->controller(MembershipController::class)->group(function () {
    Route::get('/create', 'create')->name('create');
    Route::post('/', 'store')->name('store');
});

Route::prefix('/history')->name('home.history.')->controller(HomeContentPageController::class)->group(function () {
    Route::get('/', 'listHistory')->name('index');
    Route::get('/{id}', 'showHistory')->name('show');
});

Route::prefix('/committee')->name('home.committee.')->controller(HomeCommitteeMemberController::class)->group(function () {
    Route::get('/', 'listCommittee')->name('index');
    Route::get('/{id}', 'showCommittee')->name('show');
});

// This should be the end of file and last line for this file