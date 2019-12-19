<!-- Form Input Nom complet -->
<div class="form-group row {{ $errors->has('name') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-name">{{ __('Nom Complet') }}</label>
   <div class="col-md-8">
       <input type="text" name="name" id="input-name" class="form-control form-control-sm{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Albert KOFFI') }}" value="{{ old('name') }}"  autofocus>

       @if ($errors->has('name'))
           <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('name') }}</strong>
        </span>
       @endif
   </div>
</div>
<!--  Form Input email -->
<div class="form-group row {{ $errors->has('email') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-email">{{ __('Email') }}</label>
    <div class="col-md-8">
        <input type="email" name="email" id="input-email" class="form-control form-control-sm{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('albert.koffi@iconecom.net') }}" value="{{ old('email') }}" >

        @if ($errors->has('email'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('email') }}</strong>
        </span>
        @endif
    </div>
</div>
<!--  Form Input Mot de passe -->
<div class="form-group row {{ $errors->has('password') ? ' has-danger' : '' }}">
    <label class="col-md-4 form-control-label text-md-right" for="input-password">{{ __('Mot de passe') }}</label>
    <div class="col-md-8">
        <input type="password" name="password" id="input-password" class="form-control form-control-sm{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('P@ssword1') }}" value="" >

        @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
            <strong>{{ $errors->first('password') }}</strong>
        </span>
        @endif
    </div>
</div>
<!--  Form Input Confirmation -->
<div class="form-group row">
    <label class="col-md-4 form-control-label text-md-right" for="input-password-confirmation">{{ __('Confirmer') }}</label>
   <div class="col-md-8">
       <input type="password" name="confirm-password" id="input-password-confirmation" class="form-control form-control-sm" placeholder="{{ __('P@ssword1') }}" value="" >
   </div>
</div>

<!-- Roles Form Input -->
<div class="form-group row @if ($errors->has('roles')) has-error @endif">
    {!! Form::label('roles[]', 'Rôle', ['class' => 'col-md-4 form-control-label text-md-right']) !!}
    <div class="col-md-8">
        {!! Form::select('roles[]', $roles, isset($user) ? $user->roles->pluck('id')->toArray() : null,  ['class' => 'form-control form-control-sm', 'multiple']) !!}
        @if ($errors->has('roles')) <p class="help-block">{{ $errors->first('roles') }}</p> @endif
    </div>

</div>

{{--
<!-- Permissions -->
@if(isset($user))
    @include('shared._permissions', ['closed' => 'true', 'model' => $user ])
@endif--}}
