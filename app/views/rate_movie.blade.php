@extends('templates.master')

@section('content')
			<div class="col-md-9">
				<h4>{{$movie->name.' ('.$movie->year.')'}}</h4>
				<div class="img-desc">
					<img src="../{{$movie->cover_image}}" alt="{{$movie->name}}" style="float:left; margin-right: 15px;">
					<p><b class="blue">Description:</b><br> {{$movie->description}} </p>
				<div style="float:left;">
					<p><b class="blue">Director:</b> {{$movie->director}}</p>
					<p><b class="blue">Stars:</b> {{$movie->stars}}</p>
					<p><b class="blue">Length:</b> {{$movie->movie_length}} min</p>
					<p><b class="blue">Category:</b> {{$movie->category->category_name}}</p>
					<p>
					{{Form::open(array('method' => 'post'))}}
					@foreach($grades as $grade)
						{{Form::radio('grade', $grade, false, array('class' => 'radio-inline')).' '.$grade}}
					@endforeach
					{{Form::hidden('movie_id', $movie->id)}}
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{Form::submit('Rate!', array('class' => 'btn bg-primary'))}}
					{{Form::close()}}
					</p>
				</div>
				</div>
			</div>
		</div>
		<div class="col-md-9 col-md-push-2 col-tborder"></div>
</body>
</html>
@stop