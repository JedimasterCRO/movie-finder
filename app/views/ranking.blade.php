@extends('templates.master')

@section('title')
	Movie rankings
@stop

@section('content')
			<div class="col-md-9">
			<center><h3>Movie rankings</h3></center>
			<table class="table table-hover">
				<th class="orange">Num.</th><th class="text-center orange">Movie name</th><th class="orange">Year</th><th class="orange">Movie rate</th><th class="orange">Category</th>
				<th class="orange">Wanna rate?</th>
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
		<footer></footer>
</body>
</html>
@stop