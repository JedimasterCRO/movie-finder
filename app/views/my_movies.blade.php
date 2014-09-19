<!DOCTYPE html>
<html>
<head>
	<title>My movies</title>
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
			@foreach($movies as $index => $movie)
			@if($index > 0)
				<div class="col-md-9 col-md-push-2 col-bottom-shadow">
			@else
				<div class="col-md-9 col-bottom-shadow">
			@endif
				<h4>{{$movie->name.' ('.$movie->year.')'}}</h4>
				<div class="img-desc">
					<img src="{{$movie->cover_image}}" alt="{{$movie->name}}" style="float:left; margin-right: 15px;" height="250px">
					<p><b class="blue">Description:</b><br> {{$movie->description}} </p>
				</div>
				<div style="float:left;">
					<p><b class="blue">Director:</b> {{$movie->director}}</p>
					<p><b class="blue">Stars:</b> {{$movie->stars}}</p>
					<p><b class="blue">Length:</b> {{$movie->movie_length}} min</p>
					<p><b class="blue">Category:</b> {{$movie->category->category_name}}</p>
				</div>
			</div>
			@endforeach
			@if(!isset($movie))
				{{'Niste još dodali nijedan film!'}}
			@endif
		</div>
		<div class="col-md-9 col-md-push-2"></div>
</body>
</html>