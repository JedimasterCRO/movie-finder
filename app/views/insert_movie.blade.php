@extends('templates.master')

@section('title')
	Dodaj novi film
@stop

@section('content')
			<div class="col-md-5">
			@if(Session::has('success'))
				{{Session::get('success')}}
			@endif
			</div>
			<div class="col-md-9"><h2>Dodaj film</h2>
			{{Form::open(array('method' => 'post', 'url' => 'insert_movie', 'class' => 'form-inline', 'files' => true, 'enctype' => 'multipart/form-data'))}}
			<p>Naziv filma:&nbsp; {{Form::text('name', null, array('class' => 'form-control'))}} </p><p class="text-danger">{{$errors->first('name')}}</p>
			<p>Godina izlaska:&nbsp; {{Form::text('year', null, array('class' => 'form-control'))}} </p><p class="text-danger">{{$errors->first('year')}}</p>
			<p>Dužina trajanja: &nbsp; {{Form::text('movie_length', null, array('class' => 'form-control'))}} min</p><p class="text-danger">{{$errors->first('stars')}}</p>
			<p>Opis:&nbsp; {{Form::textarea('description', null, array('class' => 'form-control'))}} </p><p class="text-danger">{{$errors->first('description')}}</p>
			<p>Kategorija:&nbsp; {{Form::select('category', $category->lists('category_name', 'id'), null, array('class' => 'form-control'))}} </p>
			<p>Redatelj:&nbsp; {{Form::text('director', null, array('class' => 'form-control'))}}</p><p class="text-danger">{{$errors->first('director')}}</p>
			<p>Uloge:&nbsp; {{Form::text('stars', null, array('class' => 'form-control'))}}&nbsp; NOTE: Ukoliko unosite više glumaca odvojite ih zarezom (npr. Tom Hanks, Brad Pitt,...)</p><p class="text-danger">{{$errors->first('stars')}}</p>
			<p>Poster filma:&nbsp; {{Form::file('file')}} </p><p class="text-danger">{{$errors->first('file')}}</p>
			{{Form::submit('Posalji', array('class' => 'btn bg-primary'))}}
			{{Form::reset('Reset', array('class' => 'btn bg-primary'))}}
			{{Form::close()}}
			</div>
		</div>
		<footer></footer>
</body>
</html>
@stop