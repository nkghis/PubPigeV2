{{--for use change your "modelName" ain plural to "visuels"--}}

@extends('layouts.app', ['title' => __('User Management')])

@section('title', 'Gestion des visuels')

@section('css')
    {{-- <link href="{{ asset('vendor') }}/DataTables/datatables.css" rel="stylesheet">--}}
    {{--  <link href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">--}}
    <link href="{{ asset('vendor') }}/DataTables/1.10.16-jquerydataTables.min.css" rel="stylesheet">
    <link href="{{ asset('vendor') }}/select2/css/select2.min.css" rel="stylesheet">

    <style>
        .md-avatar {
            vertical-align: middle;
            width: 50px;
            height: 50px;
        }

        .nav-tabs {
            border-bottom:none;
        }



        .nav-tabs .nav-link.active {
            background-color: #3be283;
            border-bottom:#e2e2e2;
            font-weight: bold;
        }

        .tab-pane.active .tab-pane-header {
            padding:2rem;
            background-color:#e2e2e2;
            border-top-right-radius: .5rem;
            border-top-left-radius: .5rem;
            margin-bottom:1rem;
        }

        .tab-pane:first-child .tab-pane-header {
            border-top-left-radius: 0;
        }
    </style>
@endsection


@section('content')
    @include('layouts.headers.cards')



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
                {{--for Admin--}}
                @role('Admin')
                    <div class="row">
                    <div class="col-md-12">
                        <nav>
                            <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                                {{--Head Panel Visuel List--}}
                                <a class="nav-item nav-link active" id="nav-visuel-tab" data-toggle="tab" href="#nav-visuel" role="tab" aria-controls="nav-visuel" aria-selected="true">Visuels</a>

                                {{--Head Panel Multi visuel--}}
                                <a class="nav-item nav-link" id="nav-multi-tab" data-toggle="tab" href="#nav-multi" role="tab" aria-controls="nav-multi" aria-selected="false">Multi-Visuel</a>

                                {{--Head Panel Duplication Campagne--}}
                                <a class="nav-item nav-link" id="nav-dupliquer-tab" data-toggle="tab" href="#nav-dupliquer" role="tab" aria-controls="nav-dupliquer" aria-selected="false">Duplication campagne</a>

                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                            {{--Panel Visuel List--}}
                            <div class="tab-pane fade show active" id="nav-visuel" role="tabpanel" aria-labelledby="nav-visuel-tab">
                                @include('visuels.tabs.admin.visuel')
                            </div>

                            {{--Panel Multi visuel--}}
                            <div class="tab-pane fade" id="nav-multi" role="tabpanel" aria-labelledby="nav-multi-tab">
                                @include('visuels.tabs.admin.multi')

                            </div>

                            {{--Panel Duplication Campagne--}}
                            <div class="tab-pane fade" id="nav-dupliquer" role="tabpanel" aria-labelledby="nav-dupliquer-tab">
                                @include('visuels.tabs.admin.dupliquer')

                            </div>

                        </div>
                    </div>
                    </div>
                {{--for Admin--}}
                @else
                {{--for User--}}


                    @include('visuels.tabs.user.visuel')

                {{--for User--}}

                @endrole
                @include('layouts.footers.auth')
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{--<script src="{{ asset('vendor') }}/DataTables/datatables.js"></script>--}}
    {{--<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>--}}
    <script src="{{ asset('vendor') }}/DataTables/1.10.16-jquerydataTables.min.js"></script>
    <script src="{{ asset('vendor') }}/select2/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            $("#input-campagne").select2({

            });

            $("#input-campagned").select2({

            });

            $("#input-campagne-dupliquer").select2({

            });

            $("#input-regie").select2({

            });

            $("#input-commune").select2({

            });
        });
    </script>
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