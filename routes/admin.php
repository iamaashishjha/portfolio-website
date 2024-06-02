<?php

use App\Http\Controllers\Admin\PaymentSetups\PaymentGatewayController;
use App\Models\MassOrganization;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Auth\RoleController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\AdminGalleryController;
use App\Http\Controllers\AdminHistoryController;
use App\Http\Controllers\AdminLibraryController;
use App\Http\Controllers\AdminDocumentController;
use App\Http\Controllers\Admin\DonationController;
use App\Http\Controllers\AdminCommitteeController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminGovermentController;
use App\Http\Controllers\AdminLeadershipController;
use App\Http\Controllers\AdminMembershipController;
use App\Http\Controllers\AdminParliamentController;
use App\Http\Controllers\AdminTeamMemberController;
use App\Http\Controllers\AdminAppSettingsController;
use App\Http\Controllers\AdminPopupNoticeController;
use App\Http\Controllers\Auth\PermissionsController;
use App\Http\Controllers\AdminBulkMessagesController;
use App\Http\Controllers\YoutubeVideoController;
use App\Http\Controllers\Admin\ContentManagement\SayingController;
use App\Http\Controllers\Admin\ContentManagement\BlogTagController;
use App\Http\Controllers\Admin\ContentManagement\NewsTagController;
use App\Http\Controllers\Admin\ContentManagement\ThoughtController;
use App\Http\Controllers\AdminCompanyDetailsController;
use App\Http\Controllers\Admin\ContentManagement\BlogPostController;
use App\Http\Controllers\Admin\ContentManagement\NewsPostController;
use App\Http\Controllers\Admin\ContentManagement\BlogCategoryController;
use App\Http\Controllers\Admin\ContentManagement\NewsCategoryController;
use App\Http\Controllers\Admin\ContentPages\MassOrganizationController;
use App\Http\Controllers\AdminFacebookVideoController;
use App\Http\Controllers\TwitterVideoController;

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
    Route::get('/', [AdminDashboardController::class, 'index'])->name('index');
    Route::resource('/user', AdminUserController::class);
    Route::prefix('/user')->name('user.')->controller(AdminUserController::class)->group(function () {
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

    Route::resource('/event', AdminEventController::class);


    Route::resource('/document', AdminDocumentController::class);
    Route::resource('/library', AdminLibraryController::class);

    Route::resource('/member', AdminMembershipController::class)->except('index', 'show');
    Route::prefix('/member')->name('member.')->controller(AdminMembershipController::class)->group(function () {
        Route::get('/', 'getRegisteredMembers')->name('index');
        Route::get('/approved-members', 'getApprovedMembers')->name('getApprovedMembers');
        Route::post('/member/{id}', 'approveMember')->name('approve');
    });

    Route::resource('/app-setting', AdminAppSettingsController::class)->except('destroy');
    Route::resource('/company-details', AdminCompanyDetailsController::class)->except('destroy');
    Route::resource('/slider', AdminSliderController::class)->except('destroy');



    Route::resource('/popup-notice', AdminPopupNoticeController::class);
    Route::resource('/bulk-message', AdminBulkMessagesController::class);


    Route::resource('/youtube-video', YoutubeVideoController::class);
    Route::resource('/facebook-video', AdminFacebookVideoController::class);
    Route::resource('/twitter-video', TwitterVideoController::class);
    Route::resource('/gallery', AdminGalleryController::class);


    Route::resource('/history', AdminHistoryController::class);
    Route::resource('/goverment', AdminGovermentController::class);
    Route::resource('/parliament', AdminParliamentController::class);
    Route::resource('/mass-organization', MassOrganizationController::class);
    Route::resource('/donation', DonationController::class);

    Route::resource('/team-member', AdminTeamMemberController::class);
    Route::prefix('/team-member')->name('team-member.')->controller(AdminMembershipController::class)->group(function () {
        Route::post('/filter-serach', 'filterSearch')->name('filter');
    });
    Route::resource('/committee', AdminCommitteeController::class);
    Route::resource('/leadership', AdminLeadershipController::class);

    Route::resource('/payment-gateways', PaymentGatewayController::class);
});

// This should be the end of file and last line for this file
