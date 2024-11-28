@extends('layouts.squelette')

@section('content')
  <div class="wrapper">
   
   @include('dashbordcommissaire.sidebar.sidebar')
   @include('dashbordcommissaire.header.header')
    <!-- Contenu spécifique à votre page ici -->

    <div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
              <!-- <div class="col-sm-12 col-md-6 col-lg-12  p-4 grid-margin stretch-card">
               <div class="card tale-bg">
                <div class="card-people mt-auto">
                  <img src="assets/img/people.png" alt="people">
                  <div class="weather-info">
                    <div class="d-flex">
                      <div>
                        <h2 class="mb-3 font-weight-normal"><i class="icon-sun mr-2"></i>31<sup>C</sup></h2>
                      </div>
                      <div class="ml-2">
                        <h4 class="location font-weight-normal">Bangalore</h4>
                        <h6 class="font-weight-normal">India</h6>
                      </div>
                    </div>
                  </div>
                </div>
              </div> 
            </div>-->
                  <div class="col-sm-6 col-md-6 col-lg-6 ">
                     <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
                        <div class="iq-card-body iq-box-relative table-danger">
                           <div class="iq-box-absolute icon iq-icon-box rounded-circle iq-bg-primary">
                              <i class="ri-focus-2-line"></i>
                           </div>
                           <p class="text-secondary">Agents total</p>
                           <div class="d-flex align-items-center justify-content-between">
                              <h4><b>{{$all_user}} </b></h4>
                              <div id="iq-chart-box1"></div>
                              <span class="text-primary"><b>  <i class="ri-arrow-up-fill"></i></b></span>
                           </div>
                        </div>
                     </div>
                  </div>
                  
                  
                  <div class="col-sm-6 col-md-6 col-lg-6">
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
                     
                  </div>
                     </div>
                  </div>
              
            </div>
         </div>
  </div>

        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        
        <!-- partial -->
      </div>
  @endsection
  <!-- Contenu spécifique à votre page ici -->
<!--   
  @include('dashbordadmin.footer.footer') -->

