<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [WelcomeController::class, '__invoke']);

Auth::routes(['register' => false]);

Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get('dashboard', [DashboardController::class, '__invoke'])->name('dashboard');
        Route::get('leads/create', [LeadController::class, 'create']);
        Route::post('leads', [LeadController::class, 'store']);
        Route::get('leads', [LeadController::class, 'index']);
        Route::get('leads/{lead}', [LeadController::class, 'show'])->name('leads.show');
    }
);
