@extends('layouts.admin')
@section('sub-header')
<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h3 class="m-subheader__title m-subheader__title--separator">Portofolio</h3>
			<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
				
				<li class="m-nav__separator">-</li>
				<li class="m-nav__item">
					<a href="" class="m-nav__link">
						<span class="m-nav__link-text">Create Portofolio</span>
					</a>
				</li>
				
			</ul>
		</div>
		
	</div>
</div>
@stop

@section('content')

{!! Form::open(['method'=> 'POST', 'action' => 'PortofolioController@store', 'files'=>true]) !!}
<div class="row">
	<div class="col-md-12">
		<div class="form-group">
		    {!! Form::label('title', 'Client/Brand Name') !!}
		    {!! Form::text('title', null, ['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-md-12">
		<div class="form-group">
		    {!! Form::label('photo_id', 'Logo Brand') !!}
		    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
		</div>
	</div>	
	<div class="col-md-4">		
		<div class="form-group">
		    {!! Form::label('month', 'Month') !!}
		    {!! Form::text('month', null, ['class'=>'form-control']) !!}
		</div>
	</div>
	<div class="col-md-8">		
		<div class="form-group">
		    {!! Form::label('category', 'Category Project') !!}
		    {!! Form::text('category', null, ['class'=>'form-control']) !!}
		</div>
	</div>	
	<div class="col-md-6">
		<div class="form-group">
		    {!! Form::label('description', 'About the project') !!}
		    {!! Form::textarea('description', null, ['class'=>'form-control', 'rows' => 26]) !!}
		</div>
	</div>
	<div class="col-md-6">		
		<div class="form-group">
		    {!! Form::label('facebook', 'Facebook Link') !!}
		    {!! Form::text('facebook', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
		    {!! Form::label('instagram', 'Instagram Link') !!}
		    {!! Form::text('instagram', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
		    {!! Form::label('twitter', 'Twitter Link') !!}
		    {!! Form::text('twitter', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
		    {!! Form::label('linkedin', 'Linkedin Link') !!}
		    {!! Form::text('linkedin', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
		    {!! Form::label('youtube', 'Youtube Link') !!}
		    {!! Form::text('youtube', null, ['class'=>'form-control']) !!}
		</div>
		<div class="form-group">
		    {!! Form::label('website', 'Website Link') !!}
		    {!! Form::text('website', null, ['class'=>'form-control']) !!}
		</div>
	</div>

	<div class="col-md-12">
		<div class="form-group">
		    {!! Form::submit('Create Testimonial', ['class'=>'btn btn-primary']) !!}
		</div>
	</div>	
	
</div>
{!! Form::close() !!}
@stop