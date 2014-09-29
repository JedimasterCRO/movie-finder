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
		<footer class="navbar navbar-fixed-bottom">
		<div class="box">
		<center><b>Kontakt</b></center>
		<b>E-mail:</b> &nbsp;{{HTML::link('mailto:goran.vinkovic87@gmail.com', 'goran.vinkovic87@gmail.com')}} <br>
		<b>Facebook:</b> &nbsp;{{HTML::link('https://www.facebook.com/goran.vinkovic.98', 'Goran Vinković', array('target' => '_blank'))}}
		</div>
		<div class="box">
			<center><b>Linkovi</b></center>
			<b>Filmovi:</b> &nbsp;{{HTML::link('http://www.imdb.com/', 'Imdb', array('target' => '_blank'))}} <br>
			<b>Traileri:</b> &nbsp;{{HTML::link('http://www.traileraddict.com/', 'TrailerAddict', array('target' => '_blank'))}} <br>
			<b>Titlovi:</b> &nbsp;{{HTML::link('http://titlovi.com/', 'Titlovi.com', array('target' => '_blank'))}} <br>
		</div>
		<div class="box"></div>
		<div class="box"></div>
		<div class="box"></div>
			<p class="text-footer">Designed & copyrighted by Goran Vinković</p>
		</footer>
</body>
</html>
@stop