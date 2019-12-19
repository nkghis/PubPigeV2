<!-- Form Input Code -->
<div class="form-group row {{ $errors->has('code') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-code">{{ __('Code') }}</label>
    <div class="col-md-8">
        <input type="text"  name="code" id="input-code" class="form-control form-control-sm{{ $errors->has('code') ? ' is-invalid' : '' }}" placeholder="{{ __('500') }}" value="{{ old('code') }}"  autofocus>

        @if ($errors->has('code'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('code') }}</strong>
        </span>
        @endif
    </div>
</div>



<!-- Form Input Raison Social -->
<div class="form-group row {{ $errors->has('raison-soc') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-name">{{ __('Nom Complet') }}</label>
    <div class="col-md-8">
        <input type="text" name="raison-soc" id="input-name" class="form-control form-control-sm{{ $errors->has('raison-soc') ? ' is-invalid' : '' }}" placeholder="{{ __('ICONE COMMUNICATION') }}" value="{{ old('raison-soc') }}"  autofocus>

        @if ($errors->has('raison-soc'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('raison-soc') }}</strong>
        </span>
        @endif
    </div>
</div>