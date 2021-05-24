 <style>
     .navbar-bg {
         background-color: #1e1a55;
     }

     .navbar-text {
         color: #cfcfcf;
     }

     body::-webkit-scrollbar {
         width: 12px;
         /* width of the entire scrollbar */
     }

     body::-webkit-scrollbar-track {
         background: whitesmoke;
         /*color of the tracking area */
     }

     body::-webkit-scrollbar-thumb {
         background-color: #1e1a55;
         /* color of the scroll thumb */
         border-radius: 20px;
         /* roundness of the scroll thumb */
         border: 3px solid whitesmoke;
         /* creates padding around scroll thumb */
     }

     #sidenav-main::-webkit-scrollbar {
         width: 5px;
     }

     #sidenav-main::-webkit-scrollbar-thumb {
         background-color: whitesmoke;
         border-radius: 12px;
         border: 2px solid whitesmoke;
     }

 </style>

 <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light navbar-bg" id="sidenav-main">
     <div class="container-fluid">
         <!-- Toggler -->
         <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main"
             aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
             <span class="navbar-toggler-icon"></span>
         </button>
         <!-- Brand 
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('argon') }}/img/brand/logo.png" class="navbar-brand-img" alt="...">
        </a>-->
         <a class="navbar-brand pt-0" href="{{ route('properties') }}">
             <h1 style="color: #cfcfcf; font-weight: 800; "><i class="fas fa-city"></i> iMCLG</h1>
         </a>
         <!--<div align="center">
             <div class="media align-items-center">
                 <span class="avatar avatar-sm rounded-circle">
                     <i class="far fa-user"></i>
                 </span>
                 <span class="mb-0 ml-2 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
             </div>
         </div>
          User -->
         <ul class="nav align-items-center d-md-none">

             <li class="nav-item dropdown">
                 <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                     aria-expanded="false">
                     <div class="media align-items-center">
                         <span class="avatar avatar-sm rounded-circle">
                             <i class="fas fa-user"></i>
                         </span>
                     </div>
                 </a>
                 <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                     <div class=" dropdown-header noti-title">
                         <h6 class="text-overflow m-0">{{ __('Bem Vindo!') }}</h6>
                     </div>
                     <a href="{{ route('profile.edit') }}" class="dropdown-item">
                         <i class="ni ni-single-02"></i>
                         <span>{{ __('Meu perfil') }}</span>
                     </a>
                     <a href="#" class="dropdown-item">
                         <i class="ni ni-settings-gear-65"></i>
                         <span>{{ __('Configuracoes') }}</span>
                     </a>
                 </div>
             </li>
         </ul>
         <!-- Collapse -->
         <div class="collapse navbar-collapse" id="sidenav-collapse-main">
             <!-- Collapse header -->
             <div class="navbar-collapse-header d-md-none">
                 <div class="row">
                     <div class="col-6 collapse-brand">
                         <a href="{{ route('home') }}">
                             <h1 style="color: #1e1a55; font-weight: 800; "><i class="fas fa-city"></i> iMCLG</h1>
                         </a>
                     </div>
                     <div class="col-6 collapse-close">
                         <button type="button" class="navbar-toggler" data-toggle="collapse"
                             data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false"
                             aria-label="Toggle sidenav">
                             <span></span>
                             <span></span>
                         </button>
                     </div>
                 </div>
             </div>

             <!-- Navigation -->
             <ul class="navbar-nav">
                 <!-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Dashboard') }}
                    </a>
                </li>-->
                 <li class="nav-item">
                     <a class="nav-link active" href="{{ route('properties') }}" role="button" aria-expanded="true"
                         aria-controls="ativos-imobiliarios">
                         <!--data-toggle="collapse"-->
                         <i class="fas fa-city" style="color: #cfcfcf;"></i>
                         <span class="nav-link-text" style="color: #cfcfcf;">{{ __('Ativos Imobiliários') }}</span>
                     </a>
                 <li class="nav-item">
                     <a class="nav-link active" href="{{ route('partners') }}" role="button" aria-expanded="true"
                         aria-controls="ativos-socios-participacoes">
                         <!--data-toggle="collapse"-->
                         <i class="fas fa-user-tie" style="color: #cfcfcf;"></i>
                         <span class="nav-link-text"
                             style="color: #cfcfcf;">{{ __('Sócios e Participações') }}</span>
                     </a>
                 </li>
                 <!--
                    <li class="nav-item">
                     <a class="nav-link active" href="{{ route('expense') }}" role="button" aria-expanded="true"
                         aria-controls="despesas-ativos-imobiliarios">
                         <i class="fas fa-hand-holding-usd" style="color: #cfcfcf;"></i>
                         <span class="nav-link-text"
                             style="color: #cfcfcf;">{{ __('Despesas dos Ativos Imobiliários') }}</span>
                     </a>
                 </li> --> 

                 {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ route('icons') }}">
                        <i class="ni ni-planet navbar-text"></i> {{ __('Icons') }}
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{ route('map') }}">
                        <i class="ni ni-pin-3 navbar-text"></i> {{ __('Maps') }}
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('table') }}">
                      <i class="ni ni-bullet-list-67 text-default"></i>
                      <span class="nav-link-text">Tables</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">
                        <i class="ni ni-circle-08 navbar-text"></i> {{ __('Register') }}
                    </a>
                </li> --}}
                 {{-- <li class="nav-item mb-5 mr-4 ml-4 pl-1 bg-danger" style="position: absolute; bottom: 0;">
                    <a class="nav-link text-white" href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank">
                        <i class="ni ni-cloud-download-95"></i> Upgrade to PRO
                    </a>
                </li> --}}
             </ul>
             <!-- Divider -->
             <hr class="my-3" style="background-color: #cfcfcf">
             <!-- Heading -->
             <h6 class="navbar-heading text-muted">Cadastros</h6>
             <!-- Navigation -->
             <ul class="navbar-nav mb-md-3">
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('realestate') }}" style="color: #cfcfcf">
                         <i class="ni ni-collection"></i> Tipos de Ativos
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('construction') }}" style="color: #cfcfcf">
                         <i class="ni ni-building"></i> Tipos de Construcao
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('statusproperties') }}" style="color: #cfcfcf">
                         <i class="ni ni-ui-04"></i> Status de Ativos
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('expensetype') }}" style="color: #cfcfcf">
                         <i class="ni ni-money-coins"></i> Tipos de Despesas
                     </a>
                 </li>
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('classexpenses') }}" style="color: #cfcfcf">
                         <i class="fas fa-coins"></i> Classe de Despesas
                     </a>
                 </li>
                 <li class="nav-item">
                    <a class="nav-link" href="{{ route('filetypes') }}" style="color: #cfcfcf">
                        <i class="fas fa-paste"></i> Tipo de Anexos
                    </a>
                </li>
                 <!--
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('expensetype') }}" style="color: #cfcfcf">
                         <i class="ni ni-ui-04"></i> Tipos de Despesas
                     </a>
                 </li>
                -->
             </ul>
             <hr class="my-3" style="background-color: #cfcfcf">
             <!-- Heading -->
             <h6 class="navbar-heading text-muted">Usuários</h6>
             <ul class="navbar-nav mb-md-3">
                 <li class="nav-item">
                     <a class="nav-link" href="{{ route('users') }}" style="color: #cfcfcf">
                         <i class="fas fa-users" style="color: #cfcfcf;"></i> Usuários
                     </a>
                 </li>
             </ul>
         </div>
     </div>
 </nav>
