<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LocalLevelController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\AdminBlogTagController;
use App\Http\Controllers\AdminLibraryController;
use App\Http\Controllers\AdminNewsTagController;
use App\Http\Controllers\UserBlogPostController;
use App\Http\Controllers\AdminBlogPostController;
use App\Http\Controllers\AdminDocumentController;
use App\Http\Controllers\AdminNewsPostController;
use App\Http\Controllers\LocalLeveTypeController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\AdminMembershipController;
use App\Http\Controllers\AdminAppSettingsController;
use App\Http\Controllers\Admin\PermissionsController;
use App\Http\Controllers\AdminBlogCategoryController;
use App\Http\Controllers\AdminNewsCategoryController;
use App\Http\Controllers\AdminCompanyDetailsController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::view('/a', 'ar.blog.post.show');

Route::post('/locale', function () {
    $langVal = request()->locale;
    if (($langVal)) {
        session(['my_locale' => 'np']);
    } else {
        session(['my_locale' => 'en']);
    }
    return redirect()->back();
});

Auth::routes(['verify' => true, 'register' => false, 'password.update' => true]);

Route::prefix('/')
    ->name('home.')
    ->controller(HomeController::class)
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/contact', 'contactPage')->name('contact');
        Route::get('/about', 'aboutUsPage')->name('about');
        Route::get('/donation', 'donationPage')->name('donation');

        Route::post('/sliderForm', 'indexPageSliderForm')->name('sliderForm');
        Route::post('/subscribeUsForm', 'indexPageSubscribeUsForm')->name('SubscribeUsForm');
        Route::post('/ContactUsForm', 'storeContactData')->name('contactForm');

        Route::prefix('events')
            ->name('events.')
            ->controller(HomeController::class)
            ->group(function () {
                Route::get('/', 'listEvent')->name('index');
                Route::get('/{id}', 'showEvent')->name('show');
            });

        Route::prefix('news')
            ->name('news.')
            ->controller(HomeController::class)
            ->group(function () {
                Route::get('/', 'listNews')->name('index');
                Route::get('/{id}', 'showNews')->name('show');
                Route::get('/category/{id}', 'listCategoryNews')->name('categoryShow');
                Route::post('/{id}', 'storeNewsComments')->name('comment');
            });

        Route::prefix('blogs')
            ->name('blogs.')
            ->controller(HomeController::class)
            ->group(function () {
                Route::get('/', 'listBlog')->name('index');
                Route::get('/{id}', 'showBlog')->name('show');
                Route::get('/category/{id}', 'listCategoryBlogs')->name('categoryShow');
                Route::post('/{id}', 'storeBlogComments')->name('comment');
            });

        Route::prefix('member')
            ->name('member.')
            ->controller(MembershipController::class)
            ->group(function () {
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
            });

        Route::prefix('library')
            ->name('library.')
            ->controller(HomeController::class)
            ->group(function () {
                Route::get('/', 'listLibrary')->name('index');
            });
    });

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get(
            '/',
            [AdminDashboardController::class, 'index']
        )->name('index');
        Route::resource('/user', AdminUserController::class, ['names' => 'user']);
        Route::prefix('/user')
            ->name('user.')
            ->controller(AdminUserController::class)
            ->group(function () {
                // Route::get('/create', 'create')->name('create');
                // Route::get('/', 'index')->name('index');
                // Route::post('/', 'store')->name('store');
                // Route::get('/edit/{id}', 'edit')->name('edit');
                // Route::post('/{id}', 'update')->name('update');
                // Route::delete('/{user_id}', 'destroy')->name('delete');
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

        Route::prefix('/blog')
            ->name('blog.')
            ->group(function () {
                Route::resource('/category', AdminBlogCategoryController::class);
                Route::resource('/tag', AdminBlogTagController::class);
                Route::resource('/post', AdminBlogPostController::class);
                Route::get('/trashed-posts', [AdminBlogPostController::class, 'trashed'])->name('post.trashed');
                Route::put('/post/restore/{id}', [AdminBlogPostController::class, 'restore'])->name('post.restore');
            });

        Route::prefix('/news')
            ->name('news.')
            ->group(function () {
                Route::resource('/category', AdminNewsCategoryController::class);
                Route::resource('/tag', AdminNewsTagController::class);
                Route::resource('/post', AdminNewsPostController::class);
                Route::get('/trashed-posts', [AdminNewsPostController::class, 'trashed'])->name('post.trashed');
                Route::put('/post/restore/{id}', [AdminNewsPostController::class, 'restore'])->name('post.restore');
            });

        Route::prefix('/home')
            ->name('home.')
            ->group(function () {
                Route::resource('/app-setting', AdminAppSettingsController::class)->except('destroy');
                Route::resource('/company-details', AdminCompanyDetailsController::class)->except('destroy');
                Route::resource('/slider', AdminSliderController::class)->except('destroy');
            });

        // Route::resource('/member', AdminMembershipController::class);
        Route::resource('/member', AdminMembershipController::class)->except('index');
        Route::get('/member', [AdminMembershipController::class, 'getRegisteredMembers'])->name('member.index');
        Route::get('/approved-members', [AdminMembershipController::class, 'getApprovedMembers'])->name('member.getApprovedMembers');
        Route::post('/member/{id}', [AdminMembershipController::class, 'approveMember'])->name('member.approve');
        Route::resource('/event', AdminEventController::class);
        Route::resource('/document', AdminDocumentController::class);
        Route::resource('/library', AdminLibraryController::class);
    });

Route::middleware(['auth', 'user', 'verified'])
    ->prefix('dashboard')
    ->name('user.')
    ->group(function () {
        Route::get('/', [UserDashboardController::class, 'index'])->name('index');
        Route::prefix('/')
            ->name('profile.')
            ->controller(UserDashboardController::class)
            ->group(function () {
                Route::get('profile/{user_id}', 'profile')->name('view');
                Route::put('profile/{user_id}', 'profileUpdate')->name('update');
                Route::get('/changepassword/{id}', 'changePassword')->name('changePassword');
            });

        Route::prefix('/blog')
            ->name('post.')
            ->controller(UserBlogPostController::class)
            ->group(function () {
                Route::prefix('/post')
                    ->group(function () {
                        Route::get('/create', 'create')->name('create');
                        Route::post('/', 'store')->name('store');
                        Route::get('/', 'index')->name('index');
                        Route::get('/edit/{id}', 'edit')->name('edit');
                        Route::put('/edit/{id}', 'update')->name('update');
                        Route::delete('/{id}', 'destroy')->name('destroy');
                        Route::get('/trash', 'trashed')->name('trashed');
                        Route::put('/restore/{id}', 'restore')->name('restore');
                    });
            });
    });


Route::get('getProvince/', [ProvinceController::class, 'getProvince']);
Route::get('getDistrict/{id}', [DistrictController::class, 'getDistrict']);
Route::get('getLocalLevel/{id}', [LocalLevelController::class, 'getLocalLevel']);
Route::get('getLocalLevelType/{id}', [LocalLeveTypeController::class, 'getLocalLevelType']);

Route::fallback([HomeController::class, 'notFound']);

Route::post('/password/change', [LoginController::class, 'emailPasswordUpdate'])->name('password.change');
