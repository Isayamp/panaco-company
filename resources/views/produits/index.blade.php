@extends('layouts.master')

@section('content')
    <div class="container-fluid p-0">


        <!-- Header -->
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Liste des produits</strong></h3>
            </div>

            <!-- Bouton pour ouvrir le modal d'ajout -->
            <div class="col-auto ms-auto text-end mt-n1">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                    Nouveau
                </button>
            </div>
        </div>
        <!-- End Header -->

        <!-- Liste des produits -->
        <div class="row">
            @foreach ($produits as $produit)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="availability-badge">
                            @if ($produit->disponibilite)
                                <span class="badge bg-success">Disponible</span>
                            @else
                                <span class="badge bg-danger">Non disponible</span>
                            @endif
                        </div>


                        <img src="{!! asset('storage/' . $produit->image) !!}" class="card-img-top" alt="{{ $produit->designation_produit }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $produit->designation_produit }}</h5>
                            <h6 class="card-text text-info">{{ $produit->categorie }}</h6>
                            <p class="card-text">{{ $produit->description_produit }}</p>
                            <p class="card-text">{{ $produit->prix }} $</p>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#editProductModal{{ $produit->id }}">Modifier</a>

                            <form action="{{ route('produits.destroy', $produit->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Voulez-vous vraiment supprimer ?')">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>

                
            @endforeach
        </div>

        
    </div>
@endsection
