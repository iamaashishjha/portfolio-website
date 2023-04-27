<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LocalLevelController;
use App\Http\Controllers\LocalLeveTypeController;

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

require __DIR__ . '/locale.php';

require __DIR__ . '/auth.php';

require __DIR__ . '/home.php';

require __DIR__ . '/admin.php';

Route::get('getProvince/', [ProvinceController::class, 'getProvince']);
Route::get('getDistrict/{id}', [DistrictController::class, 'getDistrict']);
Route::get('getLocalLevel/{id}', [LocalLevelController::class, 'getLocalLevel']);
Route::get('getLocalLevelType/{id}', [LocalLeveTypeController::class, 'getLocalLevelType']);
Route::post('/password/change', [LoginController::class, 'emailPasswordUpdate'])->name('password.change');


Route::fallback([HomeController::class, 'notFound']);
// This should be the end of file and last line for this file