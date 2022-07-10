<?php

use App\Http\Controllers\AdminBlogCategoryController;
use App\Http\Controllers\AdminBlogPostController;
use App\Http\Controllers\AdminBlogTagController;
use App\Http\Controllers\AdminCompanyDetailsController;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\AdminAppSettingsController;
use App\Http\Controllers\AdminDocumentController;
use App\Http\Controllers\AdminLibraryController;
use App\Http\Controllers\AdminMembershipController;
use App\Http\Controllers\AdminNewsCategoryController;
use App\Http\Controllers\AdminNewsPostController;
use App\Http\Controllers\AdminNewsTagController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\UserBlogPostController;
use App\Http\Controllers\UserDashboardController;
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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::view('/a', 'ar.blog.post.show');

Route::post('/locale', function () {
    if ((app('request')->input('locale'))) {
        session(['my_locale' => 'en']);
    } else {
        session(['my_locale' => 'np']);
    }
    return redirect()->back();
});

Auth::routes(['verify' => false, 'register' => false]);

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

Route::middleware(['auth', 'admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get(
            '/',
            [App\Http\Controllers\AdminDashboardController::class, 'index']
        )->name('index');
        Route::prefix('/user')
            ->name('user.')
            ->controller(AdminUserController::class)
            ->group(function () {
                Route::get('/registered-users', 'registeredUsers')->name('registered');
                Route::put('/registered-user/{user_id}', 'makeAdmin')->name('make');
                Route::get('/admin-users', 'adminUsers')->name('admin');
                Route::put('/admin-user/{user_id}', 'removeAdmin')->name('remove');
                Route::delete('/{user_id}', 'deleteUser')->name('delete');
                Route::get('/profile/{id}', 'profile')->name('profile');
                Route::put('/profile/{id}', 'profileUpdate')->name('update');
                Route::get('/changepassword/{id}', 'changePassword')->name('changePassword');
        });

        Route::prefix('/blog')
            ->name('blog.')
            ->group(function () {
                Route::resource('/category', AdminBlogCategoryController::class);
                Route::resource('/tag', AdminBlogTagController::class);
                Route::resource('/post', AdminBlogPostController::class);
                Route::get('/post/trash', [AdminBlogPostController::class, 'trashed'])->name('post.trashed');
                Route::put('/post/restore/{id}', [AdminBlogPostController::class, 'restore'])->name('post.restore');
        });

        Route::prefix('/news')
            ->name('news.')
            ->group(function () {
                Route::resource('/category', AdminNewsCategoryController::class);
                Route::resource('/tag', AdminNewsTagController::class);
                Route::resource('/post', AdminNewsPostController::class);
                Route::get('/post/trash', [AdminNewsPostController::class, 'trashed'])->name('post.trashed');
                Route::put('/post/restore/{id}', [AdminNewsPostController::class, 'restore'])->name('post.restore');
        });

        Route::prefix('/home')
            ->name('home.')
            ->group(function () {
                Route::resource('/app-setting', AdminAppSettingsController::class)->except('destroy');
                Route::resource('/company-details', AdminCompanyDetailsController::class)->except('destroy');
                Route::resource('/slider', AdminSliderController::class)->except('destroy'); 
        });

        Route::resource('/member', AdminMembershipController::class);
        Route::post('/member/{id}', [AdminMembershipController::class, 'approveMember'])->name('member.approve');
        Route::resource('/event', AdminEventController::class);
        Route::resource('/document', AdminDocumentController::class);
        Route::resource('/library', AdminLibraryController::class);

});

Route::middleware(['auth', 'user', 'verified'])
    ->prefix('dashboard')
    ->name('user.')
    ->group(function () {
        Route::get('/', [App\Http\Controllers\UserDashboardController::class, 'index'])->name('index');
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


Route::get('getProvince/', [App\Http\Controllers\ProvinceController::class, 'getProvince']);
Route::get('getDistrict/{id}', [App\Http\Controllers\DistrictController::class, 'getDistrict']);
Route::get('getLocalLevel/{id}', [App\Http\Controllers\LocalLevelController::class, 'getLocalLevel']);
Route::get('getLocalLevelType/{id}', [App\Http\Controllers\LocalLeveTypeController::class, 'getLocalLevelType']);

Route::fallback([App\Http\Controllers\HomeController::class, 'notFound']);


// Route::view('/a', 'welcome');


Route::post('/password/update', [App\Http\Controllers\Auth\LoginController::class, 'emailPasswordUpdate'])->name('password.update');