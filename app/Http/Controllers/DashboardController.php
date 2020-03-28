<?php

namespace App\Http\Controllers;

use App\User;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index() {
        $user = new User();
    	return view('admin.dashboard', compact('user'));
    }
}
