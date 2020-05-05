<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLeadRequest;
use App\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class LeadController extends Controller
{
    public function index()
    {
        $leads = Lead::query()
                     ->where('branch_id', 2)
                     ->latest()
                     ->get();

        return Inertia::render('Leads/Index', [
            'leads'=>$leads
        ]);
    }

    public function create()
    {
        return Inertia::render('Leads/CreateLead');
    }

    public function store(CreateLeadRequest $request)
    {
        $data             = $request->validated();
        $data['added_by'] = Auth::user()->id;
        $data['age']      = 20;

        return redirect()->route('dashboard');
    }
}
