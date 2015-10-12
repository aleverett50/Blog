@extends('app')

@section('content')

	<h1>My Blogs</h1>
	
	<div class="table-responsive">
	
	<table class="table table-striped table-hover">
	
	<tr><td><strong>Created</strong></td><td><strong>Blog Title</strong></td><td><strong>Category</strong></td><td><strong>Action</strong></td></tr>

	@foreach($blogs as $blog)
	
	<tr><td>{{ $blog->created_at }}</td><td>{{ $blog->title }}</td><td>{{ $blog->blog_category->title }}</td><td><a class="btn btn-primary" href="{{url('blogs/'.$blog->id.'/edit')}}">Edit</a></td></tr>
		
	
	@endforeach
	
	</table>
	
	</div>
	

@endsection