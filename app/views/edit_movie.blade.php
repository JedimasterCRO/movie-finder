<!DOCTYPE html>
<html>
<head>
	<title> @yield('title') </title>
	<meta charset="UTF-8">
	{{HTML::style('css/bootstrap.min.css')}}
	{{HTML::style('css/main.css')}}
</head>
<body class="bg-default">
	<div class="navbar navbar-default navbar-static-top">
		<center><a href="#"><img class="logo" src="../../img/mf_logo.png" alt="logo"></a></center>
	</div>
	</div>
		<div class="row">
			<div class="col-md-2">
			<nav class="navbar" role="navigation">
			@if(Auth::check() && !empty(Auth::user()->avatar))
			<div class="text-center">
				<img src="../../{{Auth::user()->avatar}}" alt="avatar" class="img-circle" style="margin-left: 15px;margin-bottom: 10px; width: 140px;height: 140px;">
				<p class="orange">{{Auth::user()->username}}</p>
			</div>
			@elseif(Auth::check() && empty(Auth::user()->avatar))
			<div class="text-center">
				<img src="../../img/default-avatar.jpg" alt="default" class="img-circle" style="margin-left: 15px;margin-bottom: 10px;">
				<p class="orange">{{Auth::user()->username}}</p>
			</div>
			@endif
				<ul class="nav nav-pills nav-stacked">
					<li>{{HTML::link('/', '&nbsp;Naslovna', array('class' => 'btn glyphicon glyphicon-home menu-font-size', 'style' => 'text-align: left;'))}}</li>
					@if(!Auth::check())
					<li>{{HTML::link('register', '&nbsp;Registriraj se', array('class' => 'btn glyphicon glyphicon-registration-mark menu-font-size', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('login', '&nbsp;Login', array('class' => 'btn glyphicon glyphicon-log-in menu-font-size', 'style' => 'text-align: left;'))}}</li>
					@else
					<li>{{HTML::link('my_movies', '&nbsp;Moji filmovi', array('class' => 'btn glyphicon glyphicon-film menu-font-size', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('insert_movie', '&nbsp;Dodaj film', array('class' => 'btn glyphicon glyphicon-log-in menu-font-size', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('all_movies', '&nbsp;Popis filmova', array('class' => 'btn glyphicon glyphicon-list menu-font-size', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('ranking', '&nbsp;Top10', array('class' => 'btn glyphicon glyphicon-star-empty menu-font-size', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('logout', '&nbsp;Logout', array('class' => 'btn glyphicon glyphicon-cog menu-font-size', 'style' => 'text-align: left;'))}}</li>
					@endif
				</ul>
				</nav>
			</div>
			<div class="col-md-5">
			@if(Session::has('success'))
				{{Session::get('success')}}
			@endif
			</div>
			<div class="col-md-9"><h2>Editiraj podatke o filmu</h2>
			{{Form::open(array('method' => 'post', 'url' => 'insert_movie', 'class' => 'form-inline', 'files' => true, 'enctype' => 'multipart/form-data'))}}
			<p>Naziv filma:&nbsp; {{Form::text('name', null, array('class' => 'form-control', 'size' => '50'))}} </p><p class="text-danger">{{$errors->first('name')}}</p>
			<p>Godina izlaska:&nbsp; {{Form::text('year', null, array('class' => 'form-control'))}} </p><p class="text-danger">{{$errors->first('year')}}</p>
			<p>Dužina trajanja: &nbsp; {{Form::text('movie_length', null, array('class' => 'form-control'))}} min</p><p class="text-danger">{{$errors->first('stars')}}</p>
			<p>Opis:&nbsp; {{Form::textarea('description', null, array('class' => 'form-control'))}} </p><p class="text-danger">{{$errors->first('description')}}</p>
			<p>Kategorija:&nbsp; {{--Form::select('category', $category->lists('category_name', 'id'), null, array('class' => 'form-control'))--}} </p>
			<p>Redatelj:&nbsp; {{Form::text('director', null, array('class' => 'form-control'))}}</p><p class="text-danger">{{$errors->first('director')}}</p>
			<p>Uloge:&nbsp; {{Form::text('stars', null, array('class' => 'form-control', 'size' => '30'))}}&nbsp; NOTE: Unos više glumaca odvojite zarezom (npr. Tom Hanks, Brad Pitt,...)</p><p class="text-danger">{{$errors->first('stars')}}</p>
			<p>Poster filma:&nbsp; {{Form::file('file')}} </p><p class="text-danger">{{$errors->first('file')}}</p>
			{{Form::submit('Posalji', array('class' => 'btn bg-primary'))}}
			{{Form::reset('Reset', array('class' => 'btn bg-primary'))}}
			{{Form::close()}}
			</div>
		</div>
		<footer></footer>
</body>
</html>