<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

	<title> @yield('title') </title>

	@section('stylesheets')
	<link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	@show
</head>
<body class="container">
	@section('header')
	<header class="container">
		<h1 class="row"> Twixr </h1>
		<h2 class="row"> @yield('subtitle') </h2>

		@if(Auth::check())
		<a href="{{route('logout')}}" class="btn btn-info">Cerrar Sesión</a>
		@else
		<aside class="row">
			{{Form::open(['route' => 'authenticate', 'method' => 'POST', 'class' => 'col-md-4'])}}
				<legend>Si ya tiene una cuenta, inicia sesión</legend>
			  <div class="form-group {{ $errors->has('login_email') ? 'has-error' : '' }} ">

			    @if ($errors->has('login_email'))
			      @foreach($errors->get('login_email') as $error)
			      {{Form::label('txt_login_email', $error, ['class' => 'control-label'])}}
			      @endforeach
			    @endif

			    {{Form::email('login_email', Input::old('login_email'), ['id' => 'txt_login_email', 'class' => 'form-control', 'placeholder' => 'Email'])}}
			  </div>

			  <div class="form-group {{ $errors->has('login_password') ? 'has-error' : '' }} ">

			    @if ($errors->has('login_password'))
			      @foreach($errors->get('login_password') as $error)
			      {{Form::label('txt_login_password', $error, ['class' => 'control-label'])}}
			      @endforeach
			    @endif

			    {{Form::password('login_password', ['id' => 'txt_login_password', 'class' => 'form-control', 'placeholder' => 'Contraseña'])}}
			  </div>

			  <div class="form-group">
			    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>  
			  </div>
			{{Form::close()}}
		</aside>
		@endif
	</header>
	@show

	<div class="container">
		@section('main')	
			<aside id="sidebar" class="col-md-4">
				@include('components.sidebar')
			</aside>
		@show
	</div>

	@section('javascripts')
	<script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
	<script src="{{asset('bootstrap/js/bootstrap.js')}}"></script>
	@show


</body>
</html>