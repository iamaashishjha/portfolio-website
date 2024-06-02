<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\Members\MemberController;
use App\Http\Controllers\Admin\Gallery\GalleryController;
use App\Http\Controllers\Admin\Authentication\RoleController;
use App\Http\Controllers\Admin\Authentication\UserController;
use App\Http\Controllers\Admin\ContentPages\HistoryController;
use App\Http\Controllers\Admin\Gallery\TwitterVideoController;
use App\Http\Controllers\Admin\Gallery\YoutubeVideoController;
use App\Http\Controllers\Admin\Leadership\CommitteeController;
use App\Http\Controllers\Admin\Administration\SliderController;
use App\Http\Controllers\Admin\Gallery\FacebookVideoController;
use App\Http\Controllers\Admin\Leadership\LeadershipController;
use App\Http\Controllers\Admin\Leadership\TeamMemberController;
use App\Http\Controllers\Admin\ContentPages\GovermentController;
use App\Http\Controllers\Admin\Administration\DonationController;
use App\Http\Controllers\Admin\ContentManagement\EventController;
use App\Http\Controllers\Admin\ContentPages\ParliamentController;
use App\Http\Controllers\Admin\ContentManagement\SayingController;
use App\Http\Controllers\Admin\ContentManagement\BlogTagController;
use App\Http\Controllers\Admin\ContentManagement\LibraryController;
use App\Http\Controllers\Admin\ContentManagement\NewsTagController;
use App\Http\Controllers\Admin\ContentManagement\ThoughtController;
use App\Http\Controllers\Admin\Administration\AppSettingsController;
use App\Http\Controllers\Admin\Administration\PopupNoticeController;
use App\Http\Controllers\Admin\Authentication\PermissionsController;
use App\Http\Controllers\Admin\ContentManagement\BlogPostController;
use App\Http\Controllers\Admin\ContentManagement\DocumentController;
use App\Http\Controllers\Admin\ContentManagement\NewsPostController;
use App\Http\Controllers\Admin\Administration\BulkMessagesController;
use App\Http\Controllers\Admin\PaymentSetups\PaymentGatewayController;
use App\Http\Controllers\Admin\Administration\CompanyDetailsController;
use App\Http\Controllers\Admin\ContentPages\MassOrganizationController;
use App\Http\Controllers\Admin\ContentManagement\BlogCategoryController;
use App\Http\Controllers\Admin\ContentManagement\NewsCategoryController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::resource('/user', UserController::class);
    Route::prefix('/user')->name('user.')->controller(UserController::class)->group(function () {
        Route::get('/profile/{id}', 'profile')->name('profile');
        Route::put('/profile/{id}', 'profileUpdate')->name('update');
        Route::get('/changepassword/{id}', 'changePasswordform')->name('changePassword.form');
        Route::post('/changepassword/{id}', 'changePassword')->name('changePassword');
    });

    Route::resource('/roles', RoleController::class, ['names' => 'role']);
    Route::get('/permissions', [PermissionsController::class, 'index'])->name('permission.index');
    Route::get('/permissions/generate', [PermissionsController::class, 'generatePermissions'])->name('permission.generate');
    // Route::get('/user/profile',[App\Http\Controllers\Admin\UserController::class, 'myProfileView'])->name('profile');
    // Route::post('/users/assign-role', [App\Http\Controllers\Admin\UserController::class, 'assignRoleToUser'])->name('user.assignrole');
    // Route::get('/users/permissions', [App\Http\Controllers\Admin\UserController::class, 'userPermissions'])->name('user.permissions');

    Route::prefix('/blog')->name('blog.')->group(function () {
        Route::resource('/category', BlogCategoryController::class);
        Route::resource('/tag', BlogTagController::class);
        Route::resource('/post', BlogPostController::class);
        Route::get('/trashed-posts', [BlogPostController::class, 'trashed'])->name('post.trashed');
        Route::put('/post/restore/{id}', [BlogPostController::class, 'restore'])->name('post.restore');
    });

    Route::prefix('/news')->name('news.')->group(function () {
        Route::resource('/category', NewsCategoryController::class);
        Route::resource('/tag', NewsTagController::class);
        Route::resource('/post', NewsPostController::class);
        Route::get('/trashed-posts', [NewsPostController::class, 'trashed'])->name('post.trashed');
        Route::put('/post/restore/{id}', [NewsPostController::class, 'restore'])->name('post.restore');
    });

    Route::resource('/thought', ThoughtController::class);
    Route::prefix('/thought')->name('thought.')->controller(ThoughtController::class)->group(function () {
        Route::get('/trashed-posts', 'trashed')->name('trashed');
        Route::put('/post/restore/{id}',  'restore')->name('restore');
    });

    Route::resource('/saying', SayingController::class);
    Route::prefix('/saying')->name('saying.')->controller(SayingController::class)->group(function () {
        Route::get('/trashed-posts', 'trashed')->name('trashed');
        Route::put('/post/restore/{id}',  'restore')->name('restore');
    });

    Route::resource('/event', EventController::class);


    Route::resource('/document', DocumentController::class);
    Route::resource('/library', LibraryController::class);

    Route::resource('/member', MemberController::class)->except('index', 'show');
    Route::prefix('/member')->name('member.')->controller(MemberController::class)->group(function () {
        Route::get('/', 'getRegisteredMembers')->name('index');
        Route::get('/approved-members', 'getApprovedMembers')->name('getApprovedMembers');
        Route::post('/member/{id}', 'approveMember')->name('approve');
    });

    Route::resource('/app-setting', AppSettingsController::class)->except('destroy');
    Route::resource('/company-details', CompanyDetailsController::class)->except('destroy');
    Route::resource('/slider', SliderController::class)->except('destroy');



    Route::resource('/popup-notice', PopupNoticeController::class);
    Route::resource('/bulk-message', BulkMessagesController::class);


    Route::resource('/youtube-video', YoutubeVideoController::class);
    Route::resource('/facebook-video', FacebookVideoController::class);
    Route::resource('/twitter-video', TwitterVideoController::class);
    Route::resource('/gallery', GalleryController::class);


    Route::resource('/history', HistoryController::class);
    Route::resource('/goverment', GovermentController::class);
    Route::resource('/parliament', ParliamentController::class);
    Route::resource('/mass-organization', MassOrganizationController::class);
    Route::resource('/donation', DonationController::class);

    Route::resource('/team-member', TeamMemberController::class);
    Route::prefix('/team-member')->name('team-member.')->controller(MemberController::class)->group(function () {
        Route::post('/filter-serach', 'filterSearch')->name('filter');
    });
    Route::resource('/committee', CommitteeController::class);
    Route::resource('/leadership', LeadershipController::class);

    Route::resource('/payment-gateways', PaymentGatewayController::class);
});

// This should be the end of file and last line for this file
