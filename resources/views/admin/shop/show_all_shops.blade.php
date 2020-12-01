@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            Magasins
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                Magasins
            </li>
        </ul>
    </div>
    <div class="col-auto float-right ml-auto">
        <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_client">
            <i class="fal fa-plus"></i>
            Créer un magasin
        </a>
    </div>
@endsection
@section('body')
    <form class="row filter-row" action="" method="post">
        <div class="col-sm-12 col-md-6">
            <div class="form-group form-focus">
                <input type="text" id="project-name" name="project-name" class="form-control floating-input" placeholder=" ">
                <label for="project-name" class="float">Nom du magasin</label>
            </div>
        </div>
        <div class="col-sm-12 col-md-6">
            <a href="#" class="btn btn-success btn-block text-uppercase mout--regular">Chercher</a>
        </div>
    </form>

    <div class="row">
        @foreach($shops as $shop)
        @include('layouts.cards.client_card')
            {{ $shops->links() }}
        @endforeach

    </div>

<!-- Modal -->
<div class="modal fade custom-modal" id="create_client" tabindex="-1" aria-labelledby="create_client" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mout--regular" id="exampleModalLabel">Création d'un nouveau magasin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('shopAdd') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('layouts.form_errors.errors')
                    <div class="row">
                        <div class="col-12 text-center">
                            <h5 class="add-client-title">Société</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-client">
                            <div class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        <label for="shop-name" class="relative-label">Nom du magasin</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="shop-name" id="shop-name" aria-label="Nom du magasin" placeholder="Nom du magasin">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="shop-infrontof">Mettre le magasin sur l'accueil</label>
                                        <input type="checkbox" value="1" name="shop-infrontof" id="shop-infrontof">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="shop-phone" class="relative-label">Téléphone</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="shop-phone" id="shop-phone" aria-label="Téléphone" placeholder="Téléphone">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="shop-address" class="relative-label">Adresse</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="shop-address" id="shop-address" aria-label="Adresse du magasin" placeholder="Adresse du magasin">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="shop-zip" class="relative-label">Code Postal</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="shop-zip" id="shop-zip" aria-label="Code postal" placeholder="Code postal">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="shop-city" class="relative-label">Ville</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="shop-city" id="shop-city" aria-label="Ville" placeholder="Ville">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="shop-instagram" class="relative-label">Instagram URL</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="shop-instagram" id="shop-instagram" aria-label="Instagram" placeholder="Instagram URL">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="shop-facebook" class="relative-label">Facebook URL</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="shop-facebook" id="shop-facebook" aria-label="Facebook" placeholder="Facebook URL">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="shop-website" class="relative-label">Site internet URL</label>
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="shop-website" id="shop-website" aria-label="Site internet" placeholder="Site internet URL">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="shop-description" class="relative-label">Description du magasin</label>
                                        <div class="input-group">
                                            <textarea name="shop-description" id="shop-description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="shop-img-manager" class="relative-label">Image du propriétaire</label>
                                        <div class="input-group">
                                            <input class="form-control" type="file" name="shop-img-manager" id="shop-img-manager" aria-label="Logo" placeholder="Logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="shop-image" class="relative-label">Image principale du magasin</label>
                                        <div class="input-group">
                                            <input class="form-control" type="file" name="shop-image" id="shop-image" aria-label="Logo" placeholder="Logo">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 d-flex justify-content-center">
                            <button class="btn btn-primary add-btn">Enregistrer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
    <script>
        $('#shop-description').summernote({
            placeholder: 'Descriptif du projet',
            height: 150,
            width: '100%'
        });
    </script>
@endsection
