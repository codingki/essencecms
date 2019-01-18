@extends('layouts.admin')
@section('sub-header')
<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h3 class="m-subheader__title m-subheader__title--separator">Posts</h3>
			<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
				
				<li class="m-nav__separator">-</li>
				<li class="m-nav__item">
					<a href="" class="m-nav__link">
						<span class="m-nav__link-text">Edit Post</span>
					</a>
				</li>
				
			</ul>
		</div>
		
	</div>
</div>
@stop

@section('content')

{!! Form::model($post, ['method'=> 'PATCH', 'action' => ['PostsController@update', $post->id], 'files'=>true]) !!}
<div class="form-group">
    {!! Form::label('title', 'Title') !!}
    {!! Form::text('title', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('category_id', 'Category') !!}
    {!! Form::select('category_id', [''=> 'Choose Categories'] + $categories,null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('photo_id', 'Thumbnail') !!}
    <br>
    <img src="{{url($post->photo->file)}}" width="100%">
    {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::label('body', 'Content') !!}
    {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
</div>


<div class="form-group">
    {!! Form::submit('Edit Post', ['class'=>'btn btn-primary pull-left']) !!}
</div>
{!! Form::close() !!}
{!! Form::open(['method'=> 'DELETE', 'action' => ['PostsController@destroy', $post->id ]]) !!}
    <div class="form-group">
        {!! Form::submit('Delete Post', ['class' => 'btn btn-danger pull-right']) !!}
    </div>
{!! Form::close() !!}
<div style="clear:both; "></div>
@stop