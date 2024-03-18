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
               <div class="row">
                 
                  
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Plaintes enregistrer</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                          
                           <div class="table-responsive">
                              <table class="table">
                                 <thead>
                                    <tr>
                                      
                                       <th scope="col">Nom du déposeur</th>
                                       <th scope="col">Adresse/Lieu</th>
                                       <th scope="col">Tel</th>
                                       <th scope="col">Objet</th>
                                       <th scope="col">Description</th>
                                      
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($all_plainte as $plainte)
            <tr>
                
                <td>{{ $plainte->nomdeposeur}}</td>
                <td>{{ $plainte->lieu}}</td>
                <td>{{ $plainte->tel}}</td>
                <td>{{ $plainte->objet}}</td>
                <td>{{ $plainte->description}}</td>
            </tr>
            @endforeach
                                   
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
         @endsection
  <!-- Contenu spécifique à votre page ici -->
<!--   
  @include('dashbordadmin.footer.footer') -->

