<?php

namespace App\Http\Controllers;

use App\Lead;
use App\Package;
use App\Reminder;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $reminders   = Reminder::query()
                               ->with('lead')
                               ->whereDate('reminder_date', today())
                               ->where('user_id', Auth::user()->id)
                               ->where('status', 'pending')
                               ->get();
        $data        = [
            'reminders'   => $reminders,
            'packages'    => Package::orderBy('name')->get(),
            'latestLeads' => Lead::latest()->orderBy('name')->limit(10)->get(),
        ];

        return Inertia::render('Dashboard/Index', $data);
    }
}
