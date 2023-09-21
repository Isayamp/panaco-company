<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Charger les categorie
        $categorie = Categorie::all();

        // Retourner la vue index avec les catégories
        return view('categories.index', compact('categorie'));
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
            'designation_categorie' => ['required', 'max:25', 'min:2', 'unique:categories'],
        ]);
        
        // Création nouvelle objet catégorie
        $categorie = new Categorie;

        $categorie->designation_categorie = $request->designation_categorie;

        // dd($categorie);

        // Enregis
        $categorie->save();

        // 
        return redirect('categories')->with('success', 'Nouvelle catégorie enrégistée !');
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
