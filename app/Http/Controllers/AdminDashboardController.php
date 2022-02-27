<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    //
    public function index() {
        $guard = 'admin';
        return view('dashboard', compact('guard'));
    }
}
