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
			<div class="text-center">
				<img src="../{{Auth::user()->avatar}}" alt="avatar" class="img-circle" style="margin-left: 15px;margin-bottom: 10px; width: 140px;height: 140px;">
				<p class="orange">{{Auth::user()->username}}</p>
			</div>
			@elseif(Auth::check() && empty(Auth::user()->avatar))
			<div class="text-center">
				<img src="../img/default-avatar.jpg" alt="default" class="img-circle" style="margin-left: 15px;margin-bottom: 10px;">
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
			<div class="col-md-9">
				<h4>{{$movie->name.' ('.$movie->year.')'}}</h4>
				<div class="img-desc">
					<div class="col-md-2" style="width:200px;">
					<div>
					<img src="../{{$movie->cover_image}}" alt="{{$movie->name}}" style="float:left; margin-right: 15px;" height="250px" width="100%">
					@if($movie->user_id == Auth::user()->id)
					{{HTML::link('rate_movie/'.$movie->id.'/edit', 'Edit!', array('class' => 'btn bg-primary menu-font-size', 'style' => 'width:100%;margin-top:5px;'))}}
					@endif
					</div>
					</div>
					<div class="col-md-9"><p><b class="blue">Description:</b><br> {{$movie->description}} </p></div>
				<div style="float:left;">
					<p><b class="blue">Director:</b> &nbsp;{{$movie->director}}</p>
					<p><b class="blue">Stars:</b> &nbsp;{{$movie->stars}}</p>
					<p><b class="blue">Length:</b> &nbsp;{{$movie->movie_length}} min</p>
					<p><b class="blue">Category:</b> &nbsp;{{$movie->category->category_name}}</p>
					<p><b class="blue">Rating:</b> &nbsp; 
					@if($rating->vote_num != 0) 
						{{{$rating->total/$rating->vote_num}}}&nbsp;&nbsp; from &nbsp;&nbsp;{{{$rating->vote_num}}}&nbsp;&nbsp;user(s).
					@else
						{{'Not rated!'}}
					@endif
					</p>
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
		<footer>
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