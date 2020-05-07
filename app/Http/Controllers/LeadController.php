<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdateLeadRequest;
use App\Lead;
use App\Package;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::query()
                     ->where('branch_id', 1)
                     ->orderBy('name')
                     ->get();

        return Inertia::render(
            'Leads/Index',
            [
                'leads' => $leads,
            ]
        );
    }

    public function show($leadId)
    {

        $lead = Lead::findOrFail((int) $leadId);
        $lead->load('reminders');

        return Inertia::render(
            'Leads/Show',
            [
                'leadDetail' => $lead,
            ]
        );
    }

    public function create()
    {
        $data = [
            'packages' => Package::orderBy('name')->get(),
        ];

        return Inertia::render('Leads/CreateLead', $data);
    }

    public function store(CreateUpdateLeadRequest $request)
    {
        $data              = $request->validated();
        $data['added_by']  = Auth::user()->id;
        $data['branch_id'] = 1;
        $data['age']       = Carbon::parse($data['dob'])->age;

        Lead::create($data);

        return redirect()->route('leads.index');
    }

    public function update(CreateUpdateLeadRequest $request, int $leadId)
    {
        $data        = $request->validated();
        $data['age'] = Carbon::parse($data['dob'])->age;

        $lead = Lead::where('id', $leadId)->update($data);

        return redirect()->route('leads.show', $leadId);
    }
}
