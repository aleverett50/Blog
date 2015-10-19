@extends('app')

@section('content')

	<h1>Dashboard - Hello {{ Auth::user()->first_name }}</h1>
	
	<br /><br />

<div class="row">

                <div class="col-lg-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="fa fa-comments fa-3x"></i>		<!-- fa-3x means 3em making it 3 times bigger than normal -->
                                </div>
                                <div class="col-xs-8 text-right">
                                    <div class="huge">{{ $blog_count }}</div>	<!--  $blog_count comes from CountBlogsComposer -->
                                    <div>Blogs</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('dashboard/blogs') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                
</div>


@endsection