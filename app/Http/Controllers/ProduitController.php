<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProduitController extends Controller
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
        // Récupération du produit
        $produit = Produit::findOrFail($id);

        // Validation des données
        $request->validate([
            'designation_produit' => 'required',
            'description_produit' => 'required',
            'prix' => 'required',
            'categorie_id' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Vérification si un nouveau fichier image a été téléchargé
        if ($request->hasFile('image')) {
            // Supprimer l'ancienne image si elle existe
            if ($produit->image) {
                Storage::delete('public/' . $produit->image);
            }

            // Enregistrer la nouvelle image
            $todayDate = date('YmdHist');
            $imagePath = $request->file('image')->storeAs(
                'images',
                $todayDate . '.' . $request->file('image')->getClientOriginalExtension(),
                'public'
            );

            // Mettre à jour le produit avec la nouvelle image
            $produit->update(array_merge($request->all(), ['image' => $imagePath]));
        } else {
            // Si aucun nouveau fichier image n'a été téléchargé, conservez l'image actuelle
            $produit->update($request->all());
        }

        return redirect()->route('produits.index')->with('success', 'Produit modifié avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $produit = Produit::findOrfail($id);

        $produit->delete();

        return redirect()->route('produits.index')->with('success', 'Produit supprimé avec succès.');
    }
}
