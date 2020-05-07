<?php

namespace App\Http\Controllers;

use App\Package;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PackageController extends Controller
{
    public function index()
    {
        $data = [
            'packages'=>Package::orderBy('name')->get()
        ];
        return Inertia::render('Packages/Index', $data);
    }
}
