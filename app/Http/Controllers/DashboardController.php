<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Afficher le dashboard
        return view('dashboard', compact('nbreProduits', 'nbreCategories'));
    }
}
