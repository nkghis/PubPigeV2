<!-- Form Input Raison Social -->
<div class="form-group row {{ $errors->has('raison-soc') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-name">{{ __('Nom') }}</label>
    <div class="col-md-8">
        <input type="text" name="raison-soc" id="input-name" class="form-control form-control-sm{{ $errors->has('raison-soc') ? ' is-invalid' : '' }}" placeholder="{{ __('ICONE COMMUNICATION') }}" value="{{ old('raison-soc', $clients->Raison_Soc) }}"  autofocus>

        @if ($errors->has('raison-soc'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('raison-soc') }}</strong>
        </span>
        @endif
    </div>
</div>