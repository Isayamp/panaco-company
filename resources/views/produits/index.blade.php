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

        <!-- Modal d'ajout -->
        <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel"
            aria-hidden="true">
            <!-- Contenu du modal d'ajout -->
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">Ajouter un Produit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('produits.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="designation_produit">Désignation</label>
                                <input type="text" class="form-control" name="designation_produit" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description_produit">Description</label>
                                <textarea class="form-control" name="description_produit" rows="3"></textarea>
                            </div>
                            <div class="form-group mb-3">
                                <label for="prix">Prix</label>
                                <input type="number" class="form-control" name="prix" step="0.01" required>
                            </div>
                            <div class="form-group mb-3">
                                <label for="image">Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <div class="form-group mb-3">
                                <label for="disponibilite">Disponibilité</label>
                                <select class="form-control" name="disponibilite">
                                    <option value="1">Disponible</option>
                                    <option value="0">Non disponible</option>
                                </select>
                            </div>
                            <div class="form-group mb-3">
                                <label for="categorie_id">Catégorie</label>
                                <select class="form-control" name="categorie_id">
                                    <option value="" disabled selected>Selectionner</option>
                                    @foreach ($categories as $categorie)
                                        <option value="{{ $categorie->id }}">{{ $categorie->designation_categorie }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
