<!-- Form Input Regie -->
<div class="form-group row {{ $errors->has('regie-name') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-name">{{ __('Régie') }}</label>
    <div class="col-md-8">
        <input type="text" name="regie-name" id="input-regie" class="form-control form-control-sm{{ $errors->has('regie-name') ? ' is-invalid' : '' }}" placeholder="{{ __('X5') }}" value="{{ old('regie-name', $regies->Raison_Soc) }}"  autofocus>

        @if ($errors->has('regie-name'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('regie-name') }}</strong>
        </span>
        @endif
    </div>
</div>