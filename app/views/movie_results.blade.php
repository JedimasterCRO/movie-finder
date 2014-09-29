@extends('templates.master')

@section('title')
	All movies
@stop

@section('content')
			<div class="col-md-9">
			<p>*pretraga po nazivu</p>
			{{Form::open(array('url' => 'movie_results', 'method' => 'get', 'class' => 'form-inline'))}}
			{{Form::text('keyword', null, array('class' => 'form-control col-xs-5', 'placeholder' => 'keyword', 'style' => 'width:82%;'))}}
			{{Form::submit('Traži', array('class' => 'btn btn-primary col-xs-2', 'style' => 'margin-left:5px;'))}}
			{{Form::close()}}
			<table class="table table-hover" style="margin-top:80px;">
				<th>Num.</th><th class="text-center">Movie name</th><th>Year</th><th>Movie grade</th><th>Votes No.</th><th>Details?</th>
				<?php $i=1; ?>
				@foreach($movies as $movie)
				<tr>
					<td style="text-align: center;">{{$i}}.</td>
					<td>{{$movie['name']}}</td>
					<td>{{$movie['year']}}</td>
					@if($movie['avgGrade'] != 0)
					<td class="text-center">{{$movie['avgGrade']}}</td>
					@else
					<td>{{'unrated'}}</td>
					@endif
					<td class="text-center">{{$movie['votesNo']}}</td>
					<td class="text-center">{{HTML::link('rate_movie/'.$movie['id'], 'Check out!')}}</td>
				</tr>
				<?php $i++; ?>
				@endforeach
			</table>
			</div>
		</div>
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
</body>
</html>
@stop