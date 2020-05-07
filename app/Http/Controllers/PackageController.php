<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUpdatePackageRequest;
use App\Package;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PackageController extends Controller
{
    public function index()
    {
        $data = [
            'packages' => Package::orderBy('name')->get(),
        ];

        return Inertia::render('Packages/Index', $data);
    }

    public function store(CreateUpdatePackageRequest $request)
    {
        Package::create($request->validated());

        return redirect()->route('packages.index');
    }
}
