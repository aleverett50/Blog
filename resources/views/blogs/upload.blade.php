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
				<div class="panel-heading">Upload Blog Image</div>
				<div class="panel-body">
					
						{!! Form::open(['url' => '/blogs/'.$id.'/upload', 'class' => 'form-horizontal', 'files' => true]) !!}

						<div class="form-group">
						
							{!! Form::label('image', 'Upload Image', array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
							
								{!! Form::file('image', null, ['class' => 'form-control']) !!}
								
							</div>
						</div>

						<div class="form-group">
						
							<div class="col-md-6 col-md-offset-4">
								
								{!! Form::submit('Upload Image', ['class' => 'btn btn-primary']) !!}
								
							</div>
						
						</div>
						
						{!! Form::close() !!}
						
				</div>
			</div>
		
	
	

@endsection