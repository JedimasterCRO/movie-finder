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
		<div class="col-md-9 col-md-push-2 col-tborder"></div>
</body>
</html>
@stop