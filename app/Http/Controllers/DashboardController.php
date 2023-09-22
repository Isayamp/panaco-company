<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
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
        // Conteur des produits
        $nbreProduits = Produit::count();

        // Conteur des catégories
        $nbreCategories = Categorie::count();
        
        // Afficher le dashboard
        return view('dashboard', compact('nbreCategories', 'nbreProduits'));
    }
}
