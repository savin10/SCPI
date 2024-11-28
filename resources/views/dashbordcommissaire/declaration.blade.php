@extends('layouts.squelette')

@section('content')
  <div class="wrapper">
    @include('dashbordcommissaire.sidebar.sidebar')
    @include('dashbordcommissaire.header.header')
    <!-- Contenu spécifique à votre page ici -->
    <div id="content-page" class="content-page">
            <div class="container-fluid">
            @if (session('success-suppression'))
                    <div class="alert">
                        {{session('success-suppression')}}
                    </div>
                @endif
  <div class="col-lg-12 stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Déclarations de perte enregistrées</h4>
                  <p class="card-description">
                    
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="table">
                          
                          <th>
                          Nom du déclareur
                          </th>
                          <th>
                           Téléphone
                          </th>
                          
                          
                          <th>
                           Description
                          </th>
                          <th>
                            Date d'enregistrement
                          </th>
                          <th>
                           Status
                          </th>
                          
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($all_declaration as $declaration)
                        <tr class="table-primary">
                        
                          <td>
                           {{ $declaration->nom_victime}}
                          </td>
                          <td>
                           {{ $declaration->telephone}}
                          </td>
                          
                          <td>
                           {{ $declaration->description}}
                          </td>
                          <td>
                           {{ $declaration->created_at}}
                          </td>
                          <td>
                           
                          <form action="{{ route('loss-report.updateStatus', $declaration->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="d-flex align-items-center">
        <select name="status" class="form-select form-select-sm me-2">
            <option value="en_attente" {{ $declaration->status == 'en_attente' ? 'selected' : '' }}>En attente</option>
            <option value="en_cours_de_révision" {{ $declaration->status == 'en_cours_de_révision' ? 'selected' : '' }}>En cours</option>
            <option value="résolu" {{ $declaration->status == 'résolu' ? 'selected' : '' }}>Résolu</option>
        </select>
        <button type="submit" class="btn btn-sm btn-primary">Modifier</button>
    </div>
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
           
         @endsection

         