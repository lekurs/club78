@extends('layouts.admin-layout')
@section('page-header')
    <div class="col">
        <h3 class="page-header-title">
            {{ $shop->name }}
        </h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('admin') }}">Dashboard</a>
            </li>
            <li class="breacrumb-item active">
                Magasin
            </li>
        </ul>
    </div>
@endsection

@section('body')
<div class="card">
    <div class="card-body">
        <div class="dropdown-mout">
            <div class="dropdown-icon">
                <i class="fal fa-ellipsis-v"></i>
            </div>
            <div class="dropdown-menu-mout">
{{--                <a class="dropdown-item" href="{{ route('clientEditForm', $shop->slug) }}" data-id="{{ $shop->id }}"><i class="fal fa-pen"></i> Modifier</a>--}}
                <a class="dropdown-item" href="#" data-id="{{ $shop->id }}"><i class="fal fa-trash"></i> Supprimer</a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="client-view">
                    <div class="client-img-wrap">
                        <div class="client-logo">
                            <img src="{{ asset('storage/images/uploads/' . $shop->slug . '/manager/' . $shop->img_manager) }}" alt="{{ $shop->name }}" class="img-fluid img-client-logo">
                        </div>
                    </div>
                    <div class="client-informations">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="client-informations-left">
                                    <h3 class="client-name mt-0">{{ $shop->name }}</h3>
{{--                                    <small class="text-muted">{{ count($shop->projects) }} @if(count($shop->projects)>1)projets réalisés @else projet réalisé @endif</small>--}}
                                </div>
                            </div>
                            <div class="col-md-7">
                                <ul class="client-details">
                                    <li>
                                        <span class="title">Téléphone :</span>
                                        <span class="text">{{ $shop->phone }}</span>
                                    </li>
                                    <li>
                                        <span class="title">Adresse :</span>
                                        <span class="text">{{ $shop->address }}</span>
                                    </li>
                                    <li>
                                        <span class="title">Code postal / ville : </span>
                                        <span class="text">{{ $shop->zip }} {{ $shop->city }}</span>
                                    </li>
                                    <li>
                                        <span class="title">Siren :</span>
                                        <span class="text">@if(is_null($shop->siren)) Non renseigné @else {{ $shop->siren }} @endif</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--<div class="card tab-box mb-4">--}}
{{--    <div class="row user-tabs">--}}
{{--        <div class="col-12 line-tabs">--}}
{{--            <ul class="nav nav-tabs nav-tabs-bottom">--}}
{{--                <li class="nav-item col-sm-3"><a class="nav-link active" data-toggle="tab" role="tab" aria-controls="myprojects" aria-selected="true" href="#myprojects">Projets</a></li>--}}
{{--                <li class="nav-item col-sm-3"><a class="nav-link" data-toggle="tab" role="tab" aria-controls="contacts" aria-selected="false" href="#contacts">Contacts</a></li>--}}
{{--                <li class="nav-item col-sm-3"><a class="nav-link" data-toggle="tab" role="tab" aria-controls="estimations" aria-selected="false" href="#estimations">Devis</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}

<div class="products-container">
    <div class="row no-gutters background-admin-content mt-4">
        <div class="col-6">
            <h4 class="col-auto float-left ml-auto mt-3">Les produits</h4>
        </div>
        <div class="col-6 text-right ml-auto mt-3">
            <a href="#" class="btn add-btn" data-toggle="modal" data-target="#create_product">
                <i class="fal fa-plus"></i>
                Créer un produit
            </a>
        </div>
    </div>

    <div class="row no-gutters background-admin-content mt-4">
        @foreach($shop->products as $product)
        <div class="col-4">
            {{ dump($product) }}
            {{ $product->img_path_v }}
        </div>
        @endforeach
    </div>
</div>

<!-- Modal Product -->
<div class="modal fade custom-modal" id="create_product" tabindex="-1" aria-labelledby="create_product" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mout--regular" id="exampleModalLabel">Création d'un nouveau produit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('productAdd') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('layouts.form_errors.errors')
                    <input type="hidden" name="shop-id" id=product-shop-id" value="{{ $shop->id }}">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="product-label" class="relative-label">Intitulé du produit</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" name="product-label" id="product-label" aria-label="Intitulé du produit" placeholder="Intitulé du produit">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="product-description" class="relative-label">Description du produit</label>
                                <div class="input-group">
                                    <textarea name="product-description" id="product-description" class="form-control"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="product-img-v" class="relative-label">Image produit Portrait</label>
                                <input type="file" name="product-img-v" id="product-img-v">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-check-input" id="product-img-main-v" type="checkbox" value="1" name="product-img-main">
                                <label for="product-img-main">Définir comme image principale</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="form-group">
                                <label for="product-img-h" class="relative-label">Image produit Paysage</label>
                                <input type="file" name="product-img-h" id="product-img-h">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                <input class="form-check-input" id="product-img-main-h" type="checkbox" value="1" name="product-img-main">
                                <label for="product-img-main">Définir comme image principale</label>
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
        $(document).ready(function() {
            $('.select-prestation').select2({
                width: '100%'
            });

            $('#product-description').summernote({
                placeholder: 'Descriptif du projet',
                height: 150,
                width: '100%'
            });
        });
    </script>
@endsection
