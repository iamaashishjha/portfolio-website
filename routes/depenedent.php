<?php

use App\Http\Controllers\DependentDropdownController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Dependent Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Dependent routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "Dependent" middleware group. Enjoy building your Dependent!
|
*/

Route::controller(DependentDropdownController::class)->group(function () {
    Route::get('getProvince/', 'getProvince');
    Route::get('getDistrict/{id}', 'getDistrict');
    Route::get('getLocalLevel/{id}', 'getLocalLevel');
    Route::get('getLocalLevelType/{id}', 'getLocalLevelType');
});