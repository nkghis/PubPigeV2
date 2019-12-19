<!-- Form Input Marque -->
<div class="form-group row {{ $errors->has('marque-name') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-name">{{ __('Marque') }}</label>
    <div class="col-md-8">
        <input type="text" name="marque-name" id="input-name" class="form-control form-control-sm{{ $errors->has('marque-name') ? ' is-invalid' : '' }}" placeholder="{{ __('BMW') }}" value="{{ old('marque-name') }}"  autofocus>

        @if ($errors->has('marque-name'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('marque-name') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form select client -->
<div class="form-group row {{ $errors->has('name') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-client">{{ __('Client') }}</label>
    <div class="col-md-8">
        <select name="client-name" id="input-client" class="form-control form-control-sm{{ $errors->has('client-name') ? ' is-invalid' : '' }}"  value="{{ old('client-name') }}"  autofocus>
            @if($clients->count())
                <option value="">-- Selectionner la marque --</option>
                @foreach ($clients as $client)
                    <option value="{{$client->code}}" >{{$client->Raison_Soc}}</option>
                @endforeach
            @endif
        </select>
        @if ($errors->has('client-name'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('client-name') }}</strong>
        </span>
        @endif
    </div>
</div>
