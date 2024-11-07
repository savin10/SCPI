@extends('layouts.squelette')

@section('content')
  <div class="wrapper">
   
    @include('dashbordcommissaire.sidebar.sidebar')
    @include('dashbordcommissaire.header.header')
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
                              <h4 class="card-title"> Enregistrer un agent</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                          
                           <form method="POST" action="{{route('enregistagent')}}">
                                 @csrf
                              <div class="form-row">
                                 
                                 <div class="col-md-6 mb-3">
                                    <label for="validationDefaultUsername">Nom d'utilisateur</label>
                                    <div class="input-group">
                                       <div class="input-group-prepend">
                                          <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                       </div>
                                       <input type="text" class="form-control" name='username' id="validationDefaultUsername"  aria-describedby="inputGroupPrepend2" required>
                                    </div>
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <label for="validationDefault03">Numéro de téléphone</label>
                                    <input id="phone" type="number" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="email">
                                 </div>
                                 <div class="col-md-12 mb-3">
                                    <label for="validationDefault04">Email</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                 </div>
                                 <div class="col-md-6 mb-3">
                                    <!-- <label for="validationDefault05">Role</label> -->
                                    <input id="role" type="hidden" value="2" class="form-control @error('role') is-invalid @enderror" name="role" required autocomplete="new-role">
                                 </div>
                                 <!-- <div class="col-md-12 mb-3">
                                    <label for="validationDefault05">Mot de passe</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                 </div> -->
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
         @endsection
  <!-- Contenu spécifique à votre page ici -->
<!--   
  @include('dashbordadmin.footer.footer') -->

