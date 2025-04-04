<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\StatefulGuard;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function index(): View
    {
        return view('dashboard');
    }

    public function about(): View
    {
        return view('modules.about');
    }

    public function userManagement(): View
    {
        return view('modules.user-management');
    }

    public function maintenance(): View
    {
        return view('modules.maintenance');
    }

    public function reports(): View
    {
        return view('modules.reports');
    }

    public function movements(): View
    {
        return view('modules.movements');
    }
}