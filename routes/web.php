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
        Route::group(
            [
                'prefix' => 'leads/{lead}/reminders',
                'as'     => 'leads.reminders.',
            ],
            function () {
                Route::get('create', [ReminderController::class, 'create'])->name('create');
                Route::post('/', [ReminderController::class, 'store'])->name('store');
                Route::get('{reminder}', [ReminderController::class, 'show'])->name('show');
                Route::patch('{reminder}', [ReminderController::class, 'update'])->name('update');
                Route::post('{reminder}/mark-as-completed', [ReminderController::class, 'markAsCompleted'])->name('mark_as_completed');
                Route::post('{reminder}/close-reminder', [ReminderController::class, 'closeReminder'])->name('close_reminder');
                Route::get('{reminder}/add-note', [ReminderController::class, 'addNote'])->name('add_note');
            }
        );
    }
);
