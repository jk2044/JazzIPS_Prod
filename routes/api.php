<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Subscription\SubscriptionController;

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

Route::prefix('ivr')->group(function () {
    Route::post("/subscription", [SubscriptionController::class, 'ivr_subscription']);
    // Other routes related to IVR can be added here
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
