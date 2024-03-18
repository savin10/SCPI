@extends('layouts.squelette')

@section('content')
    <div class="wrapper">
        <!-- Contenu spécifique à votre page ici -->
        @include('dashbordcommissaire.sidebar.sidebar')
        @include('dashbordcommissaire.header.header')

        <div id="content-page" class="content-page">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="iq-card">
                            <div class="iq-card-header d-flex justify-content-between">
                                <div class="iq-header-title">
                                    <h4 class="card-title"> Vérifier une moto</h4>
                                </div>
                            </div>
                            <div class="iq-card-body">
                                <form action="{{ route('infomoto') }}" method="GET">
                                    <div class="form-row">
                                        <div class="col-md-12 mb-4">
                                            <label for="validationDefaultUsername">N°Plaque d'immatriculation</label>
                                            <div class="input-group">
                                                <div class="input-group-prepend">
                                                    <span class="input-group-text" id="inputGroupPrepend2">N°:</span>
                                                </div>
                                                <input type="search" name="idMoto" class="form-control" id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                                            </div>
                                        </div><br>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="submit">Vérifier</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @if(isset($moto))
                    <div>
                        <h2>Informations sur la moto</h2>
                        <p>Numéro de la plaque: {{ $moto->numplaque }}</p>
                        <p>Type: {{ $moto->type }}</p>
                        <p>Puissance: {{ $moto->puissance }}</p>
                        <p>Poids vide: {{ $moto->poidvide }}</p>
                        <p>Genre: {{ $moto->genre }}</p>
                        <p>Energie: {{ $moto->energies }}</p>
                        <p>Nom du propriétaire: {{ $moto->nomproprietaire }}</p>
                    </div>
                @endif
            </div>
        </div>
    </div>