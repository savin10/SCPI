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
                              <h4 class="card-title">Lites des agents</h4>
                           </div>
                        </div>
                        <div class="iq-card-body">
                          
                           <div class="table-responsive">
                              <table class="table">
                                 <thead>
                                    <tr>
                                      
                                       <th scope="col">Nom des agents</th>
                                     
                                       <th scope="col">Email</th>
                                       <th scope="col">Téléphone</th>
                                       <th scope="col">Action</th>
                                      
                                    </tr>
                                 </thead>
                                 <tbody>
                                 @foreach($all_user as $user)
            <tr>
                
                <td>{{ $user->username}}</td>
                
                <td>{{ $user->email}}</td>
                <td>{{ $user->phone}}</td>
                <td>

                            <form action="{{route('deletecommissaire',$user->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')">
                                 <i class="fa-solid fa-trash"  title="Supprimer"></i>
                                </button>
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
      </div>
   </div>
</div>
         @endsection
  <!-- Contenu spécifique à votre page ici -->
<!--   
  @include('dashbordadmin.footer.footer') -->

