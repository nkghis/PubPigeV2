<!-- Form Input Nom rôle -->
<div class="form-group row {{ $errors->has('role') ? ' has-danger' : '' }}">
    <label class="col-md-3 form-control-label text-md-right" for="input-name">{{ __('Rôle') }}</label>
    <div class="col-md-9">
        <input type="text" name="role" id="input-name" class="form-control form-control-sm{{ $errors->has('role') ? ' is-invalid' : '' }}" placeholder="{{ __('Administrateur') }}" value="{{ old('role', $role->name) }}"  autofocus>

        @if ($errors->has('role'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('role') }}</strong>
        </span>
        @endif
    </div>
</div>

<!-- Form Check permission -->
<div class="form-group row {{ $errors->has('permission') ? ' has-danger' : '' }}">
    <label class="col-md-3 form-control-label text-md-right" for="input-permission">{{ __('Permission') }}</label>
    <div class="col-md-9">
        @foreach($permission as $value)
            <label>| {{ Form::checkbox('permission[]', $value->id,in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}  {{$value->name}}</label>
        @endforeach
        @if ($errors->has('permission'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('permission') }}</strong>
        </span>
        @endif
    </div>
</div>