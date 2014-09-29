@extends('templates.master')

@section('title')
	Moji filmovi
@stop

@section('content')
			@foreach($movies as $index => $movie)
			@if($index > 0)
				<div class="col-md-9 col-md-push-2 col-bottom-shadow">
			@else
				<div class="col-md-9 col-bottom-shadow">
			@endif
				<h4><a href="rate_movie/{{$movie->id}}" >{{$movie->name.' ('.$movie->year.')'}}</a></h4>
				<div class="img-desc">
					<img src="{{$movie->cover_image}}" alt="{{$movie->name}}" style="float:left; margin-right: 15px;" height="250px">
					<p><b class="blue">Opis:</b><br> {{$movie->description}} </p>
				</div>
				<div style="float:left;">
					<p><b class="blue">Redatelj:</b>&nbsp; {{$movie->director}}</p>
					<p><b class="blue">Uloge:</b>&nbsp; {{$movie->stars}}</p>
					<p><b class="blue">Dužina trajanja:</b>&nbsp; {{$movie->movie_length}} min</p>
					<p><b class="blue">Žanr:</b>&nbsp; {{$movie->category->category_name}}</p>
					<p><b class="blue">Prosječna ocjena:</b>&nbsp;
					@if($rates)
						@foreach($rates as $rate)
						@if($movie->id == $rate->movie_id && $rate->vote_num != 0)
							{{$rate->rate.' od '.$rate->vote_num.' korisnika.'}}
						@elseif($movie->id == $rate->movie_id && $rate->vote_num == 0)
							{{'Nije ocijenjen!'}}
						@endif
						@endforeach
					@endif
					</p>
				</div>
			</div>
			@endforeach
			@if(!isset($movie))
				{{'Niste još dodali nijedan film!'}}
			@endif
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
@stop