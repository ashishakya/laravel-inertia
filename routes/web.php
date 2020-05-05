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

Route::get('dashboard', [DashboardController::class, '__invoke']);

Auth::routes(['register' => false]);

Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get('dashboard', [DashboardController::class, '__invoke']);
        Route::get('leads/create', [LeadController::class, 'create']);
    }
);
