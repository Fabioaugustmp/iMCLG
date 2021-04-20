<!-- Top navbar -->
<nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
        <!-- Brand -->
       <!-- <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block"
            href="{{ route('home') }}">{{ __('Dashboard') }}</a>-->
        <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
            <div class="form-group mb-0">
                <!--<div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-search"></i></span>
                    </div>
                    <input class="form-control" placeholder="Search" type="text">
                </div>-->
            </div>
        </form>

        <!-- User -->
        <ul class="navbar-nav align-items-center d-none d-md-flex">
            <!--<li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="ni ni-ungroup"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-dark bg-default  dropdown-menu-right ">
                    <div class="row shortcuts px-4">
                        <a href="#!" class="col-4 shortcut-item">
                            <span class="shortcut-media avatar rounded-circle bg-gradient-red">
                                <i class="ni ni-calendar-grid-58"></i>
                            </span>
                            <small>Calendar</small>
                        </a>
                        <a href="#!" class="col-4 shortcut-item">
                            <span class="shortcut-media avatar rounded-circle bg-gradient-orange">
                                <i class="ni ni-email-83"></i>
                            </span>
                            <small>Email</small>
                        </a>
                        <a href="#!" class="col-4 shortcut-item">
                            <span class="shortcut-media avatar rounded-circle bg-gradient-info">
                                <i class="ni ni-credit-card"></i>
                            </span>
                            <small>Payments</small>
                        </a>
                        <a href="#!" class="col-4 shortcut-item">
                            <span class="shortcut-media avatar rounded-circle bg-gradient-green">
                                <i class="ni ni-books"></i>
                            </span>
                            <small>Reports</small>
                        </a>
                        <a href="#!" class="col-4 shortcut-item">
                            <span class="shortcut-media avatar rounded-circle bg-gradient-purple">
                                <i class="ni ni-pin-3"></i>
                            </span>
                            <small>Maps</small>
                        </a>
                        <a href="{{ route('users') }}" class="col-4 shortcut-item">
                            <span class="shortcut-media avatar rounded-circle bg-gradient-yellow">
                                <i class="fas fa-users"></i>                                
                            </span>
                            <small>Usuários</small>
                        </a>
                    </div>
                </div>
            </li>-->
            <li class="nav-item dropdown">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                            <i class="far fa-user"></i>
                        </span>
                        <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ auth()->user()->name }}</span>
                        </div>
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
                        <span>{{ __('Configurações') }}</span>
                    </a>
                    <!--<a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Atividade') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Suporte') }}</span>
                    </a>-->
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Logout') }}</span>
                    </a>
                </div>
            </li>
        </ul>
    </div>
</nav>
