@extends('layouts.admin')
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
<div class="form-group">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('photo_id', 'Logo') !!}
    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('client', 'Client/Brand') !!}
    {!! Form::text('client', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('body', 'Testimoni') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::submit('Edit Testimonial', ['class'=>'btn btn-primary pull-left']) !!}
</div>
{!! Form::close() !!}
{!! Form::open(['method'=> 'DELETE', 'action' => ['testimonialController@destroy', $testimoni->id ]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete Testimoni', ['class' => 'btn btn-danger pull-right']) !!}
    </div>
{!! Form::close() !!}
<div style="clear:both; "></div>
@stop