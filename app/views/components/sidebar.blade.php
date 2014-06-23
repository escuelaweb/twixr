{{ Form::open(['route' => 'twixes.store', 'method' => 'POST', 'novalidate']) }}
  <div class="form-group {{ $errors->has('text') ? 'has-error' : '' }} ">

    @if ($errors->has('text'))
      @foreach($errors->get('text') as $error)
      {{Form::label('txt_text', $error, ['class' => 'control-label'])}}
      @endforeach
    @endif

    {{Form::text('text', Input::old('text'), ['id' => 'txt_text', 'class' => 'form-control', 'placeholder' => '¿En qué piensas?'])}}
  </div>

  <div class="form-group">
    <button type="submit" class="btn btn-primary">Twixear</button>  
  </div>  
{{Form::close()}}