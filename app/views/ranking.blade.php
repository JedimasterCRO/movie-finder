@extends('templates.master')

@section('title')
	Movie rankings
@stop

@section('content')
			<div class="col-md-9">
			<center><h3>Movie rankings</h3></center>
			<table class="table table-hover">
				<th>Num.</th><th class="text-center">Movie name</th><th>Year</th><th>Movie rate</th><th>Category</th><th>Wanna rate?</th>
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
		<div class="col-md-9 col-md-push-2 col-tborder"></div>
</body>
</html>
@stop