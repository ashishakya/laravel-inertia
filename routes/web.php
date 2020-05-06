<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Auth;
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
        Route::resource('leads', 'LeadController');
        Route::get('leads/{lead}/reminders/create', [ReminderController::class, 'create'])->name('leads.reminders.create');
        Route::post('leads/{lead}/reminders', [ReminderController::class, 'store'])->name('leads.reminders.store');
        Route::get('leads/{lead}/reminders/{reminder}', [ReminderController::class, 'show'])->name('leads.reminders.show');
        Route::patch('leads/{lead}/reminders/{reminder}', [ReminderController::class, 'update'])->name('leads.reminders.update');
        Route::post('leads/{lead}/reminders/{reminder}/mark-as-completed', [ReminderController::class, 'markAsCompleted'])->name('leads.reminders.mark_as_completed');
    }
);
