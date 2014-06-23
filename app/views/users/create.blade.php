@extends('layouts.main')

@section('title') Twixr - Registro @stop

@section('subtitle') Regístrate @stop

@section('main')

{{ Form::open(['route' => 'users.store', 'method' => 'POST', 'class' => 'container', 'novalidate']) }}
  <div class="form-group col-md-10 col-md-offset-1 {{ $errors->has('name') ? 'has-error' : '' }} ">
    {{Form::label('txt_name', 'Nombre: ')}}

    @if ($errors->has('name'))
      @foreach($errors->get('name') as $error)
      {{Form::label('txt_name', $error, ['class' => 'control-label'])}}
      @endforeach
    @endif

    {{Form::text('name', Input::old('name'), ['id' => 'txt_name', 'class' => 'form-control'])}}
  </div>
  <div class="form-group col-md-10 col-md-offset-1 {{ $errors->has('username') ? 'has-error' : '' }}">
    {{Form::label('txt_username', 'Nombre de Usuario: ')}}

    @if ($errors->has('username'))
      @foreach($errors->get('username') as $error)
      {{Form::label('txt_username', $error, ['class' => 'control-label'])}}
      @endforeach
    @endif

    {{Form::text('username', Input::old('username'), ['id' => 'txt_username', 'class' => 'form-control'])}}
  </div>  
  <div class="form-group col-md-10 col-md-offset-1 {{ $errors->has('email') ? 'has-error' : '' }}">
    {{Form::label('txt_email', 'Email: ')}}

    @if ($errors->has('email'))
      @foreach($errors->get('email') as $error)
      {{Form::label('txt_email', $error, ['class' => 'control-label'])}}
      @endforeach
    @endif

    {{Form::email('email', Input::old('email'), ['id' => 'txt_email', 'class' => 'form-control'])}}
  </div>
  <div class="form-group col-md-10 col-md-offset-1 {{ $errors->has('password') ? 'has-error' : '' }}">
    {{Form::label('pwd_password', 'Contraseña: ')}}

    @if ($errors->has('password'))
      @foreach($errors->get('password') as $error)
      {{Form::label('pwd_password', $error, ['class' => 'control-label'])}}
      @endforeach
    @endif

    {{Form::password('password', ['id' => 'pwd_password', 'class' => 'form-control'])}}
  </div>
  <div class="form-group col-md-10 col-md-offset-1 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
    {{Form::label('pwd_password_confirmation', 'Confirma tu Contraseña: ')}}

    @if ($errors->has('password_confirmation'))
      @foreach($errors->get('password_confirmation') as $error)
      {{Form::label('pwd_password_confirmation', $error, ['class' => 'control-label'])}}
      @endforeach
    @endif

    {{Form::password('password_confirmation', ['id' => 'pwd_password_confirmation', 'class' => 'form-control'])}}
  </div>  
  <div class="form-group col-md-10 col-md-offset-1">
    <button type="submit" class="btn btn-primary">Registrar</button>  
  </div>
{{ Form::close() }}
@stop