<?php

namespace App\Http\Controllers;

use App\Lead;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ReminderController extends Controller
{
    public function create(int $leadId)
    {
        $data = [
            'lead' => Lead::findOrFail((int) $leadId),
        ];

        return Inertia::render('Leads/Reminder/Create', $data);
    }
}
