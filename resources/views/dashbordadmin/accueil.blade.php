@extends('layouts.squelette')

@section('content')
  <div class="wrapper">
  
    @include('dashbordadmin.sidebar.sidebar')
    @include('dashbordadmin.header.header')

    <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-sm-6 col-md-6 col-lg-4">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                           <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
                              <i class="ri-focus-2-line"></i>
                           </div>
                           <p class="text-secondary">Commissaires total</p>
                           <div class="d-flex align-items-center justify-content-between">
                              <h4><b> {{$usersCount}}</b></h4>
                              <div id="iq-chart-box1"></div>
                              <span class="text-primary"><b>  <i class="ri-arrow-up-fill"></i></b></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-sm-6 col-md-6 col-lg-4">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                           <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-danger">
                              <i class="ri-pantone-line"></i>
                           </div>
                           <p class="text-secondary">Agents total</p>
                           <div class="d-flex align-items-center justify-content-between">
                              <h4><b>{{$agentCount}}</b></h4>
                              <div id="iq-chart-box2"></div>
                              <span class="text-danger"><b>  <i class="ri-arrow-down-fill"></i></b></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  <div class="col-sm-6 col-md-6 col-lg-4">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative">
                           <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-warning">
                              <i class="ri-pie-chart-2-line"></i>
                           </div>
                           <p class="text-secondary">Nombre de plainte enregistrer</p>
                           <div class="d-flex align-items-center justify-content-between">
                              <h4><b>{{$plainteCount}}</b></h4>
                              <div id="iq-chart-box4"></div>
                              <span class="text-warning"><b>  <i class="ri-arrow-up-fill"></i></b></span>
                           </div>
                        </div>
                     </div>
                  </div>
                
                        </div>
                      
                     </div>
                  </div>
                
            </div>
         </div>
  <!-- Contenu spécifique à votre page ici -->
<!--   
  @include('dashbordadmin.footer.footer') -->

