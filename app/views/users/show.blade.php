@extends('layouts.main')

@section('title') Twixr - Perfil de {{$user->username}} @stop

@section('subtitle') {{'@' . $user->username}} @stop

@section('main')
	@parent

	<section id="main" class="col-md-4">
		@if(! empty($user->twixes))
			<ul>
			@foreach($user->twixes as $twix)
				<li>{{$twix->text}}</li>
			@endforeach
			</ul>
		@else
			<p>El usuario no ha publicado nada aún</p>
		@endif
	</section>
@stop