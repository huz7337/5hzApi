<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    /**
     * Dashboard main
     *
     * @return mixed
     */
    public function index()
    {
        return view('dashboard.index');
    }
}
