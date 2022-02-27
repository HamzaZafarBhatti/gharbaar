<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BloggerDashboardController extends Controller
{
    //
    public function index() {
        $guard = 'blogger';
        return view('dashboard', compact('guard'));
    }
}
