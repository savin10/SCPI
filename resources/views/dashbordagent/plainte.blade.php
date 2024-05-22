
@extends('layouts.squelette')

@section('content')
  <div class="wrapper">
   
    @include('dashbordagent.sidebar.sidebar')
    @include('dashbordagent.header.header')
    <!-- Contenu spécifique à votre page ici -->
    <div id="content-page" class="content-page">
           
               <div class="row">
               <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{session('success')}}
                    </div>
                @endif
                  <div class="col-sm-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title"> Enregistrer une plainte</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                          
                           <form method="POST" action="{{ route('enregistrerplainte') }}">
                                 @csrf
                              <div class="form-row">
                                 
                                 <div class="col-md-6 mb-3">
                                    <label for="validationDefaultUsername">Nom du déposeur</label>
                                    <div class="input-group">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                       </div>
                                       <input type="text" class="form-control" name='nomdeposeur' id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                                    </div>
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Téléphone</label>
                                    <input id="validationDefaultUsername" type="integer" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel">
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="validationDefault04">Adresse/Lieu</label>
                                    <input  type="text" class="form-control @error('lieu') is-invalid @enderror" name="lieu" value="{{ old('lieu') }}" required autocomplete="=lieu">
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="validationDefault05">Objet</label>
                                    <input id="validationDefaultPlaque" type="text" value="{{ old('objet') }}" class="form-control @error('objet') is-invalid @enderror" name="objet" required autocomplete="objet">
                                 </div>
                                 <div class="col-md-12 mb-3">
                                    <label for="validationDefault05">Description</label>
                                    <textarea id="validationDefaultDescription"  class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description"></textarea>
                                 </div>
                              </div>
                             
                              <div class="form-group">
                                 <button class="btn btn-primary" type="submit">Enregistrer</button>
                              </div>
                           </form>
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

