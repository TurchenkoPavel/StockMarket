<?php

use App\Http\Controllers\MarketActionController;
use App\Http\Controllers\OurUniqueApproachController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\TradeSetupController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get-market-state', [MarketActionController::class, 'getMarketState']);
Route::get('get-market-action-symbols', [MarketActionController::class, 'getSymbols']);
Route::post('get-symbol-info', [TradeSetupController::class, 'getSymbolInfo']);
Route::get('get-open-orders', [TradeSetupController::class, 'getOpenOrders']);
Route::get('get-unique-approach', [OurUniqueApproachController::class, 'getUniqueApproach']);
Route::get('get-subscription', [SubscriptionController::class, 'getSubscriptions']);

