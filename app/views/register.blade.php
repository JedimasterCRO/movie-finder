@extends('templates.master')

@section('title')
	All movies
@stop

@section('content')
			<div class="col-md-5">
			@if(Session::has('success'))
				{{Session::get('success')}}
			@endif
			</div>
			<div class="col-md-9"><h2>Registriraj se</h2>
			{{Form::open(array('method' => 'post', 'url' => 'register', 'class' => 'form-inline col-md-9', 'files' => true, 'enctype' => 'multipart/form-data'))}}
			<p>Korisničko ime:&nbsp; {{Form::text('username', null, array('class' => 'form-control'))}} </p><p class="text-danger">{{$errors->first('username')}}</p>
			<p>E-mail:&nbsp; {{Form::text('email', null, array('class' => 'form-control'))}} </p><p class="text-danger">{{$errors->first('email')}}</p>
			<p>Lozinka:&nbsp; {{Form::password('password', array('class' => 'form-control'))}} </p><p class="text-danger">{{$errors->first('password')}}</p>
			<p>Ponovi lozinku:&nbsp; {{Form::password('password_confirmation', array('class' => 'form-control'))}} </p><p class="text-danger">{{$errors->first('password_confirmation')}}</p>
			<p>Avatar (opcionalno):&nbsp; {{Form::file('avatar')}}</p>
			{{Form::submit('Pošalji', array('class' => 'btn bg-primary'))}}&nbsp;
			{{Form::reset('Reset', array('class' => 'btn bg-primary'))}}
			{{Form::close()}}
			</div>
		</div>
		<footer class="navbar navbar-fixed-bottom"></footer>
</body>
</html>
@stop