<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Locale Routes
|--------------------------------------------------------------------------
|
| Here is where you can register locale routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "locale" middleware group. Now create something great!
|
*/

Route::post('/locale', function () {
    $langVal = request()->locale;
    if (($langVal)) {
        session(['my_locale' => 'np']);
    } else {
        session(['my_locale' => 'en']);
    }
    return redirect()->back();
});