<div class="iq-top-navbar">
            <div class="iq-navbar-custom">
               <nav class="navbar navbar-expand-lg navbar-light p-0">
                  <div class="iq-menu-bt d-flex align-items-center">
                     <div class="wrapper-menu">
                        <div class="main-circle"><i class="ri-menu-line"></i></div>
                        <div class="hover-circle"><i class="ri-close-fill"></i></div>
                     </div>
                     <div class="iq-navbar-logo d-flex justify-content-between ml-3">
                        <a href="index.html" class="header-logo">
                        <img src="images/logo.png" class="img-fluid rounded" alt="">
                        <span>Police</span>
                        </a>
                     </div>
                  </div>
                 
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                     
                  </div>
                  <ul class="navbar-list">
                     <li class="line-height">
                        <a href="#" class="search-toggle iq-waves-effect d-flex align-items-center">
                           <img src="images/user/1.jpg" class="img-fluid rounded mr-3" alt="user">
                           <div class="caption">
                              <h6 class="mb-0 line-height">{{ Auth::user()->username }}</h6>
                              <p class="mb-0">{{ Auth::user()->phone }}</p>
                           </div>
                        </a>
                        <div class="iq-sub-dropdown iq-user-dropdown">
                           <div class="iq-card shadow-none m-0">
                              <div class="iq-card-body p-0 ">
                                 <div class="bg-primary p-3">
                                    <h5 class="mb-0 text-white line-height">{{ Auth::user()->username }}</h5>
                                    <span class="text-white font-size-12">{{ Auth::user()->email }}</span>
                                 </div>
                                 <!--<a href="profile.html" class="iq-sub-card iq-bg-primary-hover">
                                    <div class="media align-items-center">
                                       <div class="rounded iq-card-icon iq-bg-primary">
                                          <i class="ri-file-user-line"></i>
                                       </div>
                                       <div class="media-body ml-3">
                                          <h6 class="mb-0 ">Mon profil</h6>
                                          <p class="mb-0 font-size-12">Voir details profil.</p>
                                       </div>
                                    </div>
                                 </a>-->
                                 
                                 <div class="d-inline-block w-100 text-center p-3">
                                    <a class="bg-primary iq-sign-btn" href="{{ route('logout') }}"
                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();" role="button">Déconnexion<i class="ri-login-box-line ml-2"></i></a>
                                       <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                       </form>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>