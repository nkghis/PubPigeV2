{{--for use change your "modelName" ain plural to "visuels"--}}

@extends('layouts.app', ['title' => __('User Management')])

@section('title', 'Gestion des visuels')

@section('css')
    {{-- <link href="{{ asset('vendor') }}/DataTables/datatables.css" rel="stylesheet">--}}
    {{--  <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">--}}
    <link href="{{ asset('vendor') }}/DataTables/1.10.16-jquerydataTables.min.css" rel="stylesheet">
    <style>
        .md-avatar {
            vertical-align: middle;
            width: 50px;
            height: 50px;
        }
    </style>
@endsection


@section('content')
    @include('layouts.headers.cards')


    @role('User')
    {{-- @hasrole('User', 'Admin')--}}
    {{--<div class="modal" tabindex="-1" role="dialog" id="mymodal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="" alt="Image placeholder" class="img-thumbnail" width="400"  >
                </div>

            </div>
        </div>
    </div>--}}
    <div class="container-fluid mt--7">


        <div class="card">

            @include('flash-message')

            <div class="card-header">

                <div class="row">
                    <div class="col-md-4">
                        <h3 class="modal-title">
                            <button type="button" class="btn btn-primary">
                                <strong>{{ str_plural('visuels', $result->count()) }}</strong> <span class="badge badge-danger">{{ $result->count() }}</span>
                            </button>
                            {{--<span class="badge badge-secondary">{{ $result->total() }}
                            </span> {{ str_plural('Utilisateur', $result->count()) }}--}}
                        </h3>
                    </div>
                    <div class="col-md-4">

                    </div>
                    <div class="col-md-4 page-action text-right">
                        @can('add_visuels')
                            <a href="{{ route('visuels.create') }}" class="btn btn-primary btn-sm"> <i class="material-icons">open_in_new</i> <b>Nouveau</b></a>
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
                            <th>Emplacement</th>
                            <th>Part de voix</th>
                            {{-- <th>Latitude</th>
                             <th>Longitude</th>--}}
                            <th>Image</th>
                            <th>Client</th>
                            <th>Campagne</th>
                            <th>Commune</th>
                            <th>Régie</th>
                            {{--@can('edit_visuels', 'delete_visuels')--}}
                            <th class="text-center">Actions</th>
                            {{--@endcan--}}
                        </tr>
                        </thead>
                        {{--  <tbody>
                          @foreach($result as $item)
                              <tr>
                                  <td>{{ $item->id }}</td>
                                  <td style="word-wrap: break-word;max-width: 460px;white-space:normal;">{{ $item->emplacement }}</td>
                                  <td>{{ $item->partdevoix }}</td>
                                 --}}{{-- <td>{{ $item->latitude }}</td>
                                  <td>{{ $item->longitude }}</td>--}}{{--
                                  <td>
                                      --}}{{--<span class="avatar avatar-sm rounded-0">--}}{{--
                                         --}}{{-- <img id="monimage" src="{{URL::to('/')}}/storage/mesimages/{{$item->image}}" class="md-avatar" >--}}{{--
                                      --}}{{--</span>--}}{{--
                                      <button type="button" id="mymodal" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal" data-src="{{URL::to('/')}}/storage/mesimages/{{$item->image}}">Voir</button>

                                  </td>
                                  <td>{{ $item->client }}</td>
                                  <td>{{ $item->campagne }}</td>
                                  <td>{{ $item->commune }}</td>
                                  <td>{{ $item->regie }}</td>


                                  @can('edit_visuels', 'delete_visuels')
                                      <td class="text-center">
                                          @include('visuels.shared._action', [
                                              'entity' => 'visuels',
                                              'id' => $item->id
                                          ])
                                      </td>
                                  @endcan
                              </tr>
                          @endforeach
                          </tbody>--}}
                    </table>


                </div>
            </div>

        </div>

    @else
        @include('error-permission')
        @endrole
        {{--@endhasrole--}}
        @include('layouts.footers.auth')

        <!-- Modal -->
        {{--<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div style="width:100px" class="modal-dialog" role="document">
                <div class="modal-content">
                    <img style="width:100%" src="https://cdn.pixabay.com/photo/2018/08/06/16/30/mushroom-3587888__340.jpg">
                </div>
            </div>
        </div>--}}
        <!-- Modal pour affichage image -->
          {{--  <div class="modal" tabindex="-1" role="dialog" id="myModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <img --}}{{--src=""--}}{{-- alt="Image placeholder" class="img-thumbnail" width="400"  >
                        </div>

                    </div>
                </div>
            </div>--}}


    </div>
@endsection

@section('script')
    {{--<script src="{{ asset('vendor') }}/DataTables/datatables.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>--}}
    <script src="{{ asset('vendor') }}/DataTables/1.10.16-jquerydataTables.min.js"></script>
    <script>
        $('#data-table').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": {
                "url":"<?= route('visuel.list') ?>",
                "dataType":"json",
                "type":"POST",
                "data":{"_token":"<?= csrf_token() ?>"}
            },

            "order": [[ 0, 'desc' ]],

            "pageLength": 5,

            "language": {
                "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/French.json"
            },
            "columns":[
                {"data":"id"},
                {"data":"emplacement"},
                {"data":"partdevoix"},
                {"data":"image"},
                {"data":"client"},
                {"data":"campagne"},
                {"data":"commune"},
                {"data":"regie"},
                {"data":"action"},

            ]
        } );

        /*$('#monimage').on('click', function(e) {
            /!*$img = $(this).attr("src");
             $('#myModal img').attr('src', $img);*!/
            $('#myModal').modal('show');
        });*/
        //Javascript pour affichage image

    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#pop').on('click', function(e) {
                //img = $(this).attr("data-src");
                //var img = document.getElementById("mymodal").src;
                //console.log(img);
                //$('#myModal img').attr('src', $img);
                $('#mymodal').modal('show');
            });
        });
    </script>

@endsection