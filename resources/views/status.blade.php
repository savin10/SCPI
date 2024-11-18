@extends('layouts.squelette')

@section('content')
    <h2>Statut de votre Déclaration</h2>
    <p><strong>Numéro de Plaque :</strong> {{ $lossReport->numplaque }}</p>
    <p><strong>Description :</strong> {{ $lossReport->description }}</p>
    <p><strong>Statut :</strong> {{ $lossReport->status }}</p>
@endsection
