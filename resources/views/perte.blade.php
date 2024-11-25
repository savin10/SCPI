@extends('layouts.squelette')

@section('content')
<div class="wrapper">
    <!-- Success message for tracking code -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Succès!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <!-- Form for loss report -->
    <div id="content-page" class="content-page">
        <div class="row">
            <div class="col-sm-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between align-items-center">
                        <div class="iq-header-title">
                            <h4>Déclaration de perte</h4>
                        </div>
                    </div>
                    <div class="iq-card-body">
                        <form method="POST" action="{{ route('loss-report.store') }}" class="animated fadeIn">
                            @csrf
                            <div class="form-row">
                                <!-- Numéro de Plaque -->
                                <div class="col-md-6 mb-3">
                                    <label for="numplaque">Numéro de Plaque</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-car"></i></span>
                                        </div>
                                        <input type="text" class="form-control @error('numplaque') is-invalid @enderror" name="numplaque" id="numplaque" value="{{ old('numplaque') }}" required>
                                    </div>
                                    @error('numplaque')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Téléphone -->
                                <div class="col-md-6 mb-3">
                                    <label for="telephone">Téléphone</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control @error('telephone') is-invalid @enderror" name="telephone" value="{{ old('telephone') }}" id="telephone" required>
                                    </div>
                                    @error('telephone')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Nom du déclareur -->
                                <div class="col-md-12 mb-3">
                                    <label for="nom_victime">Nom du déclareur</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control @error('nom_victime') is-invalid @enderror" name="nom_victime" value="{{ old('nom_victime') }}" id="nom_victime" required>
                                    </div>
                                    @error('nom_victime')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Email -->
                                <div class="col-md-12 mb-3">
                                    <label for="email">Email</label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                                        </div>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" id="email" required>
                                    </div>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Description -->
                                <div class="col-md-12 mb-3">
                                    <label for="description">Description</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="4">{{ old('description') }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">
                                    <i class="fas fa-paper-plane"></i> Valider
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Include font-awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
@endsection

<!-- Additional CSS for animation and design -->
@push('styles')
<style>
    .animated {
        animation-duration: 0.8s;
        animation-timing-function: ease-in-out;
    }

    .fadeIn {
        animation-name: fadeIn;
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
        }
        100% {
            opacity: 1;
        }
    }

    .alert {
        font-size: 1.1em;
        margin-bottom: 20px;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }

    .input-group-text {
        background-color: #007bff;
        color: white;
    }

    .invalid-feedback {
        font-size: 0.9em;
        color: red;
    }

    .form-control:focus {
        border-color: #007bff;
        box-shadow: 0 0 0 0.2rem rgba(0,123,255,0.25);
    }
</style>
@endpush
