<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Home\DocController;
use App\Http\Controllers\Home\MediaController;
use App\Http\Controllers\Home\GalleryController;
use App\Http\Controllers\Home\CommitteeController;
use App\Http\Controllers\Home\MembershipController;
use App\Http\Controllers\Home\ContentPageController;

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


Route::name('home.')->group(function () {
    Route::controller(HomeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/contact', 'contactPage')->name('contact');
        Route::get('/about', 'aboutUsPage')->name('about');
        Route::get('/donation', 'donationPage')->name('donation');
        Route::post('/sliderForm', 'indexPageSliderForm')->name('sliderForm');
        Route::post('/subscribeUsForm', 'indexPageSubscribeUsForm')->name('SubscribeUsForm');
        Route::post('/ContactUsForm', 'storeContactData')->name('contactForm');
    });

    Route::prefix('/member')->name('member.')->controller(MembershipController::class)->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/approved-members', 'getApprovedMembers')->name('approved');
    });

    Route::controller(DocController::class)->group(function () {
        Route::prefix('/library')->name('library.')->group(function () {
            Route::get('/', 'listLibrary')->name('index');
            Route::get('/{id}', 'showLibrary')->name('show');
        });

        Route::prefix('/document')->name('document.')->group(function () {
            Route::get('/{id}', 'showDocument')->name('show');
        });
    });

    Route::controller(ContentPageController::class)->group(function () {
        Route::prefix('/history')->name('history.')->group(function () {
            Route::get('/', 'listHistory')->name('index');
            Route::get('/{id}', 'showHistory')->name('show');
        });

        Route::prefix('/parliament')->name('parliament.')->group(function () {
            Route::get('/', 'listParliament')->name('index');
            Route::get('/{id}', 'showParliament')->name('show');
        });

        Route::prefix('/goverment')->name('goverment.')->group(function () {
            Route::get('/', 'listGoverment')->name('index');
            Route::get('/{id}', 'showGoverment')->name('show');
        });
    });

    Route::controller(CommitteeController::class)->group(function () {
        Route::name('committee.')->prefix('committee')->group(function () {
            Route::get('/', 'listCommittee')->name('index');
            Route::get('//{id}', 'showCommittee')->name('show');
        });
        Route::name('leadership.')->prefix('leadership')->group(function () {
            Route::get('/', 'listLeadership')->name('index');
            Route::get('//{id}', 'showLeadership')->name('show');
        });
    });

    Route::controller(MediaController::class)->group(function () {
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

        Route::prefix('/thoughts')->name('thoughts.')->group(function () {
            Route::get('/', 'listBlog')->name('index');
            Route::get('/{id}', 'showBlog')->name('show');
            Route::get('/category/{id}', 'listCategoryBlogs')->name('categoryShow');
            Route::post('/{id}', 'storeBlogComments')->name('comment');
        });

        Route::prefix('/saying')->name('saying.')->group(function () {
            Route::get('/', 'listBlog')->name('index');
            Route::get('/{id}', 'showBlog')->name('show');
            Route::post('/{id}', 'storeBlogComments')->name('comment');
        });
    });

    Route::controller(GalleryController::class)->group(function () {
        Route::prefix('/videos')->name('video.')->group(function () {
            Route::get('/', 'listVideos')->name('index');
        });
    });
});



// This should be the end of file and last line for this file