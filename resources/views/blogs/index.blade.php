@extends('app')

@section('content')

	<h1>Blogs</h1>
	
	@foreach($blogs as $blog)
	
		<h2>{{ $blog->title }}</h2>
		
		<h3>Category: {{ $blog->blog_category->title }}</h3>
		
		<p>{{ $blog->blog_text }}</p>
		
		<p>Posted On: {{ $blog->created_at }} <br /> by {{ $blog->user->first_name.' '.$blog->user->last_name }}</p>
		
		<a class="btn btn-info" href="{{ url('/blog/'.$blog->id.'') }}">View</a>
		
		<hr />
		
	
	@endforeach
	
	
	

@endsection