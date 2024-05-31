<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\LocalLevelController;
use App\Http\Controllers\LocalLeveTypeController;
use App\Http\Controllers\Transactions\TransactionController;

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

require __DIR__ . '/depenedent.php';


Route::get('/payment-gateway/get-payment-gateway-config/{payment_gateway_id}/{member_id}', [TransactionController::class, 'getPaymentGatewaysConfigs']);

Route::fallback([HomeController::class, 'notFound']);
// This should be the end of file and last line for this file