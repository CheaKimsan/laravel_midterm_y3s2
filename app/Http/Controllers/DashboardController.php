<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    function viewDashboard()
    {
        return view('dashboard.index');
    }
}
