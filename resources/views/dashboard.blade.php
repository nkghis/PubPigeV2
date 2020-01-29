@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
    
    <div class="container-fluid mt--7">


       @role('Admin')
       <!-- Card stats -->
           <div class="row">
               <!-- Utilisateurs -->
               <div class="col-xl-3 col-lg-6">
                   <div class="card card-stats mb-4 mb-xl-0">
                       <div class="card-body">
                           <div class="row">
                               <div class="col">
                                   <h5 class="card-title text-uppercase text-muted mb-0">Utilisateurs</h5>
                                   <span class="h2 font-weight-bold mb-0">{{$data[0]}}</span>
                               </div>
                               <div class="col-auto">
                                   <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                       <i class="fas fa-users"></i>
                                   </div>
                               </div>
                           </div>
                           <p class="mt-3 mb-0 text-muted text-sm">
                               <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 3.48%</span>
                               <span class="text-nowrap">Depuis le mois dernier</span>
                           </p>
                       </div>
                   </div>
               </div>
               <!-- Clients -->
               <div class="col-xl-3 col-lg-6">
                   <div class="card card-stats mb-4 mb-xl-0">
                       <div class="card-body">
                           <div class="row">
                               <div class="col">
                                   <h5 class="card-title text-uppercase text-muted mb-0">Clients</h5>
                                   <span class="h2 font-weight-bold mb-0">{{$data[1]}}</span>
                               </div>
                               <div class="col-auto">
                                   <div class="icon icon-shape bg-success text-white rounded-circle shadow">
                                       <i class="fas fa-chart-pie"></i>
                                   </div>
                               </div>
                           </div>
                           <p class="mt-3 mb-0 text-muted text-sm">
                               <span class="text-info mr-2"><i class="fas fa-arrow-up"></i> 3.48%</span>
                               <span class="text-nowrap">Depuis le mois dernier</span>
                           </p>
                       </div>
                   </div>
               </div>
               <!-- Campagnes -->
               <div class="col-xl-3 col-lg-6">
                   <div class="card card-stats mb-4 mb-xl-0">
                       <div class="card-body">
                           <div class="row">
                               <div class="col">
                                   <h5 class="card-title text-uppercase text-muted mb-0">Campagnes</h5>
                                   <span class="h2 font-weight-bold mb-0">{{$data[2]}}</span>
                               </div>
                               <div class="col-auto">
                                   <div class="icon icon-shape bg-secondary text-white rounded-circle shadow">
                                       <i class="ni ni-trophy"></i>
                                   </div>
                               </div>
                           </div>
                           <p class="mt-3 mb-0 text-muted text-sm">
                               <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 1.10%</span>
                               <span class="text-nowrap">Depuis hier</span>
                           </p>
                       </div>
                   </div>
               </div>
               <!-- Régies -->
               <div class="col-xl-3 col-lg-6">
                   <div class="card card-stats mb-4 mb-xl-0">
                       <div class="card-body">
                           <div class="row">
                               <div class="col">
                                   <h5 class="card-title text-uppercase text-muted mb-0">Régies</h5>
                                   <span class="h2 font-weight-bold mb-0">{{$data[3]}}</span>
                               </div>
                               <div class="col-auto">
                                   <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                       <i class="fas fa-percent"></i>
                                   </div>
                               </div>
                           </div>
                           <p class="mt-3 mb-0 text-muted text-sm">
                               <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 8%</span>
                               <span class="text-nowrap">Depuis le mois dernier</span>
                           </p>
                       </div>
                   </div>
               </div>
           </div>

           <br>

           <!-- Card stats -->
           <div class="row">
               <!-- Visuels -->
               <div class="col-xl-3 col-lg-6">
                   <div class="card card-stats mb-4 mb-xl-0">
                       <div class="card-body">
                           <div class="row">
                               <div class="col">
                                   <h5 class="card-title text-uppercase text-muted mb-0">Visuels</h5>
                                   <span class="h2 font-weight-bold mb-0">{{$data[4]}}</span>
                               </div>
                               <div class="col-auto">
                                   <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                       <i class="ni ni-badge"></i>
                                   </div>
                               </div>
                           </div>
                           <p class="mt-3 mb-0 text-muted text-sm">
                               <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 12.48%</span>
                               <span class="text-nowrap">Depuis le mois dernier</span>
                           </p>
                       </div>
                   </div>
               </div>
               <!-- Marques -->
               <div class="col-xl-3 col-lg-6">
                   <div class="card card-stats mb-4 mb-xl-0">
                       <div class="card-body">
                           <div class="row">
                               <div class="col">
                                   <h5 class="card-title text-uppercase text-muted mb-0">Marques</h5>
                                   <span class="h2 font-weight-bold mb-0">{{$data[5]}}</span>
                               </div>
                               <div class="col-auto">
                                   <div class="icon icon-shape bg-light text-white rounded-circle shadow">
                                       <i class="fas fa-chart-pie"></i>
                                   </div>
                               </div>
                           </div>
                           <p class="mt-3 mb-0 text-muted text-sm">
                               <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 3.48%</span>
                               <span class="text-nowrap">Depuis la semaine dernière</span>
                           </p>
                       </div>
                   </div>
               </div>
               <!-- Produits -->
               <div class="col-xl-3 col-lg-6">
                   <div class="card card-stats mb-4 mb-xl-0">
                       <div class="card-body">
                           <div class="row">
                               <div class="col">
                                   <h5 class="card-title text-uppercase text-muted mb-0">Produits</h5>
                                   <span class="h2 font-weight-bold mb-0">{{$data[6]}}</span>
                               </div>
                               <div class="col-auto">
                                   <div class="icon icon-shape bg-dark text-white rounded-circle shadow">
                                       <i class="ni ni-app"></i>
                                   </div>
                               </div>
                           </div>
                           <p class="mt-3 mb-0 text-muted text-sm">
                               <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 1.10%</span>
                               <span class="text-nowrap">Depuis hier</span>
                           </p>
                       </div>
                   </div>
               </div>
               <!-- Communes -->
               <div class="col-xl-3 col-lg-6">
                   <div class="card card-stats mb-4 mb-xl-0">
                       <div class="card-body">
                           <div class="row">
                               <div class="col">
                                   <h5 class="card-title text-uppercase text-muted mb-0">Communes</h5>
                                   <span class="h2 font-weight-bold mb-0">{{$data[7]}}</span>
                               </div>
                               <div class="col-auto">
                                   <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                       <i class="ni ni-air-baloon text-yellow"></i>
                                   </div>
                               </div>
                           </div>
                           <p class="mt-3 mb-0 text-muted text-sm">
                               <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 12%</span>
                               <span class="text-nowrap">Depuis le mois dernier</span>
                           </p>
                       </div>
                   </div>
               </div>
           </div>
        @else

            <!-- Card stats -->
                <div class="row">
                    <!-- Visuels -->
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Visuels</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$data[0]}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                            <i class="ni ni-badge"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 12.48%</span>
                                    <span class="text-nowrap">Depuis le mois dernier</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- Campagnes -->
                    <div class="col-xl-3 col-lg-6">
                        <div class="card card-stats mb-4 mb-xl-0">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Campagnes</h5>
                                        <span class="h2 font-weight-bold mb-0">{{$data[1]}}</span>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-secondary text-white rounded-circle shadow">
                                            <i class="ni ni-trophy"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-muted text-sm">
                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 1.10%</span>
                                    <span class="text-nowrap">Depuis hier</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
       @endrole


        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush