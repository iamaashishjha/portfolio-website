<?php

use App\Http\Controllers\AdminBlogCategoryController;
use App\Http\Controllers\AdminBlogPostController;
use App\Http\Controllers\AdminBlogTagController;
use App\Http\Controllers\AdminHeaderFooterController;
use App\Http\Controllers\AdminInfoEducationController;
use App\Http\Controllers\AdminMembershipController;
use App\Http\Controllers\AdminNewsCategoryController;
use App\Http\Controllers\AdminNewsPostController;
use App\Http\Controllers\AdminNewsTagController;
use App\Http\Controllers\AdminSliderController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\UserBlogPostController;
use App\Http\Controllers\UserDashboardController;
use App\Models\InfoEducation;
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

Auth::routes(['verify' => false, 'register' => false]);

Route::prefix('/')
    ->name('home.')
    ->controller(HomeController::class)
    ->group(function () {
        Route::get('', 'index')->name('index');
        Route::get('/contact', 'contactPage')->name('contact');
        Route::get('/about', 'aboutUsPage')->name('about');

        Route::post('/sliderForm', 'indexPageSliderForm')->name('sliderForm');

        Route::prefix('events')
            ->name('events.')
            ->controller(HomeController::class)
            ->group(function () {
                Route::get('/', 'listEvent')->name('index');
                Route::get('/{id}', 'listEvent')->name('show');
            });

        Route::prefix('news')
            ->name('news.')
            ->controller(HomeController::class)
            ->group(function () {
                Route::get('/', 'listNews')->name('index');
                Route::get('/{id}', 'showNews')->name('show');
            });

        Route::prefix('blogs')
            ->name('blogs.')
            ->controller(HomeController::class)
            ->group(function () {
                Route::get('/', 'listBlog')->name('index');
                Route::get('/{id}', 'showBlog')->name('show');
            });

        Route::prefix('member')
            ->name('member.')
            ->controller(MembershipController::class)
            ->group(function () {
                Route::get('/create', 'create')->name('create');
                Route::post('/', 'store')->name('store');
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
                Route::prefix('/category')
                    ->name('category.')
                    ->controller(AdminBlogCategoryController::class)
                    ->group(function () {
                        Route::get('/create', 'create')->name('create');
                        Route::post('/', 'store')->name('store');
                        Route::get('/', 'index')->name('index');
                        Route::get('/edit/{id}', 'edit')->name('edit');
                        Route::put('/edit/{id}', 'update')->name('update');
                        Route::delete('/{id}', 'destroy')->name('destroy');
                    });
                Route::prefix('/tag')
                    ->name('tag.')
                    ->controller(AdminBlogTagController::class)
                    ->group(function () {
                        Route::get('/create', 'create')->name('create');
                        Route::post('/', 'store')->name('store');
                        Route::get('/', 'index')->name('index');
                        Route::get('/edit/{id}', 'edit')->name('edit');
                        Route::put('/edit/{id}', 'update')->name('update');
                        Route::delete('/{id}', 'destroy')->name('destroy');
                    });
                Route::prefix('/post')
                    ->name('post.')
                    ->controller(AdminBlogPostController::class)
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

        Route::prefix('/news')
            ->name('news.')
            ->group(function () {
                Route::prefix('/category')
                    ->name('category.')
                    ->controller(AdminNewsCategoryController::class)
                    ->group(function () {
                        Route::get('/create', 'create')->name('create');
                        Route::post('/', 'store')->name('store');
                        Route::get('/', 'index')->name('index');
                        Route::get('/edit/{id}', 'edit')->name('edit');
                        Route::put('/edit/{id}', 'update')->name('update');
                        Route::delete('/{id}', 'destroy')->name('destroy');
                    });
                Route::prefix('/tag')
                    ->name('tag.')
                    ->controller(AdminNewsTagController::class)
                    ->group(function () {
                        Route::get('/create', 'create')->name('create');
                        Route::post('/', 'store')->name('store');
                        Route::get('/', 'index')->name('index');
                        Route::get('/edit/{id}', 'edit')->name('edit');
                        Route::put('/edit/{id}', 'update')->name('update');
                        Route::delete('/{id}', 'destroy')->name('destroy');
                    });
                Route::prefix('/post')
                    ->name('post.')
                    ->controller(AdminNewsPostController::class)
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

        // Route::prefix('/info')
        //     ->name('info.')
        //     ->group(function () {
        //         Route::prefix('/education')
        //             ->name('education.')
        //             ->controller(AdminInfoEducationController::class)
        //             ->group(function () {
        //                 Route::get('/create', 'create')->name('create');
        //                 Route::post('/', 'store')->name('store');
        //                 Route::get('/', 'index')->name('index');
        //                 Route::get('/edit/{id}', 'edit')->name('edit');
        //                 Route::put('/edit/{id}', 'update')->name('update');
        //                 Route::delete('/{id}', 'destroy')->name('destroy');
        //             });
        //     });

        Route::prefix('/home')
            ->name('home.')
            ->group(function () {
                Route::prefix('/header-footer')
                    ->name('headerFooter.')
                    ->controller(AdminHeaderFooterController::class)
                    ->group(function () {
                        Route::get('/create', 'create')->name('create');
                        Route::post('/', 'store')->name('store');
                        Route::get('/', 'index')->name('index');
                        Route::get('/edit/{id}', 'edit')->name('edit');
                        Route::put('/edit/{id}', 'update')->name('update');
                        Route::delete('/{id}', 'destroy')->name('destroy');
                    });
                Route::prefix('/slider')
                    ->name('slider.')
                    ->controller(AdminSliderController::class)
                    ->group(function () {
                        Route::get('/create', 'create')->name('create');
                        Route::post('/', 'store')->name('store');
                        Route::get('/', 'index')->name('index');
                        Route::get('/edit/{id}', 'edit')->name('edit');
                        Route::put('/edit/{id}', 'update')->name('update');
                        Route::delete('/{id}', 'destroy')->name('destroy');
                    });
            });
        Route::prefix('/member')
            ->name('member.')
            ->group(function () {
                Route::prefix('/membership')
                    ->name('membership.')
                    ->controller(AdminMembershipController::class)
                    ->group(function () {
                        Route::get('/create', 'create')->name('create');
                        Route::post('/', 'store')->name('store');
                        Route::get('/', 'index')->name('index');
                        Route::get('/show/{id}', 'show')->name('show');
                        Route::get('/edit/{id}', 'edit')->name('edit');
                        Route::put('/edit/{id}', 'update')->name('update');
                        Route::delete('/{id}', 'destroy')->name('destroy');
                    });
            });
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
                // Route::get('', 'index')->name('index');
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

Route::fallback(function () {
    // return view('customBlade.errors.404');
    abort(404);
});

Route::get('getProvince/', [App\Http\Controllers\ProvinceController::class, 'getProvince']);
Route::get('getDistrict/{id}', [App\Http\Controllers\DistrictController::class, 'getDistrict']);
Route::get('getLocalLevel/{id}', [App\Http\Controllers\LocalLevelController::class, 'getLocalLevel']);
Route::get('getLocalLevelType/{id}', [App\Http\Controllers\LocalLeveTypeController::class, 'getLocalLevelType']);
