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
		<center><a href="#"><img class="logo" src="../img/mf_logo.png" alt="logo"></a></center>
	</div>
	</div>
		<div class="row">
			<div class="col-md-2">
			<nav class="navbar" role="navigation">
			@if(Auth::check() && !empty(Auth::user()->avatar))
				<img src="../{{Auth::user()->avatar}}" alt="avatar" class="img-circle" style="margin-left: 15px;margin-bottom: 10px; width: 140px;height: 140px;">
			@else
				<img src="../img/default-avatar.jpg" alt="default" class="img-circle" style="margin-left: 15px;margin-bottom: 10px;">
			@endif
				<ul class="nav nav-pills nav-stacked">
					<li>{{HTML::link('/', '&nbsp;Home', array('class' => 'btn glyphicon glyphicon-home', 'style' => 'text-align: left;'))}}</li>
					@if(!Auth::check())
					<li>{{HTML::link('register', '&nbsp;Register', array('class' => 'btn glyphicon glyphicon-registration-mark', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('login', '&nbsp;Login', array('class' => 'btn glyphicon glyphicon-log-in', 'style' => 'text-align: left;'))}}</li>
					@else
					<li>{{HTML::link('my_movies', '&nbsp;My Movies', array('class' => 'btn glyphicon glyphicon-log-in', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('insert_movie', '&nbsp;Insert Movie', array('class' => 'btn glyphicon glyphicon-log-in', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('ranking', '&nbsp;Top10', array('class' => 'btn glyphicon glyphicon-star-empty', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('logout', '&nbsp;Logout', array('class' => 'btn glyphicon glyphicon-cog', 'style' => 'text-align: left;'))}}</li>
					@endif
				</ul>
				</nav>
			</div>
			<div class="col-md-9">
				<h4>{{$movie->name.' ('.$movie->year.')'}}</h4>
				<div class="img-desc">
					<img src="../{{$movie->cover_image}}" alt="{{$movie->name}}" style="float:left; margin-right: 15px;" height="250px">
					<p><b class="blue">Description:</b><br> {{$movie->description}} </p>
				<div style="float:left;">
					<p><b class="blue">Director:</b> {{$movie->director}}</p>
					<p><b class="blue">Stars:</b> {{$movie->stars}}</p>
					<p><b class="blue">Length:</b> {{$movie->movie_length}} min</p>
					<p><b class="blue">Category:</b> {{$movie->category->category_name}}</p>
					<p>
					{{Form::open(array('method' => 'post'))}}
					@foreach($grades as $grade)
						{{Form::radio('grade', $grade, false, array('class' => 'radio-inline')).' '.$grade}}
					@endforeach
					{{Form::hidden('movie_id', $movie->id)}}
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Form::submit('Rate!', array('class' => 'btn bg-primary'))}}
					{{Form::close()}}
					</p>
				</div>
				</div>
			</div>
		</div>
		<div class="col-md-9 col-md-push-2 col-tborder"></div>
</body>
</html>