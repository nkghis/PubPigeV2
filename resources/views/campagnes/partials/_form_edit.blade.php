<!-- Form Input Campagne -->
<div class="form-group row {{ $errors->has('campagne-name') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-code">{{ __('Campagne') }}</label>
    <div class="col-md-8">
        <input type="text" name="campagne-name" id="input-campagne" class="form-control form-control-sm{{ $errors->has('campagne-name') ? ' is-invalid' : '' }}" placeholder="{{ __('Black Friday') }}" value="{{ old('campagne-name', $campagnes->libelle) }}"  autofocus>

        @if ($errors->has('campagne-name'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('campagne-name') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form Input Date DPCampagne -->
<div class="form-group row {{ $errors->has('dp-campagne') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-code">{{ __('DP') }}</label>
    <div class="col-md-8">
        <input type="date" name="dp-campagne" id="input-dp" class="form-control form-control-sm{{ $errors->has('dp-campagne') ? ' is-invalid' : '' }}" placeholder="{{ __('01/01/2000') }}" value="{{ old('dp-campagne', $campagnes->DP_Campagne) }}"  autofocus>

        @if ($errors->has('dp-campagne'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('dp-campagne') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form Input Date FPCampagne -->
<div class="form-group row {{ $errors->has('fp-campagne') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-code">{{ __('FP') }}</label>
    <div class="col-md-8">
        <input type="date" name="fp-campagne" id="input-fp" class="form-control form-control-sm{{ $errors->has('fp-campagne') ? ' is-invalid' : '' }}" placeholder="{{ __('01/12/2010') }}" value="{{ old('fp-campagne', $campagnes->FP_Campagne) }}"  autofocus>

        @if ($errors->has('fp-campagne'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('fp-campagne') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form Input Code Pays -->
<div class="form-group row {{ $errors->has('code-pays') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-code">{{ __('Code pays') }}</label>
    <div class="col-md-8">
        <input type="text" name="code-pays" id="input-pays" class="form-control form-control-sm{{ $errors->has('code-pays') ? ' is-invalid' : '' }}" placeholder="{{ __('CIV') }}" value="{{ old('code-pays', $campagnes->Code_Pays) }}"  autofocus>

        @if ($errors->has('code-pays'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('code-pays') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form Input Etat Campagne -->
<div class="form-group row {{ $errors->has('etat-campagne') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-code">{{ __('Etat') }}</label>
    <div class="col-md-8">
        <input type="number" min="1" name="etat-campagne" id="input-etat" class="form-control form-control-sm{{ $errors->has('etat-campagne') ? ' is-invalid' : '' }}" placeholder="{{ __('1') }}" value="{{ old('etat-campagne', $campagnes->Etat_Campagne) }}"  autofocus>

        @if ($errors->has('etat-campagne'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('etat-campagne') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form Input Duree Campagne -->
<div class="form-group row {{ $errors->has('duree-campagne') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-code">{{ __('Durée') }}</label>
    <div class="col-md-8">
        <input type="number" min="1" name="duree-campagne" id="input-duree" class="form-control form-control-sm{{ $errors->has('duree-campagne') ? ' is-invalid' : '' }}" placeholder="{{ __('30') }}" value="{{ old('duree-campagne', $campagnes->Duree_Camp) }}"  autofocus>

        @if ($errors->has('duree-campagne'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('duree-campagne') }}</strong>
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
                <option value="">-- Selectionner le client --</option>
                @foreach ($clients as $c)
                    <option value="{{$c->code}}" {{ $c->code == $client->code ? 'selected' : '' }} >{{$c->Raison_Soc}}</option>
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

<!-- Form select marque -->
<div class="form-group row {{ $errors->has('marque-name') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-client">{{ __('Marque') }}</label>
    <div class="col-md-8">
        <select name="marque-name" id="input-marque" class="form-control form-control-sm{{ $errors->has('marque-name') ? ' is-invalid' : '' }}"  value="{{ old('marque-name') }}"  autofocus>
            @if($marques->count())
                <option value="">-- Selectionner la marque --</option>
                @foreach ($marques as $m)
                    <option value="{{$m->code}}" {{ $m->code == $marque->code ? 'selected' : '' }} >{{$m->libelle}}</option>
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

<!-- Form select Produit -->
<div class="form-group row {{ $errors->has('produit-name') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-client">{{ __('Produit') }}</label>
    <div class="col-md-8">
        <select name="produit-name" id="input-produit" class="form-control form-control-sm{{ $errors->has('produit-name') ? ' is-invalid' : '' }}"  value="{{ old('produit-name') }}"  autofocus>
            @if($produits->count())
                <option value="">-- Selectionner la produit --</option>
                @foreach ($produits as $p)
                    <option value="{{$p->code}}" {{ $p->code == $produit->code ? 'selected' : '' }} >{{$p->libelle}}</option>
                @endforeach
            @endif
        </select>
        @if ($errors->has('produit-name'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('produit-name') }}</strong>
        </span>
        @endif
    </div>
</div>