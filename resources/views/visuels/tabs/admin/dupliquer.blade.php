<div class="col-xl-6 order-xl-1 mx-auto">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-12">
                    <h3 class="mb-0">{{ __('Dupliquer une campagne') }}</h3>
                </div>
                {{--<div class="col-4 text-right">
                    <a href="{{ route('visuels.index') }}" class="btn btn-sm btn-primary">{{ __('Retour à la liste') }}</a>
                </div>--}}
            </div>
        </div>

        <div class="card-body">
            <form method="post" action="{{ route('visuel.dupliquer') }}"  autocomplete="off">
                @csrf

                {{--<h6 class="heading-small text-muted mb-4">{{ __('Informations de l\'utilisateur') }}</h6>--}}
                <div class="pl-lg-4">

                    <!-- Form select campagne a dupliquer -->
                    <div class="form-group row {{ $errors->has('campagne-name') ? ' has-danger' : '' }}">
                        <label class="col-md-4 form-control-label text-md-right" for="input-campagne">{{ __('Campagne à dupliquer') }}</label>
                        <div class="col-md-8">
                            <select name="campagne-name" id="input-campagne" class="form-control form-control-sm{{ $errors->has('campagne-name') ? ' is-invalid' : '' }}"  value="{{ old('campagne-name') }}"  autofocus>
                                @if($campagnes->count())
                                    <option value="">-- Selectionner la campagne --</option>
                                    @foreach ($campagnes as $campagne)
                                        <option value="{{$campagne->code}}" >{{$campagne->libelle}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('campagne-name'))
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('campagne-name') }}</strong>
                </span>
                            @endif
                        </div>
                    </div>


                    <!-- Form select dupliquer ver campagne -->
                    <div class="form-group row {{ $errors->has('campagne-name-dupliquer') ? ' has-danger' : '' }}">
                        <label class="col-md-4 form-control-label text-md-right" for="input-campagne">{{ __('Dupliquer vers campagne') }}</label>
                        <div class="col-md-8">
                            <select name="campagne-name-dupliquer" id="input-campagne-dupliquer" class="form-control form-control-sm{{ $errors->has('campagne-name-dupliquer') ? ' is-invalid' : '' }}"  value="{{ old('campagne-name-dupliquer') }}"  autofocus>
                                @if($campagnes->count())
                                    <option value="">-- Selectionner la campagne --</option>
                                    @foreach ($campagnes as $campagne)
                                        <option value="{{$campagne->code}}" >{{$campagne->libelle}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('campagne-name-dupliquer'))
                                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('campagne-name-dupliquer') }}</strong>
                </span>
                            @endif
                        </div>
                    </div>

                    @can('add_visuels')
                        <div class="text-right">
                            <button type="submit" class="btn btn-success mt-1">{{ __('Dupliquer') }}</button>
                        </div>
                    @endcan

                </div>
            </form>

        </div>
    </div>
</div>




