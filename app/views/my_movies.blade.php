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
		<footer></footer>
</body>
</html>
@stop