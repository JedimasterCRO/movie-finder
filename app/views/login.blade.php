<!DOCTYPE html>
<html>
<head>
	<title>Index</title>
	<meta charset="UTF-8">
	{{HTML::style('css/bootstrap.min.css')}}
	{{HTML::style('css/main.css')}}
</head>
<body class="bg-default">
	<div class="navbar navbar-default navbar-static-top">
		<center><a href="#"><img class="logo" src="img/mf_logo.png" alt="logo"></a></center>
	</div>
	</div>
		<div class="row">
			<div class="col-md-2">
			<nav class="navbar" role="navigation">
				<ul class="nav nav-pills nav-stacked">
					<li>{{HTML::link('/', '&nbsp;Home', array('class' => 'btn glyphicon glyphicon-home', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('register', '&nbsp;Register', array('class' => 'btn glyphicon glyphicon-registration-mark', 'style' => 'text-align: left;'))}}</li>
				</ul>
				</nav>
			</div>
			<div class="col-md-5">
			@if(Session::has('success'))
				{{Session::get('success')}}
			@endif
			</div>
<<<<<<< HEAD
			<div class="col-md-8 centered">
			{{Form::open(array('method' => 'post', 'url' => 'login', 'class' => 'col-md-3 col-md-push-5'))}}
			<h2>Login</h2>
			{{Form::token()}}
				<p>E-mail: {{Form::text('email', null, array('class' => 'form-control centered'))}} </p>
				@if($errors->has('email')) 
					{{'<p style="color:red;">'.$errors->first('email').'</p>'}}
				@endif
				<p>Password: {{Form::password('password', array('class' => 'form-control centered'))}} </p>
				@if($errors->has('password')) 
					{{'<p style="color:red;">'.$errors->first('password').'</p>'}}
				@endif
			{{Form::submit('Pošalji', array('class' => 'btn btn-lg bg-primary'))}}
			{{Form::reset('Reset', array('class' => 'btn btn-lg bg-primary'))}}
			{{Form::close()}}
			</div>
		</div>
		<div class="col-md-8 col-md-push-2 col-tborder">footer</div>
=======
			<div class="col-md-9 centered"><h2>Login</h2>
			{{Form::open(array('method' => 'post', 'url' => 'register', 'class' => 'col-md-4 col-md-push-4'))}}
			{{Form::token()}}
				<p>E-mail: {{Form::text('email', null, array('class' => 'form-control'))}} </p>
				<p>Password: {{Form::password('password', array('class' => 'form-control'))}} </p>
			{{Form::submit('Pošalji', array('class' => 'btn bg-primary'))}}
			{{Form::reset('Reset', array('class' => 'btn bg-primary'))}}
			{{Form::close()}}
			</div>
			@if($errors->has())
				{{implode('<br>', $errors->all())}}
			@endif
		</div>
		<div class="col-md-9 col-md-push-2 col-tborder">footer</div>
>>>>>>> origin/master
</body>
</html>