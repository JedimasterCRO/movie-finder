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
		<footer class="navbar navbar-fixed-bottom"></footer>
</body>
</html>
@stop