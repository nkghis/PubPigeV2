<div class="col-xl-6 order-xl-1 mx-auto">
    <div class="card bg-secondary shadow">
        <div class="card-header bg-white border-0">
            <div class="row align-items-center">
                <div class="col-12">
                    <h3 class="mb-0">{{ __('Enregister plusieurs visuels') }}</h3>
                </div>
                {{--<div class="col-4 text-right">
                    <a href="{{ route('visuels.index') }}" class="btn btn-sm btn-primary">{{ __('Retour à la liste') }}</a>
                </div>--}}
            </div>
        </div>

        <div class="card-body">
            <form method="post" action="{{ route('visuel.multi') }}" accept-charset="utf-8" enctype="multipart/form-data" files="true" autocomplete="off">
                @csrf

                {{--<h6 class="heading-small text-muted mb-4">{{ __('Informations de l\'utilisateur') }}</h6>--}}
                <div class="pl-lg-4">


                    <!-- Form select campagne -->
                    <div class="form-group row {{ $errors->has('campagne-name') ? ' has-danger' : '' }}">
                        <label class="col-md-4 form-control-label text-md-right" for="input-campagne">{{ __('Campagne') }}</label>
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

                    <!-- Form select commune -->
                    <div class="form-group row {{ $errors->has('commune-name') ? ' has-danger' : '' }}">
                        <label class="col-md-4 form-control-label text-md-right" for="input-commune">{{ __('Commune') }}</label>
                        <div class="col-md-8">
                            <select name="commune-name" id="input-commune" class="form-control form-control-sm{{ $errors->has('commune-name') ? ' is-invalid' : '' }}"  value="{{ old('commune-name') }}"  autofocus>
                                @if($communes->count())
                                    <option value="">-- Selectionner la commune --</option>
                                    @foreach ($communes as $commune)
                                        <option value="{{$commune->id}}" >{{$commune->name}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('commune-name'))
                                <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('commune-name') }}</strong>
        </span>
                            @endif
                        </div>
                    </div>

                    <!-- Form select regie -->
                    <div class="form-group row {{ $errors->has('regie-name') ? ' has-danger' : '' }}">
                        <label class="col-md-4 form-control-label text-md-right" for="input-regie">{{ __('Régie') }}</label>
                        <div class="col-md-8">
                            <select name="regie-name" id="input-regie" class="form-control form-control-sm{{ $errors->has('regie-name') ? ' is-invalid' : '' }}"  value="{{ old('regie-name') }}"  autofocus>
                                @if($regies->count())
                                    <option value="">-- Selectionner la regie --</option>
                                    @foreach ($regies as $regie)
                                        <option value="{{$regie->code}}" >{{$regie->Raison_Soc}}</option>
                                    @endforeach
                                @endif
                            </select>
                            @if ($errors->has('regie-name'))
                                <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('regie-name') }}</strong>
        </span>
                            @endif
                        </div>
                    </div>

                    <!-- Form image -->
                    <div class="form-group row {{ $errors->has('image') ? ' has-danger' : '' }}">
                        <label class="col-md-4 form-control-label text-md-right" for="input-image">{{ __('Image') }}</label>
                        <div class="col-md-8">
                            <input type="file" name="image[]" id="input-client" class="form-control form-control-sm{{ $errors->has('image') ? ' is-invalid' : '' }}"  value="{{ old('image[]') }}" multiple required autofocus>
                            <small id="filehelp" class="form-text text-muted"> Veuillez sauvegarder une image valide. La taille de l'image  ne doit pas exceder 2Mo.</small>



                            @if ($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    {{--<strong>{{ $errors->first('image') }}</strong>--}}
                                    @foreach (old('image') as $images)
                                        <li>{{ $images.' - '. $errors->first('image')}}</li>
                                    @endforeach
                                </span>
                            @endif
                        </div>
                    </div>


                    @can('add_visuels')
                        <div class="text-right">
                            <button type="submit" class="btn btn-success mt-1">{{ __('Enregistrer') }}</button>
                        </div>
                    @endcan

                </div>
            </form>

        </div>
    </div>
</div>




