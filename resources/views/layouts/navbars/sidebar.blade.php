<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        <a class="navbar-brand pt-0" href="{{ route('home') }}">
            <img src="{{ asset('images') }}/icone-logo.png" class="navbar-brand-img" alt="...">
        </a>
        <!-- User -->
        <ul class="nav align-items-center d-md-none">
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="avatar avatar-sm rounded-circle">
                        <img alt="Image placeholder" src="{{ asset('argon') }}/img/theme/user.jpg">
                        </span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                    <div class=" dropdown-header noti-title">
                        <h6 class="text-overflow m-0">{{ __('Bienvenue !') }}</h6>
                    </div>


                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        <i class="ni ni-single-02"></i>
                        <span>{{ __('Mon profile') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-settings-gear-65"></i>
                        <span>{{ __('Paramètres') }}</span>
                    </a>
                   {{-- <a href="#" class="dropdown-item">
                        <i class="ni ni-calendar-grid-58"></i>
                        <span>{{ __('Activités') }}</span>
                    </a>
                    <a href="#" class="dropdown-item">
                        <i class="ni ni-support-16"></i>
                        <span>{{ __('Support') }}</span>
                    </a>--}}
                    <div class="dropdown-divider"></div>
                    <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                        <i class="ni ni-user-run"></i>
                        <span>{{ __('Déconnexion') }}</span>
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
                            <img src="{{ asset('images') }}/icone-logo.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
      {{--      <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="{{ __('Search') }}" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>--}}
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}">
                        <i class="ni ni-tv-2 text-primary"></i> {{ __('Tableau de bord') }}
                    </a>
                </li>

                {{--Item Collapse--}}
               {{-- <li class="nav-item">
                    <a class="nav-link active" href="#navbar-examples" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="navbar-examples">
                        <i class="fab fa-laravel" style="color: #f4645f;"></i>
                        <span class="nav-link-text" style="color: #f4645f;">{{ __('Laravel Examples') }}</span>
                    </a>

                    <div class="collapse show" id="navbar-examples">
                        <ul class="nav nav-sm flex-column">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('profile.edit') }}">
                                    {{ __('User profile') }}
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('user.index') }}">
                                    {{ __('User Management') }}
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>--}}
                @role('Admin')

                    @can('view_clients')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('clients.index') }}">
                                <i class="ni ni-circle-08 text-pink"></i> {{ __('Client') }}
                            </a>
                        </li>
                    @endcan

                    @can('view_marques')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('marques.index') }}">
                                <i class="ni ni-album-2 text-yellow"></i> {{ __('Marque') }}
                            </a>
                        </li>
                    @endcan

                    @can('view_produits')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('produits.index') }}">
                                <i class="ni ni-app text-gray-dark"></i> {{ __('Produit') }}
                            </a>
                        </li>
                    @endcan


                      {{--  @can('view_regies')
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('regies.index') }}">
                                    <i class="ni ni-shop text-purple"></i> {{ __('Régie') }}
                                </a>
                            </li>
                        @endcan--}}

                    @can('view_campagnes')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('campagnes.index') }}">
                                <i class="ni ni-trophy text-orange"></i> {{ __('Campagne') }}
                            </a>
                        </li>
                    @endcan

                @endrole

                {{--@role('User')--}}
                    @can('view_visuels')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('visuels.index') }}">
                                <i class="ni ni-badge text-info"></i> {{ __('Visuel') }}
                            </a>
                        </li>
                    @endcan

                    @can('view_cartes')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cartes.index') }}">
                                <i class="ni ni-square-pin text-success"></i> {{ __('Carte') }}
                            </a>
                        </li>
                    @endcan
               {{-- @endrole--}}
                          {{--  <li class="nav-item mb-5" style="position: absolute; bottom: 0;">
                                <a class="nav-link" href="https://www.creative-tim.com/product/argon-dashboard-pro-laravel" target="_blank">
                                    <i class="ni ni-cloud-download-95"></i> Upgrade to PRO
                                </a>
                            </li>--}}

            </ul>


          {{--  //Permet d'affichez cette partie si vous avez le role Admin--}}
            @role('Admin')
            <!-- Divider -->
            <hr class="my-3">
            <!-- Heading -->
            <h6 class="navbar-heading text-muted">ADMINISTRATION</h6>
            <!-- Navigation -->
            <ul class="navbar-nav mb-md-3">
                @can('view_users')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user.index') }}">
                        <i class="ni ni-spaceship"></i> Utilisateurs
                    </a>
                </li>
                @endcan

                @can('view_roles')
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('roles.index') }}">
                        <i class="ni ni-palette"></i> Rôles
                    </a>
                </li>
                @endcan


                    @can('view_accesses')
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('access.index') }}">
                                <i class="ni ni-hat-3"></i> Accès
                            </a>
                        </li>
                    @endcan
               {{-- <li class="nav-item">
                    <a class="nav-link" href="https://demos.creative-tim.com/argon-dashboard/docs/components/alerts.html">
                        <i class="ni ni-ui-04"></i> Components
                    </a>
                </li>--}}
            </ul>
            @endrole
        </div>
    </div>
</nav>