<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class);


Route::group(
    ['middleware' => 'auth'],
    function () {
        Route::get('dashboard', DashboardController::class)->name('dashboard');
        Route::resource('leads', LeadController::class);
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
        Route::resource('packages', PackageController::class);
    }
);
