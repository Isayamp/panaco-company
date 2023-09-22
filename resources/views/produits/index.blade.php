@extends('layouts.master')

@section('content')
    <div class="container-fluid p-0">
        <!-- Afficher les messages d'erreurs -->
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="alert-message">
                    <h4 class="alert-heading text-default"><strong>Une erreur est survenue</strong></h4>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif
        <!-- Fin message d'erreur -->

        <!-- Afficher le message d'enregistrement réussit -->
        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                <div class="alert-icon">
                    <i class="far fa-fw fa-bell"></i>
                </div>
                <div class="alert-message">
                    <strong>{{ $message }}</strong>
                </div>
            </div>
        @endif
        <!-- Fin message de réussite -->

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

                <!-- Modal de modification pour chaque produit -->
                <div class="modal fade" id="editProductModal{{ $produit->id }}" tabindex="-1"
                    aria-labelledby="editProductModalLabel{{ $produit->id }}" aria-hidden="true">

                    <!-- Contenu du modal de modification -->
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editProductModalLabel{{ $produit->id }}">Modifier le Produit
                                </h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('produits.update', $produit->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group m-3">
                                        <label for="designation_produit">Désignation</label>
                                        <input type="text" class="form-control" name="designation_produit"
                                            value="{{ $produit->designation_produit }}" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="description_produit">Description</label>
                                        <textarea class="form-control" name="description_produit" rows="3">{{ $produit->description_produit }}</textarea>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="prix">Prix</label>
                                        <input type="number" class="form-control" name="prix" step="0.01"
                                            value="{{ $produit->prix }}" required>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                    
                                        @if ($produit->image)
                                            <p class="mt-2">Image actuelle :</p>
                                            <img src="{{ asset('storage/' . $produit->image) }}" alt="{{ $produit->designation_produit }}" class="img-thumbnail">
                                        @else
                                            <p class="mt-2">Aucune image actuelle</p>
                                        @endif
                                    </div>
                                    
                                    <div class="form-group mb-3">
                                        <label for="disponibilite">Disponibilité</label>
                                        <select class="form-control" name="disponibilite">
                                            <option value="1" {{ $produit->disponibilite ? 'selected' : '' }}>
                                                Disponible</option>
                                            <option value="0" {{ !$produit->disponibilite ? 'selected' : '' }}>Non
                                                disponible</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="categorie_id">Catégorie</label>
                                        <select class="form-control" name="categorie_id" id="categorie_id">
                                            <option value="" disabled selected>Sélectionner</option>
                                            @foreach ($categories as $categorie)
                                                <option value="{{ $categorie->id }}"
                                                    {{ $produit->categorie_id == $categorie->id ? 'selected' : '' }}>
                                                    {{ $categorie->designation_categorie }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Modifier</button>
                                </form>
                            </div>
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
