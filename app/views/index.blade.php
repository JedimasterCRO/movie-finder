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
					<li>{{HTML::link('login', '&nbsp;Login', array('class' => 'btn glyphicon glyphicon-log-in', 'style' => 'text-align: left;'))}}</li>
<<<<<<< HEAD
					<li>{{HTML::link('ranking', '&nbsp;Top10', array('class' => 'btn glyphicon glyphicon-star-empty', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('logout', '&nbsp;Logout', array('class' => 'btn glyphicon glyphicon-cog', 'style' => 'text-align: left;'))}}</li>
=======
					<li>{{HTML::link('#', '&nbsp;Top10', array('class' => 'btn glyphicon glyphicon-star-empty', 'style' => 'text-align: left;'))}}</li>
					<li>{{HTML::link('#', '&nbsp;Account', array('class' => 'btn glyphicon glyphicon-cog', 'style' => 'text-align: left;'))}}</li>
>>>>>>> origin/master
				</ul>
				</ul>
				</nav>
			</div>
			<div class="col-md-7 col-rborder"><h1>Naslov 1</h1>
			@if(Auth::check())
			<h4>Dobrodošao, {{Auth::user()->username}}</h4>
			@endif
			<p>
				<a href="#">Lorem ipsum</a> dolor sit amet, consectetur adipiscing elit. Sed accumsan purus sed porttitor suscipit. Nam viverra nisi sit amet enim auctor, et pulvinar tellus faucibus. Donec ultricies, turpis eu eleifend scelerisque, lectus arcu elementum magna, nec blandit erat augue eget libero. Suspendisse venenatis, ligula id congue egestas, metus metus dapibus ligula, nec eleifend metus sem vitae diam. Vivamus quis varius mi. Curabitur nec congue risus. Pellentesque accumsan faucibus adipiscing. Suspendisse sit amet neque et neque euismod malesuada a quis augue. Vestibulum ultrices augue at congue elementum. <br><br>

				Nulla aliquet turpis eget volutpat blandit. Sed a ipsum sollicitudin, tristique dui eu, congue eros. Duis non sapien in nisl scelerisque feugiat. Aliquam erat volutpat. Mauris pellentesque leo et dui faucibus commodo. Cras rutrum, tellus eu accumsan feugiat, nisi tortor placerat magna, in consectetur nunc elit eu tortor. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc molestie lectus purus, sit amet sollicitudin eros varius nec. Donec commodo luctus pretium. Nulla luctus sapien vel sapien semper convallis. Suspendisse potenti. Nam ac scelerisque lorem, convallis tristique lectus. Nam congue turpis nisl, quis semper quam varius eu. <br><br>

				Nam congue ante sed aliquet commodo. Sed molestie ligula nec gravida tincidunt. Mauris vehicula nibh molestie ornare pharetra. Donec lacinia venenatis ipsum, quis sagittis lacus ultrices nec. Phasellus bibendum quam eu ultrices pharetra. Sed vestibulum mauris vitae convallis tincidunt. Proin vehicula nunc id tempus dignissim. Donec vitae condimentum arcu. In volutpat aliquet aliquet. Sed posuere vel lectus vitae interdum. Aenean nec fermentum purus. Integer pellentesque egestas arcu non condimentum. Maecenas non purus id enim sollicitudin auctor gravida eget purus.
			</p>
			</div>
			<div class="col-md-2">Top lista</div>
		</div>
		<div class="col-md-9 col-md-push-2 col-tborder">footer</div>
</body>
</html>