<div class="iq-sidebar">
            <div class="iq-navbar-logo d-flex justify-content-between">
               <a href="index.html" class="header-logo">
               <img src="images/logo.png" class="img-fluid rounded" alt="">
               <span>Police Républicaine</span>
               </a>
               <div class="iq-menu-bt align-self-center">
                  <div class="wrapper-menu">
                     <div class="main-circle"><i class="ri-menu-line"></i></div>
                     <div class="hover-circle"><i class="ri-close-fill"></i></div>
                  </div>
               </div>
            </div>
            <div id="sidebar-scrollbar">
               <nav class="iq-sidebar-menu">
                  <ul id="iq-sidebar-toggle" class="iq-menu">
                     <li class="active">
                        <a href="#" class="iq-waves-effect" data-toggle="collapse" aria-expanded="true"><span class="ripple rippleEffect"></span><i class="las la-home iq-arrow-left"></i><span>Dashboard</span></a>
                        
                     </li> 
                     <li>
                        <a href="#userinfo" class="iq-waves-effect" data-toggle="collapse" aria-expanded="false"><span class="ripple rippleEffect"></span><i class="las la-user-tie iq-arrow-left"></i><span>Agent</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="userinfo" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle" >
                        <li><a href="{{ route('enregistreragent') }}"><i class="las la-plus-circle"></i>Enregistrer un agent</a></li>
                           <li><a href="{{ route('listagent') }}"><i class="las la-plus-circle"></i>Liste des agents</a></li>
                        </ul>
                     </li>
                    
                     <li>
                        <a href="#forms" class="iq-waves-effect collapsed" data-toggle="collapse" aria-expanded="false"><i class="lab la-wpforms iq-arrow-left"></i><span>Moto</span><i class="ri-arrow-right-s-line iq-arrow-right"></i></a>
                        <ul id="forms" class="iq-submenu collapse" data-parent="#iq-sidebar-toggle">
                           <li><a href="{{ route('infomoto') }}"><i class="las la-book"></i>Information moto</a></li>
                           <li><a href="#"><i class="las la-book"></i>Localiser une moto</a></li>
                           <li><a href="#"><i class="las la-book"></i>Plaintes enregistrer</a></li>
                        </ul>
                     </li>
                     
                    
                  </ul>
               </nav>
               <div class="p-3"></div>
            </div>
         </div>