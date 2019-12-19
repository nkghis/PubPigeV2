@extends('layouts.app', ['title' => __('Gestion des utilisateurs - Edition | '. $visuels->emplacement)])

@section('title', 'Gestion des visuels | Edition | '.$visuels->name)

@section('css')
    <link href="{{ asset('vendor') }}/select2/css/select2.min.css" rel="stylesheet">
@endsection

@section('content')
    @include('layouts.headers.cards')
    @role('Admin')
    <div class="modal" tabindex="-1" role="dialog" id="mymodal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{$visuels->emplacement}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <img src="{{URL::to('/')}}/storage/mesimages/{{$visuels->image}}" alt="Image placeholder" class="img-thumbnail" width="400"  >
                </div>

            </div>
        </div>
    </div>
    <div class="container-fluid mt--7">

        <div class="col-xl-6 order-xl-1 mx-auto">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Edition visuel | '). $visuels->emplacement }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('visuels.index') }}" class="btn btn-sm btn-primary">{{ __('Retour à la liste') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('visuels.update', $visuels) }}" enctype="multipart/form-data" files="true" autocomplete="off">
                        @csrf
                        @method('put')

                        {{--<h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>--}}
                        <div class="pl-lg-4">
                            @include('visuels.partials._form_edit')
                            @can('edit_visuels')
                                <div class="text-right">
                                    <button type="submit" class="btn btn-success mt-1">{{ __('Mettre à jour') }}</button>
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

@section('script')
    <script src="{{ asset('vendor') }}/select2/js/select2.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

            $("#input-campagne").select2({

            });

            $("#input-commune").select2({

            });

            $("#input-regie").select2({

            });

            $("#pop").click(function () {
                $('#mymodal').modal('show');

            });
        });
    </script>
@endsection