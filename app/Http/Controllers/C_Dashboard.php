<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class C_Dashboard extends Controller
{
    public function index()
    {
        return view('backend.dashboard');
    }
}
