<!-- Form Input Produit -->
<div class="form-group row {{ $errors->has('produit-name') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-name">{{ __('Produit') }}</label>
    <div class="col-md-8">
        <input type="text" name="produit-name" id="input-name" class="form-control form-control-sm{{ $errors->has('produit-name') ? ' is-invalid' : '' }}" placeholder="{{ __('X5') }}" value="{{ old('produit-name', $produit->libelle) }}"  autofocus>

        @if ($errors->has('produit-name'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('produit-name') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form select marque -->
<div class="form-group row {{ $errors->has('name') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-client">{{ __('Marque') }}</label>
    <div class="col-md-8">
        <select name="marque-name" id="input-marque" class="form-control form-control-sm{{ $errors->has('marque-name') ? ' is-invalid' : '' }}"  value="{{ old('marque-name') }}"  autofocus>
            @if($marques->count())
                <option value="">-- Selectionner la marque --</option>
                @foreach ($marques as $m)
                    <option value="{{$m->code}}" {{ $m->code == $marque->code ? 'selected' : '' }}  >{{$m->libelle}}</option>
                @endforeach
            @endif
        </select>
        @if ($errors->has('marque-name'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('marque-name') }}</strong>
        </span>
        @endif
    </div>
</div>
