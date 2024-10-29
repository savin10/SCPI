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
                      

                        <div class="col-sm-12 col-lg-12">
                     <div class="iq-card">
                        <!--<div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Slides With Captions</h4>
                           </div>
                        </div>-->
                        <div class="iq-card-body">
                        <!-- <p>Here’s a carousel with slides only. Note the presence of the <code>.d-block</code> and <code>.img-fluid</code> on carousel images to prevent browser default image alignment.</p>-->
                           <div class="bd-example">
                              <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                                 <ol class="carousel-indicators">
                                    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                                    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                                 </ol>
                                 <div class="carousel-inner">
                                    <div class="carousel-item active">
                                       <img src="\assets\img\1.jpeg" class="d-block w-100" alt="#">
                                       <div class="carousel-caption d-none d-md-block">
                                          <h4 class="text-white">Recrutement au sein de la Police Républicaine</h4>
                                          <p>Mise en formation des 1300 élèves agents au titre de l'année 2022</p>
                                       </div>
                                    </div>
                                    <div class="carousel-item">
                                       <img src="\assets\img\pr2.jpg" class="d-block w-100" alt="#">
                                       <div class="carousel-caption d-none d-md-block">
                                          <h4 class="text-white">Second slide label</h4>
                                          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                       </div>
                                    </div>
                                    <div class="carousel-item">
                                       <img src="\assets\img\pr3.jpg" class="d-block w-100" alt="#">
                                       <div class="carousel-caption d-none d-md-block">
                                          <h4 class="text-white">Third slide label</h4>
                                          <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
                                       </div>
                                    </div>
                                 </div>
                                 <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                                 <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                 <span class="sr-only">Previous</span>
                                 </a>
                                 <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                                 <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                 <span class="sr-only">Next</span>
                                 </a>
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

