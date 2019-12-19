@extends('layouts.app', ['title' => __('Gestion des utilisateurs - Edition | ')])

@section('title', 'Gestion des produits | Edition | '.$produit->libelle)

@section('css')
    <link href="{{ asset('vendor') }}/select2/css/select2.min.css" rel="stylesheet">
@endsection

@section('content')
    @include('layouts.headers.cards')
    @role('Admin')
    <div class="container-fluid mt--7">

        <div class="col-xl-6 order-xl-1 mx-auto">
            <div class="card bg-secondary shadow">
                <div class="card-header bg-white border-0">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class="mb-0">{{ __('Edition Produit | '). $produit->libelle }}</h3>
                        </div>
                        <div class="col-4 text-right">
                            <a href="{{ route('produits.index') }}" class="btn btn-sm btn-primary">{{ __('Retour à la liste') }}</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('produits.update', $produit) }}" autocomplete="off">
                        @csrf
                        @method('put')

                        {{--<h6 class="heading-small text-muted mb-4">{{ __('User information') }}</h6>--}}
                        <div class="pl-lg-4">
                            @include('produits.partials._form_edit')
                            @can('edit_produits')
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

            $('#input-marque').select2({

            });
        });
    </script>
@endsection