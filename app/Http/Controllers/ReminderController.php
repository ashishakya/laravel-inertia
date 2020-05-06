<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateReminderRequest;
use App\Lead;
use App\Reminder;
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

    public function store(CreateUpdateReminderRequest $request, int $leadId)
    {
        $data            = $request->validated();
        $data['user_id'] = $request->user()->id;
        $data['status']  = 'pending';
        Reminder::create($data);

        return redirect()->route('leads.show', $leadId);
    }
}
