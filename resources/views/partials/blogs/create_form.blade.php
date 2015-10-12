						<div class="form-group">
						
							{!! Form::label('title', 'Title', array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
							
								{!! Form::text('title', null, ['class' => 'form-control']) !!}
								
							</div>
						</div>
						
						<div class="form-group">
						
							{!! Form::label('blog_category_id', 'Blog Category', array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
							
							{!! Form::select('blog_category_id', $blog_categories, null, ['class' => 'form-control']) !!}
								
							</div>
						</div>
						
						<div class="form-group">
						
							{!! Form::label('blog_text', 'Blog Text', array('class' => 'col-md-4 control-label')) !!}
							
							<div class="col-md-6">
							
								{!! Form::textarea('blog_text', null, ['class' => 'form-control', 'rows' => '5']) !!}
								
							</div>
						</div>