@extends('layouts.admin')
@section('styles')
<link href="{{ asset('css/slim.min.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('sub-header')
<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h3 class="m-subheader__title m-subheader__title--separator">Posts</h3>
			<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
				
				<li class="m-nav__separator">-</li>
				<li class="m-nav__item">
					<a href="" class="m-nav__link">
						<span class="m-nav__link-text">Create Post</span>
					</a>
				</li>
				
			</ul>
		</div>
		
	</div>
</div>
@stop

@section('content')

{!! Form::open(['method'=> 'POST', 'action' => 'PostsController@store', 'files'=>true]) !!}
<div class="row">
	<div class="col-md-6">
		<div class="form-group">
		    {!! Form::label('title', 'Title') !!}
		    {!! Form::text('title', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
		    {!! Form::label('category_id', 'Category') !!}
		    {!! Form::select('category_id', [''=> 'Choose Categories'] + $categories,null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
		    {!! Form::label('status', 'Status') !!}
		    {!! Form::select('status', array( 0 => 'Draft', 1=> 'Publish'), null , ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
		    {!! Form::label('tags', 'Tags') !!}
		    {!! Form::textarea('tags', null, ['class'=>'form-control','rows' => 9 ]) !!}
		</div>

	</div>
	<div class="col-md-6">	
		<div class="form-group">
		    <div class="slim"
		         data-label="Thumbnail"
		         
		         data-size="400,300"
		         data-ratio="4:3">
		        <input type="file" name="slim[]" required />
		        
		    </div>
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
		    {!! Form::label('body', 'Content') !!}
		    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group pull-right">
		    {!! Form::submit('Save Post', ['class'=>'btn btn-primary']) !!}
		</div>
	</div>
</div>
{!! Form::close() !!}
@stop
@section('scripts')
<!--begin::Page Vendors -->
		<script src="{{ asset('js/slim.kickstart.min.js') }}" type="text/javascript"></script>
@stop