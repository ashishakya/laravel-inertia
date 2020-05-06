<?php

namespace App\Http\Controllers;

use App\Reminder;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $reminders = Reminder::query()
                             ->with('lead')
                             ->whereDate('reminder_date', today())
                             ->where('user_id', Auth::user()->id)
                             ->where('status', 'pending')
                             ->get();
        $data = [
            'reminders' => $reminders,
        ];

        return Inertia::render('Dashboard/Index', $data);
    }
}
