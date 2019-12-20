@extends('layouts.app', ['title' => __('User Management')])

@section('title', 'Gestion des utilisateurs')

@section('css')
    <link href="{{ asset('vendor') }}/DataTables/datatables.css" rel="stylesheet">
@endsection


@section('content')
    @include('layouts.headers.cards')


    @role('Admin')
    <div class="container-fluid mt--7">


        <div class="card">

        @include('flash-message')

            <div class="card-header">

                <div class="row">
                    <div class="col-md-4">
                        <h3 class="modal-title">
                            <button type="button" class="btn btn-primary">
                                <strong>{{ str_plural('Utilisateurs', $result->count()) }}</strong> <span class="badge badge-danger">{{ $result->count() }}</span>
                            </button>
                            {{--<span class="badge badge-secondary">{{ $result->total() }}
                            </span> {{ str_plural('Utilisateur', $result->count()) }}--}}
                        </h3>
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4 page-action text-right">
                        @can('add_users')
                            <a href="{{ route('user.create') }}" class="btn btn-primary btn-sm"> <i class="material-icons">open_in_new</i> <b>Nouveau</b></a>
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
                            <th>Email</th>
                            <th>Role</th>
                            <th>Date Création</th>
                            @can('edit_users', 'delete_users')
                                <th class="text-center">Actions</th>
                            @endcan
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($result as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->roles->implode('name', ', ') }}</td>
                                <td>{{ $item->created_at->toFormattedDateString() }}</td>

                                @can('edit_users', 'delete_users')
                                    <td class="text-center">
                                        @include('users.shared._action', [
                                            'entity' => 'user',
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

                "order": [[ 0, 'desc' ]]


            });
        } );
    </script>
@endsection