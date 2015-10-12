@extends('app')

@section('content')


					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

			<div class="panel panel-default">
				<div class="panel-heading">Edit Blog - {{ $blog->title }}</div>
				<div class="panel-body">
					
						{!! Form::model($blog, ['url' => '/blogs/' . $blog->id, 'method' => 'put', 'class' => 'form-horizontal'] ) !!}

						@include('partials.blogs.create_form')

						<div class="form-group">
						
							<div class="col-md-6 col-md-offset-4">
								
								{!! Form::submit('Edit Blog', ['class' => 'btn btn-primary']) !!}
								
							</div>
						
						</div>
						
						{!! Form::close() !!}
						
				</div>
			</div>
		
	
	

@endsection