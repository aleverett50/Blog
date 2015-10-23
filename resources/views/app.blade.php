<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Laravel</title>

	<link href="{{ asset('/css/app.css') }}" rel="stylesheet">
	<link href="{{ asset('/css/font-awesome.css') }}" rel="stylesheet">

	<!-- Fonts -->
	<link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
						<span class="sr-only">Toggle Navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div>

				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
					<ul class="nav navbar-nav">
						<li><a href="{{ url('/') }}">Home</a></li>
						
							<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Blogs</a>
								<ul class="dropdown-menu">
									<li><a href="{{ url('/blogs/') }}">All Blogs</a></li>
									<li><a href="{{ url('/blogs/animals') }}">Animals</a></li>
									<li><a href="{{ url('/blogs/movies') }}">Movies</a></li>
									<li><a href="{{ url('/blogs/music') }}">Music</a></li>
									<li><a href="{{ url('/blogs/travel') }}">Travel</a></li>
								</ul>
							</li>						

					</ul>

					<ul class="nav navbar-nav navbar-right">
						@if (Auth::guest())
							<li><a href="{{ url('/auth/login') }}">Login</a></li>
							<li><a href="{{ url('/auth/register') }}">Register</a></li>
						@else
							<li class="dropdown">
					<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->first_name }} <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
									<li><a href="{{ url('/dashboard/blogs/') }}">My Blogs</a></li>
									<li><a href="{{ url('/blogs/create') }}">Create</a></li>
									<li><a href="{{ url('/auth/logout') }}">Logout</a></li>
								</ul>
							</li>
							
						@endif
					</ul>
				</div>
			</div>
		</div>
	</nav>

<div class="container">

		<div class="row">

			<div class="col-md-9">
				
				@if(Session::has('success'))
				
				<div class="alert alert-success">{{ Session::get('success') }}</div>
				
				@endif

			@yield('content')

			</div>

			<div class="col-md-3 min-500">
			<h1>Recent Blogs</h1>

			@foreach($recent_blogs as $recent_blog)
			
			<li><a href="{{ url('blog/'.$recent_blog->id.'') }}">{{ $recent_blog->title }}</a> <br /> by {{ $recent_blog->user->first_name.' '.$recent_blog->user->last_name }}</li><br />
			
			@endforeach

			</div>

		</div>

</div>	
	
<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-8 padding-top-10">
				<p class="text-muted">Footer Content Here.</p>
			</div>
			<div class="col-md-4 padding-top-10">
				<p class="text-muted">Footer Content Here.</p>
			</div>
		</div>
	</div>
</footer>

	<script src="{{ url('/js/jquery-2.1.4.min.js') }}"></script>
	<script src="{{ url('/js/bootstrap.min.js') }}"></script>

</body>
</html>
