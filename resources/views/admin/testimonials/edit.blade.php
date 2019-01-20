@extends('layouts.admin')
@section('styles')
<link href="{{ asset('css/slim.min.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('sub-header')
<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h3 class="m-subheader__title m-subheader__title--separator">Testimonials</h3>
			<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
				
				<li class="m-nav__separator">-</li>
				<li class="m-nav__item">
					<a href="" class="m-nav__link">
						<span class="m-nav__link-text">Edit Testimonial</span>
					</a>
				</li>
				
			</ul>
		</div>
		
	</div>
</div>
@stop

@section('content')

{!! Form::model($testimoni, ['method'=> 'PATCH', 'action' => ['testimonialController@update', $testimoni->id], 'files'=>true]) !!}
<div class="row">
	
	<div class="col-md-6">		
		<div class="form-group">
		<label>Logo/Client Photo</label>
		    
			    <div class="slim"
			         data-label="Drop your image here"
			         
			         data-size="500,500"
			         data-ratio="1:1">
			        <input type="file" name="slim[]"/>
			        <img src="{{URL::asset( $testimoni->photo->file)}}">
			    </div>
			
		</div>
	</div>
	<div class="col-md-6">
		<div class="form-group">
		    {!! Form::label('name', 'Name') !!}
		    {!! Form::text('name', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
		    {!! Form::label('client', 'Client/Brand') !!}
		    {!! Form::text('client', null, ['class'=>'form-control']) !!}
		</div>

		<div class="form-group">
		    {!! Form::label('body', 'Testimoni') !!}
		    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group pull-right">
	    {!! Form::submit('Edit Testimonial', ['class'=>'btn btn-primary']) !!}
		</div>
	
{!! Form::close() !!}
{!! Form::open(['method'=> 'DELETE', 'action' => ['testimonialController@destroy', $testimoni->id ]]) !!}
	    <div class="form-group">
	        {!! Form::submit('Delete Testimoni', ['class' => 'btn btn-danger pull-left']) !!}
	    </div>
{!! Form::close() !!}
	</div>
</div>

@stop
@section('scripts')
<!--begin::Page Vendors -->
		<script src="{{ asset('js/slim.kickstart.min.js') }}" type="text/javascript"></script>
@stop