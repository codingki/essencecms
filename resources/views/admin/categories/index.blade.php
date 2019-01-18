@extends('layouts.admin')
@section('sub-header')
<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h3 class="m-subheader__title m-subheader__title--separator">Categories</h3>
			<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
				
				<li class="m-nav__separator">-</li>
				<li class="m-nav__item">
					<a href="" class="m-nav__link">
						<span class="m-nav__link-text">All Category</span>
					</a>
				</li>
				
			</ul>
		</div>
		
	</div>
</div>
@stop

@section('content')
<div class="row">


<div class="col-sm-6">
	@if($categories)
	<table class="table table-striped- table-bordered table-hover table-checkable">
		<thead>
			<tr>
				<th>Id</th>
				<th>Name</th>
				<th>Created at</th>
				<th>Actions</th>
			</tr>
		</thead>
		<tbody>
			@foreach($categories as $category)
			<tr>
				<td>{{$category->id}}</td>
				<td>{{$category->name}}</a></td>
				<td>{{$category->created_at->diffForHumans()}}</td>
				<td><a href="{{route('admin.categories.edit', $category->id)}}"><i class="fa fa-edit"></i> Edit</a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	@endif
</div>

<div class="col-sm-6 box-form">
	
	{!! Form::open(['method'=> 'POST', 'action' => 'CategoryController@store']) !!}
	
	<div class="m-portlet__body">
		<div class="form-group m-form__group ">
			<label for="example-text-input" class=" col-form-label">Name of the category</label>
			<div class="">
				{!! Form::text('name', null, ['class'=>'form-control m-input']) !!}
			</div>
		</div>
	</div>
	
	<div class="form-group">
	    {!! Form::submit('Create Category', ['class'=>'btn btn-primary pull-right']) !!}
	</div>
	{!! Form::close() !!}
</div>
</div>
@stop