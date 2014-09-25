<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<meta charset="UTF-8">
	{{HTML::style('css/bootstrap.min.css')}}
	{{HTML::style('css/main.css')}}
</head>
<body class="bg-default">
	<div class="navbar navbar-default navbar-static-top">
		<center><a href="#"><img class="logo" src="img/mf_logo.png" alt="logo"></a></center>
	</div>
	</div>
		<div class="row">
			<div class="col-md-2">
			<nav class="navbar" role="navigation">
				<ul class="nav nav-pills nav-stacked">
					<li>{{HTML::link('/', '&nbsp;Naslovna', array('class' => 'btn glyphicon glyphicon-home', 'style' => 'text-align: left;'))}}</li>
					@if(!Auth::check())
					<li>{{HTML::link('register', '&nbsp;Registriraj se', array('class' => 'btn glyphicon glyphicon-registration-mark', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('login', '&nbsp;Login', array('class' => 'btn glyphicon glyphicon-log-in', 'style' => 'text-align: left;'))}}</li>
					@else
					<li>{{HTML::link('my_movies', '&nbsp;Moji filmovi', array('class' => 'btn glyphicon glyphicon-film', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('insert_movie', '&nbsp;Dodaj film', array('class' => 'btn glyphicon glyphicon-log-in', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('all_movies', '&nbsp;Popis filmova', array('class' => 'btn glyphicon glyphicon-list', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('ranking', '&nbsp;Top10', array('class' => 'btn glyphicon glyphicon-star-empty', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('logout', '&nbsp;Logout', array('class' => 'btn glyphicon glyphicon-cog', 'style' => 'text-align: left;'))}}</li>
					@endif
				</ul>
				</nav>
			</div>
			<div class="col-md-5">
			@if(Session::has('success'))
				{{Session::get('success')}}
			@endif
			</div>
			<div class="col-md-9"><h2>Registriraj se</h2>
			{{Form::open(array('method' => 'post', 'url' => 'register', 'class' => 'form-inline col-md-9', 'files' => true, 'enctype' => 'multipart/form-data'))}}
			<p>Username:&nbsp; {{Form::text('username', null, array('class' => 'form-control'))}} </p><p class="text-danger">{{$errors->first('username')}}</p>
			<p>E-mail:&nbsp; {{Form::text('email', null, array('class' => 'form-control'))}} </p><p class="text-danger">{{$errors->first('email')}}</p>
			<p>Password:&nbsp; {{Form::password('password', array('class' => 'form-control'))}} </p><p class="text-danger">{{$errors->first('password')}}</p>
			<p>Password confirm:&nbsp; {{Form::password('password_confirmation', array('class' => 'form-control'))}} </p><p class="text-danger">{{$errors->first('password_confirmation')}}</p>
			<p>Avatar (optional):&nbsp; {{Form::file('avatar')}}</p>
			{{Form::submit('Pošalji', array('class' => 'btn bg-primary'))}}&nbsp;
			{{Form::reset('Reset', array('class' => 'btn bg-primary'))}}
			{{Form::close()}}
			</div>
		</div>
		<div class="col-md-9 col-md-push-2 col-tborder">footer</div>
</body>
</html>