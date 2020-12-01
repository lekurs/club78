<div class="col-md-4 col-sm-6 col-12">
    <div class="client-card-container">
        <div class="client-img-container">
            <a href="{{ route('showShowOne', $shop->slug) }}">
                <img src="{{ asset('storage/images/uploads/' . $shop->slug . '/manager/' . $shop->img_manager) }}" alt="{{ $shop->name }}" class="img-fluid client-img">
            </a>
        </div>
        <div class="dropdown-mout">
            <div class="dropdown-icon">
                <i class="fal fa-ellipsis-v" aria-hidden="true"></i>
            </div>
            <div class="dropdown-menu-mout">
                <a class="dropdown-item" href="{{ route('showShowOne', $shop->slug) }}" data-id=""><i class="fal fa-pen"></i> Modifier</a>
                <a class="dropdown-item" href="#" data-id=""><i class="fal fa-trash"></i> Supprimer</a>
            </div>
        </div>
        <a href="{{ route('showShowOne', $shop->slug) }}">
            <h4 class="client-name">{{ $shop->name }}</h4>
        </a>
        <a href="{{ route('showShowOne', $shop->slug) }}">
{{--            <h5 class="client-total-projects">{{ count($shop->projects) }} @if(count($shop->projects)>1)projets réalisés @else projet réalisé @endif</h5>--}}
        </a>
        <a href="{{ route('showShowOne', $shop->slug) }}">
            <div class="small text-muted client-total-ca">CA Total sur l'année</div>
        </a>

        <a href="{{ route('showShowOne', $shop->slug) }}" class="btn btn-white">Voir le client</a>
    </div>
</div>
