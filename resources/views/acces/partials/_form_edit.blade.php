<!-- Form select user -->
<div class="form-group row {{ $errors->has('name') ? ' has-danger' : '' }}">
    <label class="col-md-3 form-control-label text-md-right" for="input-user">{{ __('Utilisateur') }}</label>
    <div class="col-md-9">
        <select name="user-name" id="input-user" class="form-control form-control-sm{{ $errors->has('user-name') ? ' is-invalid' : '' }}"  value="{{ old('user-name') }}"  autofocus>
            @if($users->count())
                <option value="">-- Selectionner l'utilisateur --</option>
                @foreach ($users as $u)
                    <option value="{{$u->id}}" {{ $u->id == $user->id ? 'selected' : '' }} >{{$u->email}}</option>
                @endforeach
            @endif
        </select>
        @if ($errors->has('user-name'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('user-name') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form select client -->
<div class="form-group row {{ $errors->has('name') ? ' has-danger' : '' }}">
    <label class="col-md-3 form-control-label text-md-right" for="input-client">{{ __('Client') }}</label>
    <div class="col-md-9">
        <select name="client-name" id="input-client" class="form-control form-control-sm{{ $errors->has('client-name') ? ' is-invalid' : '' }}"  value="{{ old('client-name') }}"  autofocus>
            @if($users->count())
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
