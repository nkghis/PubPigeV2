<!-- Form Input Emplacement -->
<div class="form-group row {{ $errors->has('visuel-name') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-name">{{ __('Emplacement') }}</label>
    <div class="col-md-8">
        <input type="text"  name="visuel-name" id="input-name" class="form-control form-control-sm{{ $errors->has('visuel-name') ? ' is-invalid' : '' }}" placeholder="{{ __('KOUMASSI, Boulevard 7 décembre') }}" value="{{ old('visuel-name') }}"  autofocus>

        @if ($errors->has('visuel-name'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('visuel-name') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form Input part de voix -->
<div class="form-group row {{ $errors->has('visuel-part') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-part">{{ __('Part de voix') }}</label>
    <div class="col-md-8">
        <input type="number" min="1" name="visuel-part" id="input-part" class="form-control form-control-sm{{ $errors->has('visuel-part') ? ' is-invalid' : '' }}" placeholder="{{ __('1') }}" value="{{ old('visuel-part') }}"   autofocus>

        @if ($errors->has('visuel-part'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('visuel-part') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form Check add lat & lng -->
<div class="form-group row {{ $errors->has('visuel-part') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-part"></label>
    <div class="form-check col-md-8">
        <input class="form-check-input" name="check-coordonnees" type="checkbox" value="1" id="defaultCheck1" onchange="showMe('check')">
        <label class="form-check-label" for="defaultCheck1">
            <strong>Ajouter longitude et latitude</strong>
        </label>
    </div>
</div>

<!-- div lat & lng -->
<div id="check"  style="display:none">
    <!-- Form Input Latitude -->
    <div class="form-group row {{ $errors->has('commune-lat') ? ' has-danger' : '' }}">
        <label class="col-md-4 form-control-label text-md-right" for="input-lat">{{ __('Latitude') }}</label>
        <div class="col-md-8">
            <input type="number" step="any" name="commune-lat" id="input-lat" class="form-control form-control-sm{{ $errors->has('commune-lat') ? ' is-invalid' : '' }}" placeholder="{{ __('4.145236') }}" value="{{ old('commune-lat') }}"  autofocus>

            @if ($errors->has('commune-lat'))
                <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('commune-lat') }}</strong>
        </span>
            @endif
        </div>
    </div>

    <!-- Form Input Longitude -->
    <div class="form-group row {{ $errors->has('commune-lng') ? ' has-danger' : '' }}">
        <label class="col-md-4 form-control-label text-md-right" for="input-lng">{{ __('Longitude') }}</label>
        <div class="col-md-8">
            <input type="number" step="any"  name="commune-lng" id="input-lng" class="form-control form-control-sm{{ $errors->has('commune-lng') ? ' is-invalid' : '' }}" placeholder="{{ __('-5.987456') }}" value="{{ old('commune-lng') }}"  autofocus>

            @if ($errors->has('commune-lng'))
                <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('commune-lng') }}</strong>
        </span>
            @endif
        </div>
    </div>
</div>









{{--
<!-- Form Input Latitude -->
<div class="form-group row {{ $errors->has('commune-lat') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-lat">{{ __('Latitude') }}</label>
    <div class="col-md-8">
        <input type="number" step="00.0000001" name="commune-lat" id="input-lat" class="form-control form-control-sm{{ $errors->has('commune-lat') ? ' is-invalid' : '' }}" placeholder="{{ __('4.145236') }}" value="{{ old('commune-lat') }}"  autofocus>

        @if ($errors->has('commune-lat'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('commune-lat') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form Input Longitude -->
<div class="form-group row {{ $errors->has('commune-lng') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-lng">{{ __('Longitude') }}</label>
    <div class="col-md-8">
        <input type="number" step="00.0000001" name="commune-lng" id="input-lng" class="form-control form-control-sm{{ $errors->has('commune-lng') ? ' is-invalid' : '' }}" placeholder="{{ __('-5.987456') }}" value="{{ old('commune-lng') }}"  autofocus>

        @if ($errors->has('commune-lng'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('commune-lng') }}</strong>
        </span>
        @endif
    </div>
</div>
--}}

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



<div class="row">
    <div class="col-md-4"></div>
    <div class="col-md-8 text-left">
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="option" id="inlineRadio1" value="red" checked>
            <label class="form-check-label" for="inlineRadio1"><strong style="color:red">defaut</strong></label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="option" id="inlineRadio2" value="yellow">
            <label class="form-check-label" for="inlineRadio2"><strong style="color:yellow">Concurrent</strong></label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="option" id="inlineRadio2" value="blue">
            <label class="form-check-label" for="inlineRadio2"><strong style="color:blue">Confrère</strong></label>
        </div>
    </div>
</div>



<!-- Form image -->
<div class="form-group row {{ $errors->has('image') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-image">{{ __('Image') }}</label>
    <div class="col-md-8">
        <input type="file" name="image" id="input-client" class="form-control form-control-sm{{ $errors->has('image') ? ' is-invalid' : '' }}"  value="{{ old('image') }}"  autofocus>
        <small id="filehelp" class="form-text text-muted"> Veuillez sauvegarder une image valide. La taille de l'image  ne doit pas exceder 2Mo.</small>

        @if ($errors->has('image'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('image') }}</strong>
        </span>
        @endif
    </div>
</div>
