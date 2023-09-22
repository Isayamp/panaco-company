<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Charger les catégories
        $categories = Categorie::all();

        // Requêtte pour charger les produits (avec jointure -> clé étrangère)
        $produits = DB::table('produits')
                                ->join('categories', 'produits.categorie_id', 'categories.id')
                                // ->select('categories.*', 'produits.*')
                                ->select('produits.*', 'categories.designation_categorie as categorie')
                                ->get();

        // Aficher le tableau
        return view('produits.index', compact('categories', 'produits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'designation_produit' => 'required|unique:produits,designation_produit|max:50',
            'description_produit' => 'required',
            'prix' => 'required',
            'categorie_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Traitement ou récuperation informations de m' image
        $imagePath = null;
        if ($request->hasFile('image')) {
            $todayDate = date('YmdHist');
            $imagePath = $request->file('image')->storeAs(
                'images',
                $todayDate . '.' . $request->file('image')->getClientOriginalExtension(),
                'public'
            );
        }

        // Enregistrement
        $produit = Produit::create($request->all());

        $produit->update(['image' => $imagePath]); 

        return redirect()->route('produits.index')->with('success', 'Produit ajouté avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
