<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    //
    public function index() {
        $guard = 'user';
        return view('dashboard', compact('guard'));
    }
}
