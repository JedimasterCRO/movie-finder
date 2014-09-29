@extends('templates.master')

@section('title')
	TOP10
@stop

@section('content')
			<div class="col-md-9">
			<center><h3>TOP10 najbolje ocjenjenih filmova</h3></center>
			<table class="table table-hover">
				<th class="orange">Rbr.</th><th class="text-center orange">Naziv filma</th><th class="orange">Godina</th><th class="orange">Ocjena</th><th class="orange text-center">Žanr</th>
				<th class="orange">Ocijeni?</th>
				<?php $i=1; ?>
				@foreach($movies as $movie)
				<tr>
					<td style="text-align: center;">{{$i}}.</td>
					<td>{{$movie['name']}}</td>
					<td>{{$movie['year']}}</td>
					@if($movie['avgGrade'] != 0)
					<td class="text-center">{{$movie['avgGrade']}}</td>
					@else
					<td class="text-center">{{'unrated'}}</td>
					@endif
					<td class="text-center">{{$movie['category']}}</td>
					<td class="text-center">{{HTML::link('rate_movie/'.$movie['id'], 'Rate me!')}}</td>
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