<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Agent\AgentAuthController;
use App\Http\Controllers\Agent\AgentSalesController;
use App\Http\Controllers\Transaction\PaymentController;

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

/*
|--------------------------------------------------------------------------
| TeleSales Agent Routes 
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('agent')->group(function () {
    Route::get('/login', [AgentAuthController::class, 'showLoginForm'])->name('agent.login');
    Route::post('/login', [AgentAuthController::class, 'login']);

    Route::middleware(['web', 'agent'])->group(function () {
        Route::get('/dashboard', [AgentAuthController::class, 'dashboard'])->name('agent.dashboard');
        Route::get('/sales', [AgentSalesController::class, 'sales'])->name('agent.sales');
        Route::get('/transaction', [AgentSalesController::class, 'transaction'])->name('agent.transaction');
        Route::post('/logout', [AgentAuthController::class, 'logout'])->name('agent.logout');
        Route::get('/sucesssales', [AgentSalesController::class, 'showAgentData'])->name('agent.sucesssales');
        Route::get('/Failedsucesssales', [AgentSalesController::class, 'FailedAgentReports'])->name('agent.Failedsucesssales');

        Route::post('/transaction-controller-route', [PaymentController::class, 'transactionController'])->name('transaction-controller-route');
    });
});

// --------------------------------------------------------------------------