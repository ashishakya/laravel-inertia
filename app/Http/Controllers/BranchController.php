<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Http\Requests\CreateUpdateBranchRequest;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BranchController extends Controller
{
    public function create()
    {
        return Inertia::render('Branches/Create');
    }

    public function index()
    {
        $data = [
            'branches' => Branch::orderBy('name')->get(),
        ];

        return Inertia::render('Branches/Index', $data);
    }

    public function store(CreateUpdateBranchRequest $request)
    {
        Branch::create($request->validated());

        return redirect()->route('branches.index')->with('success', 'Branch added successfully.');
    }
}
