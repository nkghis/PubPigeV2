@extends('layouts.app', ['title' => __('User Management')])

{{--Section Titre--}}
@section('title', 'Gestion des rôles')

@section('css')
    <link href="{{ asset('vendor') }}/DataTables/datatables.css" rel="stylesheet">
@endsection


{{--Section Corps de la page--}}
@section('content')

    {{--Inclusion navbar--}}
    @include('layouts.headers.cards')

    @role('Admin')

    {{--Card--}}
        <div class="container-fluid mt--7">

        {{--<div class="card mx-auto" style="max-width: 40rem;">--}}
            <div class="card mx-auto">

            {{--Inclusion Message flash--}}
            @include('flash-message')

            <div class="card-header">
                <div class="row">
                    <div class="col-md-4">
                        <h3 class="modal-title">
                            <button type="button" class="btn btn-primary">
                                <strong>{{ str_plural('Rôles', $roles->count()) }}</strong> <span class="badge badge-danger">{{ $roles->total() }}</span>
                            </button>

                        </h3>
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4 page-action text-right">
                        @can('add_roles')
                          <a href="{{ route('roles.create') }}" class="btn btn-primary btn-sm"> <i class="material-icons">open_in_new</i> <b>Nouveau</b></a>
                         @endcan
                    </div>
                </div>

            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm" id="data-table">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nom</th>
                            <th>Permissions</th>
                            <th>Date Création</th>
                            @can('edit_roles', 'delete_roles')
                            <th class="text-center">Actions</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($roles as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td style="word-wrap: break-word;max-width: 660px;white-space:normal;">{{ $item->permissions->implode('name', ', ') }}</td>
                                <td>{{ $item->created_at->toFormattedDateString() }}</td>

                                @can('edit_users', 'delete_roles')
                                <td class="text-center">
                                    @include('roles.shared._action', [
                                        'entity' => 'roles',
                                        'id' => $item->id
                                    ])
                                </td>
                                @endcan
                            </tr>
                        @endforeach
                        </tbody>
                    </table>


                </div>
            </div>
        </div>
    @else
    @include('error-permission')
    @endrole
        @include('layouts.footers.auth')
    </div>
@endsection

@section('script')
    <script src="{{ asset('vendor') }}/DataTables/datatables.js"></script>
    <script>
        $(document).ready(function() {
            $('#data-table').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
                },

                "order": [[ 0, 'desc' ]],
                pageLength: 5
            });
        } );
    </script>
@endsection