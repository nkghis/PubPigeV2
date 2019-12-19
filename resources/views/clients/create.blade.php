{{--for use change your "modelName" ain plural to "clients"--}}
@extends('layouts.app', ['title' => __('Gestion des utilisateurs')])
@section('title', 'Gestion des clients | Création')
@section('content')

    @include('layouts.headers.cards')

    @role('Admin')
    <div class="container-fluid mt--7">


        <div class="col-xl-6 order-xl-1 mx-auto">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Nouveau Client') }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('clients.index') }}" class="btn btn-sm btn-primary">{{ __('Retour à la liste') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('clients.store') }}" autocomplete="off">
                        @csrf

                        {{--<h6 class="heading-small text-muted mb-4">{{ __('Informations de l\'utilisateur') }}</h6>--}}
                        <div class="pl-lg-4">
                            @include('clients.partials._form')

                            @can('add_clients')
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success mt-1">{{ __('Enregistrer') }}</button>
                                </div>
                            @endcan
                        </div>
                    </form>
                </div>
            </div>
        </div>

        @else
            @include('error-permission')
            @endrole

            @include('layouts.footers.auth')
    </div>
@endsection