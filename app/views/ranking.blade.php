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
			<div class="col-md-9">

			</div>
		</div>
		<div class="col-md-9 col-md-push-2 col-tborder"></div>
</body>
</html>