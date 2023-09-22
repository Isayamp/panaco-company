@extends('layouts.master')

@section('content')
    <div class="container-fluid p-0">

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">Nouvelle catégorie</h1>
        </div>

        <div class="row">
            <div class="col-12 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Catégorie</h5>
                        
                    </div>
                    <div class="card-body">
                        <form action="{{ route('categories.update', $categorie->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label class="form-label">Désignation</label>
                                <input type="text" class="form-control" placeholder="" name="designation_categorie" value="{{ $categorie->designation_categorie }}">
                            </div>
                            <button type="submit" class="btn btn-primary">Enrégister</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
