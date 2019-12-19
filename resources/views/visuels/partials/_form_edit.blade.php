<!-- Form Input Emplacement -->
<div class="form-group row {{ $errors->has('visuel-name') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-name">{{ __('Emplacement') }}</label>
    <div class="col-md-8">
        <input type="text"  name="visuel-name" id="input-name" class="form-control form-control-sm{{ $errors->has('visuel-name') ? ' is-invalid' : '' }}" placeholder="{{ __('KOUMASSI, Boulevard 7 décembre') }}" value="{{ old('visuel-name', $visuels->emplacement) }}"  autofocus>

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
        <input type="number" min="1" name="visuel-part" id="input-part" class="form-control form-control-sm{{ $errors->has('visuel-part') ? ' is-invalid' : '' }}" placeholder="{{ __('1') }}" value="{{ old('visuel-part', $visuels->partdevoix) }}"   autofocus>

        @if ($errors->has('visuel-part'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('visuel-part') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form Input Latitude -->
<div class="form-group row {{ $errors->has('commune-lat') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-lat">{{ __('Latitude') }}</label>
    <div class="col-md-8">
        <input type="number" step="any" name="commune-lat" id="input-lat" class="form-control form-control-sm{{ $errors->has('commune-lat') ? ' is-invalid' : '' }}" placeholder="{{ __('4.145236') }}" value="{{ old('commune-lat', $visuels->latittude) }}"  autofocus>

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
        <input type="number" step="any"  name="commune-lng" id="input-lng" class="form-control form-control-sm{{ $errors->has('commune-lng') ? ' is-invalid' : '' }}" placeholder="{{ __('-5.987456') }}" value="{{ old('commune-lng', $visuels->longitude) }}"  autofocus>

        @if ($errors->has('commune-lng'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('commune-lng') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form select campagne -->
<div class="form-group row {{ $errors->has('campagne-name') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-campagne">{{ __('Campagne') }}</label>
    <div class="col-md-8">
        <select name="campagne-name" id="input-campagne" class="form-control form-control-sm{{ $errors->has('campagne-name') ? ' is-invalid' : '' }}"  value="{{ old('campagne-name') }}"  autofocus>
            @if($campagnes->count())
                <option value="">-- Selectionner la campagne --</option>
                @foreach ($campagnes as $c)
                    <option value="{{$c->code}}" {{ $c->code == $visuels->idcampagne ? 'selected' : '' }} >{{$c->libelle}}</option>
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
                @foreach ($communes as $com)
                    <option value="{{$com->id}}" {{ $com->id == $visuels->idcommune ? 'selected' : '' }} >{{$com->name}}</option>
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
                @foreach ($regies as $r)
                    <option value="{{$r->code}}" {{ $r->code == $visuels->idregie ? 'selected' : '' }}  >{{$r->Raison_Soc}}</option>
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
        <input type="file" name="image" id="input-client" class="form-control form-control-sm{{ $errors->has('image') ? ' is-invalid' : '' }}"  value="{{ old('image') }}"  autofocus>
        <small id="filehelp" class="form-text text-muted"> Veuillez sauvegarder une image valide. La taille de l'image  ne doit pas exceder 2Mo.</small>
        <img src="{{URL::to('/')}}/storage/mesimages/{{$visuels->image}}" alt="Image placeholder" class="img-thumbnail"  width="50" id="pop">

        <input type="hidden" name="images" value="{{$visuels->image}}">
        @if ($errors->has('image'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('image') }}</strong>
        </span>
        @endif
    </div>
</div>