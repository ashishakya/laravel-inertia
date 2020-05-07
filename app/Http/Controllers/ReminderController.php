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

        return redirect()->route('leads.show', $leadId)->with('success', 'Reminder added successfully.');
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

        return redirect()->route('leads.show', $lead->id)->with('success', 'Reminder updated successfully.');
    }

    public function markAsCompleted(Request $request, Lead $lead, Reminder $reminder)
    {
        $reminder->markAsCompleted();

        return redirect()->route('leads.show', $lead->id)->with('success', 'Reminder marked as completed.');
    }

    public function closeReminder(Request $request, Lead $lead, Reminder $reminder)
    {
        $validatedDate = $request->validate(
            [
                'reminder_id' => ['required', 'exists:reminders,id'],
                'note'        => ['required', 'min:3'],
            ]
        );

        $reminder->note = $request->input('note');
        $reminder->save();

        $reminder->markAsCompleted();

        return redirect()->route('leads.show', $lead->id)->with('success', 'Reminder closed successfully.');
    }

    public function addNote(Lead $lead, Reminder $reminder)
    {
        $data = [
            'lead'     => $lead,
            'reminder' => $reminder,
        ];

        return Inertia::render('Leads/Reminder/Note/Create', $data);
    }

}
