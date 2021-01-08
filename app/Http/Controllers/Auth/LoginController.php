<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{

    public function __construct() {
        // Prevents access to index and store functions if user is logged in
        $this->middleware(['guest']);
    }

    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {
        //validate
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        //Authenticate
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)) {
            return back()->with('status', 'Invalid login details');
        };

        //Redirect
        return redirect()->route('dashboard');
    }
} 
