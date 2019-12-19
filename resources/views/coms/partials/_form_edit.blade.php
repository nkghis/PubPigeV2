<!-- Form Input code -->
<div class="form-group row {{ $errors->has('commune-id') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-code">{{ __('Identifiant') }}</label>
    <div class="col-md-8">
        <input type="number" min="1" name="commune-id" id="input-code" class="form-control form-control-sm{{ $errors->has('commune-id') ? ' is-invalid' : '' }}" placeholder="{{ __('1') }}" value="{{ old('commune-id', $coms->id) }}" disabled  autofocus>

        @if ($errors->has('commune-id'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('commune-id') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form Input Commune -->
<div class="form-group row {{ $errors->has('commune-name') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-name">{{ __('Commune') }}</label>
    <div class="col-md-8">
        <input type="text"  name="commune-name" id="input-name" class="form-control form-control-sm{{ $errors->has('commune-name') ? ' is-invalid' : '' }}" placeholder="{{ __('KOUMASSI') }}" value="{{ old('commune-name', $coms->name) }}"  autofocus>

        @if ($errors->has('commune-name'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('commune-name') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form Input Latitude -->
<div class="form-group row {{ $errors->has('commune-lat') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-lat">{{ __('Latitude') }}</label>
    <div class="col-md-8">
        <input type="number" step="00.01" name="commune-lat" id="input-lat" class="form-control form-control-sm{{ $errors->has('commune-lat') ? ' is-invalid' : '' }}" placeholder="{{ __('4.145236') }}" value="{{ old('commune-lat', $coms->lat) }}"  autofocus>

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
        <input type="number" step="00.01" name="commune-lng" id="input-lng" class="form-control form-control-sm{{ $errors->has('commune-lng') ? ' is-invalid' : '' }}" placeholder="{{ __('-5.987456') }}" value="{{ old('commune-lng', $coms->lng) }}"  autofocus>

        @if ($errors->has('commune-lng'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('commune-lng') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form Input zoom -->
<div class="form-group row {{ $errors->has('commune-zoom') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-zoom">{{ __('Zoom') }}</label>
    <div class="col-md-8">
        <input type="number" step="00.01" name="commune-zoom" id="input-zoom" class="form-control form-control-sm{{ $errors->has('commune-zoom') ? ' is-invalid' : '' }}" placeholder="{{ __('13.92') }}" value="{{ old('commune-zoom', $coms->zoom) }}"  autofocus>

        @if ($errors->has('commune-zoom'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('commune-zoom') }}</strong>
        </span>
        @endif
    </div>
</div>