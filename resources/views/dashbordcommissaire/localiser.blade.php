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
                                    <h4 class="card-title"> Localiser une moto</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form action="{{ route('gps') }}" method="GET">
                                    <div class="form-row">

                                        <div class="col-md-12 mb-4">

                                        <div class="col-md-12 mb-2">

                                            <label for="validationDefaultUsername">N°Chasis</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend2">N°:</span>
                                                </div>
                                                <input type="search" name="chasis" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                                            </div>
                                        </div><br>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Localiser</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
              
                    <!-- Dans votre vue Blade -->
                    <div id="map"></div>
    <script>
        function initMap() {
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: -34.397, lng: 150.644},
                zoom: 8
            });
        }
    </script>
                    <div class="col-sm-12" id="maCarte"></div>

 
<script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js" integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og==" crossorigin=""></script>
<script src="https://unpkg.com/leaflet.markercluster@1.4.1/dist/leaflet.markercluster.js"></script>               
<script>
    var villes = {
        "Marché Dantokpa du Bénin": { "lat": 6.372917797961049, "lon": 2.43489229620532 },
        "PIGIER BENIN": { "lat": 6.375971592259148, "lon": 2.4030768793528265 },
        "Hotel TPF": { "lat": 6.372293025713965, "lon": 2.4038171690119094 },
        "CanalOlympia Wologuèdè": { "lat": 6.376244520001359, "lon": 2.416224294720762 }, 
    };
    var tableauMarqueurs = [];

    // On initialise la carte
    var carte = L.map('maCarte').setView([6.372100421956309, 2.411669507239768], 13);
    
    // On charge les "tuiles"
    L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
        // Il est toujours bien de laisser le lien vers la source des données
        attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
        minZoom: 1,
        maxZoom: 20
    }).addTo(carte);

    var marqueurs = L.markerClusterGroup();

    // On personnalise le marqueur
    var icone = L.icon({
        iconUrl: "images/icone.png",
        iconSize: [50, 50],
        iconAnchor: [25, 50],
        popupAnchor: [0, -50]
    })

    // On parcourt les différentes villes
    for(ville in villes){
        // On crée le marqueur et on lui attribue une popup
        var marqueur = L.marker([villes[ville].lat, villes[ville].lon], {icon: icone}); //.addTo(carte); Inutile lors de l'utilisation des clusters
        marqueur.bindPopup("<p>"+ville+"</p>");
        marqueurs.addLayer(marqueur); // On ajoute le marqueur au groupe

        // On ajoute le marqueur au tableau
        tableauMarqueurs.push(marqueur);
    }
    // On regroupe les marqueurs dans un groupe Leaflet
    var groupe = new L.featureGroup(tableauMarqueurs);

    // On adapte le zoom au groupe
    carte.fitBounds(groupe.getBounds().pad(0.5));

    carte.addLayer(marqueurs);
</script>
                    

<!-- Fichiers Javascript -->





               
            </div>
        </div>
    </div>