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
			<div class="col-md-8 centered">
			{{Form::open(array('method' => 'post', 'url' => 'login', 'class' => 'col-md-3 col-md-push-5'))}}
			<h2>Login</h2>
				<p>E-mail: {{Form::text('email', null, array('class' => 'form-control centered'))}} </p>
				@if($errors->has('email')) 
					{{'<p style="color:red;">'.$errors->first('email').'</p>'}}
				@endif
				<p>Lozinka: {{Form::password('password', array('class' => 'form-control centered'))}} </p>
				@if($errors->has('password')) 
					{{'<p style="color:red;">'.$errors->first('password').'</p>'}}
				@endif
			{{Form::submit('Pošalji', array('class' => 'btn btn-lg bg-primary'))}}
			{{Form::reset('Reset', array('class' => 'btn btn-lg bg-primary'))}}
			{{Form::close()}}
			</div>
		</div>
			@if($errors->has())
				{{implode('<br>', $errors->all())}}
			@endif
		</div>
		<footer class="navbar navbar-fixed-bottom"></footer>
</body>
</html>
@stop