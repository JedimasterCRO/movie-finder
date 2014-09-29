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
			<div class="text-center">
				<img src="{{Auth::user()->avatar}}" alt="avatar" class="img-circle" style="margin-left: 15px;margin-bottom: 10px; width: 140px;height: 140px;">
				<p class="orange">{{Auth::user()->username}}</p>
			</div>
			@elseif(Auth::check() && empty(Auth::user()->avatar))
			<div class="text-center">
				<img src="img/default-avatar.jpg" alt="default" class="img-circle" style="margin-left: 15px;margin-bottom: 10px;">
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
			@if(Auth::check())
			<div class="col-md-7 col-rborder">
			<h2>Dobrodošli!</h2>
			<p>Poštovani korisniče, <br>

				dobrodošao na stranice Movie Findera, servisa za pregled, ocjenjivanje, dodavanje i pretraživanje filmova.<br>

				Na ovoj web stranici naći ćete sve što Vam je potrebno za pronalazak dobog filma kako biste ugodno iskoristili svoje slobodno vrijeme. Ukoliko znate ili ste gledali neki film koji nemamo u našoj bazi podataka, možete ga dodati. </p>
				<br>
				<div><center><h3 class="orange">Preporuči mi film!</h3>
					{{Form::open(array('method' => 'GET', 'class' => 'form-inline'))}}
					Odaberi kategoriju: &nbsp;{{Form::select('category', $category->lists('category_name', 'id'), null, array('class' => 'form-control', 'style' => 'width: 20%;'))}}
					{{Form::submit('Suggest me movie!', array('class' => 'btn bg-primary', 'name' => 'suggestbtn'))}}
					{{Form::close()}}
					<br>
					@if(!empty($suggest))
					<div class="media"><a href="rate_movie/{{$suggest->id}}"><img class="media-object" src="{{$suggest->cover_image}}" alt="cover" height="300px">&nbsp;{{{$suggest->name.' ('.$suggest->year.')'}}}</a></div>
					@elseif(empty($suggest) && Input::get('suggestbtn'))
					<div><p>Nema filmova u ovoj kategoriji.</p></div>
					@endif
					</center>
				</div>
				<h3 class="orange" align="center">Zadnji dodani filmovi:</h3>
				@foreach($latest as $added)
					<div class="thumbnail">
						<a href="rate_movie/{{$added->id}}"><img class="img-size" src="{{$added->cover_image}}" alt="#">
							<div class="caption">
	        					<p class="text-center text-primary"><b>{{$added->name.' ('.$added->year.')'}}</b></p>
	        					<p class="text">{{$added->description}}</p>
	      					</div>
						</a>
					</div>
				@endforeach
				</div>
			@else
			<div class="col-md-7">
			<h2>Dobrodošli!</h2>
				<p>Za potpuni doživljaj i korištenje svih mogućnosti ovog web servisa morate bili registrirani i/ili ulogirani.</p><p>Ukoliko niste registrirani ili ulogirani, to možete učiniti na linkovima s lijeve strane.</p><p>Lijep pozdrav od Movie Finder tima!</p>
			@endif
			@if(Auth::check())
			<div class="col-md-3">
			<p class="text-center" style="font-size: 20px;"><b>TOP10 Filmovi</b></p>
				<table class="table table-hover">
				<?php $i=1; ?>
				@foreach($movies as $movie)
				<tr>
					<td  class="no-border">{{HTML::link('rate_movie/'.$movie->movie_id, $i.'.  &nbsp;'.$movie->movie->name, array('style' => 'text-align: left;'))}}</td>
				</tr>
				<?php $i++; ?>
				@endforeach
				</table>
			</div>
			@endif
		</div>
		@if(Auth::check())
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
		@else
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
		@endif
</body>
</html>