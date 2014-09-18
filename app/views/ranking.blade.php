@extends('templates.master')

@section('title')
	Movie rankings
@stop

@section('content')
			<div class="col-md-9">
			<center><h3>Movie rankings</h3></center>
			<table class="table table-hover">
				<th>Num.</th><th>Movie name</th><th>Year</th><th>Movie grade</th><th>Wanna rate?</th>
				<?php $i=1; ?>
				@foreach($movies as $movie)
				<tr>
					<td>{{$i}}</td>
					<td>{{$movie['name']}}</td>
					<td>{{$movie['year']}}</td>
					<td>{{$movie['avgGrade']}}</td>
					<td>{{HTML::link('rate_movie/'.$movie['id'], 'Rate me!')}}</td>
				</tr>
				<?php $i++; ?>
				@endforeach
			</table>
			</div>
		</div>
		<div class="col-md-9 col-md-push-2 col-tborder"></div>
</body>
</html>
@stop