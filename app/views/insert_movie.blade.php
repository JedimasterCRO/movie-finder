<!DOCTYPE html>
<html>
<head>
	<title>Insert movie</title>
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
			@if(Auth::check() && !empty(Auth::user()->avatar))
				<img src="{{Auth::user()->avatar}}" alt="avatar" class="img-circle" style="margin-left: 15px;margin-bottom: 10px; width: 140px;height: 140px;">
				<p align="center">{{Auth::user()->username}}</p>
			@elseif(Auth::check() && empty(Auth::user()->avatar))
				<img src="img/default-avatar.jpg" alt="default" class="img-circle" style="margin-left: 15px;margin-bottom: 10px;">
			@endif
				<ul class="nav nav-pills nav-stacked">
					<li>{{HTML::link('/', '&nbsp;Home', array('class' => 'btn glyphicon glyphicon-home', 'style' => 'text-align: left;'))}}</li>
					@if(!Auth::check())
					<li>{{HTML::link('register', '&nbsp;Register', array('class' => 'btn glyphicon glyphicon-registration-mark', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('login', '&nbsp;Login', array('class' => 'btn glyphicon glyphicon-log-in', 'style' => 'text-align: left;'))}}</li>
					@else
					<li>{{HTML::link('my_movies', '&nbsp;My Movies', array('class' => 'btn glyphicon glyphicon-log-in', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('insert_movie', '&nbsp;Insert Movie', array('class' => 'btn glyphicon glyphicon-log-in', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('all_movies', '&nbsp;All Movies', array('class' => 'btn glyphicon glyphicon-star-empty', 'style' => 'text-align: left;'))}}</li>
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
			<div class="col-md-9"><h2>Insert new movie</h2>
			{{Form::open(array('method' => 'post', 'url' => 'insert_movie', 'class' => 'form-inline', 'files' => true, 'enctype' => 'multipart/form-data'))}}
			<p>Movie name:&nbsp; {{Form::text('name', null, array('class' => 'form-control'))}} </p><p class="text-danger">{{$errors->first('name')}}</p>
			<p>Year released:&nbsp; {{Form::text('year', null, array('class' => 'form-control'))}} </p><p class="text-danger">{{$errors->first('year')}}</p>
			<p>Movie length: &nbsp; {{Form::text('movie_length', null, array('class' => 'form-control'))}} min</p><p class="text-danger">{{$errors->first('stars')}}</p>
			<p>Description:&nbsp; {{Form::textarea('description', null, array('class' => 'form-control'))}} </p><p class="text-danger">{{$errors->first('description')}}</p>
			<p>Category:&nbsp; {{Form::select('category', $category->lists('category_name', 'id'), null, array('class' => 'form-control'))}} </p>
			<p>Director:&nbsp; {{Form::text('director', null, array('class' => 'form-control'))}}</p><p class="text-danger">{{$errors->first('director')}}</p>
			<p>Stars:&nbsp; {{Form::text('stars', null, array('class' => 'form-control'))}}&nbsp; NOTE: Ukoliko unosite više glumaca odvojite ih zarezom (npr. Tom Hanks, Brad Pitt,...)</p><p class="text-danger">{{$errors->first('stars')}}</p>
			<p>Movie cover:&nbsp; {{Form::file('file')}} </p><p class="text-danger">{{$errors->first('file')}}</p>
			{{Form::submit('Posalji', array('class' => 'btn bg-primary'))}}
			{{Form::reset('Reset', array('class' => 'btn bg-primary'))}}
			{{Form::close()}}
			</div>
		</div>
		<div class="col-md-9 col-md-push-2 col-tborder">footer</div>
</body>
</html>