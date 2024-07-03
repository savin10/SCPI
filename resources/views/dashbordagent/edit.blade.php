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
                              <h4 class="card-title"> Modification du plainte</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                          
                        <form method="POST" action="{{ route('update', ['id' => $plainte->id]) }}">
                           @csrf
                           @method('PUT')
                              <div class="form-row">
                                 
                                 <div class="col-md-6 mb-3">
                                    <label for="validationDefaultUsername">Nom du déposeur</label>
                                    <div class="input-group">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                       </div>
                                       <input type="text" value="{!! $plainte->nomdeposeur !!}" class="form-control" name='nomdeposeur' id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                                    </div>
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Adresse/Lieu</label>
                                    <input id="validationDefaultUsername" type="text" value="{!! $plainte->lieu !!}" class="form-control  " name="lieu"  required autocomplete="lieu">
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="validationDefault04">Téléphone</label>
                                    <input  type="text" class="form-control"  value="{!! $plainte->tel !!}" name="tel"  required autocomplete="color">
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="validationDefault05">Objet</label>
                                    <input id="validationDefaultPlaque" type="text" value="{!! $plainte->objet !!}" class="form-control " name="objet" required autocomplete="objet">
                                 </div>
                                 <div class="col-md-12 mb-3">
                                    <label for="validationDefault05">Description</label>
                                    <textarea id="validationDefaultDescription"  class="form-control "  name="description" required autocomplete="description">{!! $plainte->description !!}</textarea>
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

