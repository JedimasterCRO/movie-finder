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
			@if(Auth::check() && !empty(Auth::user()->avatar))
				<img src="{{Auth::user()->avatar}}" alt="avatar" class="img-circle" style="margin-left: 15px;margin-bottom: 10px;width: 140px;height: 140px;" >
				<p class="orange" align="center">{{Auth::user()->username}}</p>
			@elseif(Auth::check() && empty(Auth::user()->avatar))
				<img src="img/default-avatar.jpg" alt="default" class="img-circle" style="margin-left: 15px;margin-bottom: 10px;">
				<p class="orange" align="center">{{Auth::user()->username}}</p>
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
			<div class="col-md-7 col-rborder">
			<h2>Dobrodošli!</h2>
			@if(Auth::check())
			<p>Poštovani korisniče, <br>

				dobrodošao na stranice Movie Findera, servisa za pregled, ocjenjivanje, dodavanje i pretraživanje filmova.  <br><br>

				Nam congue ante sed aliquet commodo. Sed molestie ligula nec gravida tincidunt. Mauris vehicula nibh molestie ornare pharetra. Donec lacinia venenatis ipsum, quis sagittis lacus ultrices nec. Phasellus bibendum quam eu ultrices pharetra. Sed vestibulum mauris vitae convallis tincidunt. Proin vehicula nunc id tempus dignissim. Donec vitae condimentum arcu. In volutpat aliquet aliquet. Sed posuere vel lectus vitae interdum. Aenean nec fermentum purus. Integer pellentesque egestas arcu non condimentum. Maecenas non purus id enim sollicitudin auctor gravida eget purus.
			</p>
			@else
				<p>Za potpuni doživljaj i korištenje svih mogućnosti ovog web servisa morate bili registrirani i/ili ulogirani.</p><p>Ukoliko niste registrirani ili ulogirani, to možete učiniti na linkovima s lijeve strane.</p><p>Lijep pozdrav od Movie Finder tima!</p>
			@endif
			</div>
			<div class="col-md-3">
			<p class="text-center bg-primary">TOP10 Movies</p>
				<table class="table">
				<?php $i=1; ?>
				@foreach($movies as $movie)
				<tr>
					<td>{{$i}}.</td>
					<td>{{{$movie['name']}}}</td>
				</tr>
				<?php $i++; ?>
				@endforeach
				</table>
			</div>
		</div>
		<div class="col-md-12 col-tborder">footer</div>
</body>
</html>