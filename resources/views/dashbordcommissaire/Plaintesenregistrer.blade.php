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
                  <h4 class="card-title">Plaintes enregistrer</h4>
                  <p class="card-description">
                    
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr class="table-primary">
                          <th>
                            #
                          </th>
                          <th>
                           Nom du déposeur
                          </th>
                          <th>
                           Adresse/Lieu
                          </th>
                          <th>
                           Tel
                          </th>
                          <th>
                           Objet
                          </th>
                          <th>
                           Description
                          </th>
                          <th>
                           Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($all_plainte as $plainte)
                        <tr class="table-danger">
                        <td>
                           {{ $plainte->id}}
                          </td>
                          <td>
                           {{ $plainte->nomdeposeur}}
                          </td>
                          <td>
                           {{ $plainte->lieu}}
                          </td>
                          <td>
                           {{ $plainte->tel}}
                          </td>
                          <td>
                           {{ $plainte->objet}}
                          </td>
                          <td>
                           {{ $plainte->description}}
                          </td>
                          <td>
                           Traité
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

         