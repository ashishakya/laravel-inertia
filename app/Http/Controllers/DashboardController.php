<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $data = [
            'fname' => 'ashish',
            'lname' => 'shakya',
        ];

        return Inertia::render('Dashboard/Index', $data);
    }
}
