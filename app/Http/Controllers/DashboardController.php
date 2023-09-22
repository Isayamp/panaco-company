<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Afficher le dashboard
        return view('dashboard');
    }
}
