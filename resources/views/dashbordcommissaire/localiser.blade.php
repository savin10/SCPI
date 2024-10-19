@extends('layouts.squelette')

@section('content')
<div class="wrapper">
    <!-- Contenu spécifique à votre page ici -->
    @include('dashbordcommissaire.sidebar.sidebar')
    @include('dashbordcommissaire.header.header')

    <div id="content-page" class="content-page">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 mb-5">
                    <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                            <div class="iq-header-title">
                                <h4 class="card-title">Localiser une moto</h4>
                            </div>
                        </div>
                        <div class="iq-card-body">
                            <form action="{{ route('gps') }}" method="GET">
                                <div class="form-row">
                                    <div class="col-md-12 mb-4">
                                        <div class="col-md-12 mb-2">
                                            <label for="validationDefaultUsername">N°Plaque</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend2">N°:</span>
                                                </div>
                                                <input type="search" name="chasis" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Localiser</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Affichage des localisations pour le numéro de plaque -->
            @if(isset($localisations) && count($localisations) > 0)
                <h1>Localisations pour le numéro de chasis : {{ $localisations[0]->chasis }}</h1>
                <!-- Div où la carte sera affichée -->
                <div id="map" style="height: 500px;"></div>

                <script>
                    function initMap() {
                        // Créer la carte centrée sur la première localisation
                        var map = new google.maps.Map(document.getElementById('map'), {
                            zoom: 13, // Niveau de zoom
                            center: {lat: parseFloat({{ $localisations[0]->latitude }}), lng: parseFloat({{ $localisations[0]->longitude }})}
                        });

                        // Ajouter des marqueurs pour chaque localisation
                        var localisations = @json($localisations);
                        localisations.forEach(function(localisation) {
                            var marker = new google.maps.Marker({
                                position: {lat: parseFloat(localisation.latitude), lng: parseFloat(localisation.longitude)},
                                map: map,
                                title: 'Localisation de la moto'
                            });
                        });
                    }

                    // Charger l'API Google Maps avec votre clé API
                    function loadScript() {
                        var script = document.createElement('script');
                        script.src = "https://maps.googleapis.com/maps/api/js?key=AIzaSyBv1yoB4Lu5ss2Ep1n5AF-RojxvT0cK1sI&callback=initMap";
                        document.body.appendChild(script);
                    }

                    // Appeler la fonction loadScript pour charger la carte
                    window.onload = loadScript;
                </script>
            @else
                <h1>Aucune localisation trouvée pour ce numéro de plaque.</h1>
            @endif
        </div>
    </div>
</div>
@endsection
