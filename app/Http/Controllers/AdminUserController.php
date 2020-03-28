<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AdminUser;

class AdminUserController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function index()
    {
        return view('admin.login');
    }

    public function create()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|string|email',
            'password' => 'required|confirmed',
        ]);

        $adminUser = AdminUser::create([
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        auth()->login($adminUser);
        return redirect('/admin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (!Auth::guard('admin')->attempt($credentials)) {
            return back()->withErrors([
                'message' => 'Wrong credentials'
            ]);
        }
        session()->flash('msg', 'You have been Logged in');
        return redirect('/admin');
    }

    public function logout() {
        auth()->guard('admin')->logout();
        session()->flash('msg', 'Logged out successfully');
        return redirect('/admin/login');
    }

}
