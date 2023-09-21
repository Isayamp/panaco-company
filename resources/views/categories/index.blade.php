@extends('layouts.master')

@section('content')
    <div class="container-fluid p-0">

        <!-- Header -->
        <div class="row mb-2 mb-xl-3">
            <div class="col-auto d-none d-sm-block">
                <h3><strong>Catégories des produits</strong></h3>
            </div>

            <div class="col-auto ms-auto text-end mt-n1">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#sizedModalSm">
                    Ajouter
                </button>
            </div>            
        </div>
        <!-- End Header -->

        <div class="row">
            <div class="col-12">

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

                <div class="card">
                    <div class="card-body">
                        <table id="datatables-buttons" class="table {{-- table-striped --}} table-hover" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Designation</th>
                                    <th width="280px">Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categorie as $categorie)
                                    <tr>
                                        <td><strong>{{ ++$i }}</strong></td>
                                        {{-- <td><strong>{{ $categorie->id }}</strong></td> --}}
                                        <td>{{ $categorie->designation_categorie }}</td>
                                        <td class="table-action" width="280px">
                                            <a href="{{ route('categories.edit', $categorie->id) }}"><i
                                                    class="align-middle text-info" data-feather="edit-2"></i></a>

                                            <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST"
                                                class="d-md-inline-flex">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    onclick="return confirm('Etes-vous sûr de supprimer cet élement ?')">
                                                    <i class="align-middle text-danger border-0"
                                                        data-feather="trash-2"></i></a>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


        <!-- BEGIN  modal -->
        <div class="modal fade" id="sizedModalSm" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Nouvelle catégorie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body m-3">
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="mb-3">
                                <label class="form-label">Désignation</label>
                                <input type="text" class="form-control" placeholder="" name="designation_categorie"
                                    autofocus>
                            </div>
                            <button type="submit" class="btn btn-primary">Enrégister</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- END  modal -->


    </div>
@endsection()
