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

    public function show(Lead $lead, Reminder $reminder)
    {
        $data = [
            'lead'     => $lead,
            'reminder' => $reminder,
        ];

        return Inertia::render('Leads/Reminder/Show', $data);
    }

    public function update(CreateUpdateReminderRequest $request, Lead $lead, Reminder $reminder)
    {
        $reminder->update($request->validated());

        return redirect()->route('leads.show', $lead->id);
    }
}
