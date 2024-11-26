
@extends('layouts.squelette')

@section('content')

<div class="wrapper">
    <!-- Success message for tracking code -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Form for loss report -->
    <div id="content-page" class="content-page">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">Déclaration de perte</div>
                    </div>
                    <div class="iq-card-body">
                        <form method="POST" action="{{ route('loss-report.store') }}">
                            @csrf
                            <div class="form-row">
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefaultUsername">Numéro de Plaque</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroupPrepend2">N°</span>
                                        </div>
                                        <input type="text" class="form-control" name='numplaque' id="validationDefaultUsername" aria-describedby="inputGroupPrepend2" required>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Téléphone</label>
                                    <input id="validationDefaultUsername" type="integer" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" required autocomplete="telephone">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                </div>

                                
                                <div class="col-md-6 mb-3">
                                    <label for="validationDefault05">Nom du déclareur</label>
                                    <input id="validationDefaultPlaque" type="text" value="{{ old('nom_victime') }}" class="form-control @error('nom_victime') is-invalid @enderror" name="nom_victime" required autocomplete="nom_victime">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label for="validationDefault05">Description</label>
                                    <textarea id="validationDefaultDescription" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary" type="submit">Valider</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
