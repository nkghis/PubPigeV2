@extends('layouts.app', ['title' => __('User Management')])

{{--Section Titre--}}
@section('title', 'Gestion des tokens')

{{--Section Corps de la page--}}
@section('content')

    {{--Inclusion navbar--}}
    @include('layouts.headers.cards')

    {{--Card--}}
    <div class="container-fluid mt--7">

        <div class="card">

            {{--Inclusion Message flash--}}
            @include('flash-message')

            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="modal-title">
                            {{--<button type="button" class="btn btn-primary">
                                <strong>{{ str_plural('Utilisateurs', $result->count()) }}</strong> <span class="badge badge-danger">{{ $result->total() }}</span>
                            </button>--}}

                        </h3>
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4 page-action text-right">
                        {{--@can('add_users')--}}
                        {{--  <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm"> <i class="material-icons">open_in_new</i> <b>Nouveau</b></a>--}}
                        {{-- @endcan--}}
                    </div>
                </div>

            </div>
            <div id="app" class="card-body">
                <passport-clients></passport-clients>
                <passport-authorized-clients></passport-authorized-clients>
                <passport-personal-access-tokens></passport-personal-access-tokens>
            </div>
        </div>


        @include('layouts.footers.auth')
    </div>
@endsection
