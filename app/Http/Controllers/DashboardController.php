<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct() {
        // Prevents access if user is not logged in
        $this->middleware(['auth']);
    }

    public function index() {
        return view('dashboard');
    }
}
