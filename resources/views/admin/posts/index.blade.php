@extends('layouts.admin')

@section('styles')
<link href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
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
						<span class="m-nav__link-text">All Posts</span>
					</a>
				</li>
				
			</ul>
		</div>
		
	</div>
</div>
@stop


@section('content')
<div class="m-portlet m-portlet--mobile">
							<div class="m-portlet__head">
								<div class="m-portlet__head-tools">
									<ul class="m-portlet__nav">
										<li class="m-portlet__nav-item">
											<a href="{{ url('admin/categories') }}" class="btn btn-success m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
												<span>
													<span>Categories</span>
												</span>
											</a>
										</li>
										
									</ul>
								</div>
								<div class="m-portlet__head-tools">
									<ul class="m-portlet__nav">
										<li class="m-portlet__nav-item">
											<a href="{{ url('admin/posts/create') }}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
												<span>
													<i class="la la-plus"></i>
													<span>New Post</span>
												</span>
											</a>
										</li>
										
									</ul>
								</div>
							</div>
							<div class="m-portlet__body">

								<!--begin: Datatable -->
								<table class="table table-striped- table-bordered table-hover table-checkable" id="nice">
									<thead>
										<tr>
											<th>ID</th>
											<th>Author</th>
											<th>Category</th>
											<th>Title</th>
											<th>Created at</th>
											<th>Updated at</th>
											<th>Actions</th>

										</tr>
									</thead>
									<tbody>
										@if($posts)
										@foreach($posts as $post)
										<tr>
											<td>{{$post->id}}</td>
											<td>{{$post->user->name}}</td>
											<td>{{$post->category->name}}</td>
											<td>{{$post->title}}</td>
											<td>{{$post->created_at->diffForHumans()}}</td>
        									<td>{{$post->updated_at->diffForHumans()}}</td>
											<td><a href="{{route('admin.posts.edit', $post->id)}}" style="color:white;"><button  class="btn m-btn--pill btn-info "><i class="fa fa-edit"></i>Edit</button></a>
												<a href="{{route('blog.single', $post->slug)}}" target="_blank" style="color:white;"><button  class="btn m-btn--pill btn-success "><i class="fa fa-eye"></i>View</button></a>
											</td>
											
										</tr>
										@endforeach
										@endif
									</tbody>
								</table>
							</div>
						</div>

@stop

@section('scripts')
<!--begin::Page Vendors -->
		<script src="{{ asset('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript"></script>

		<!--end::Page Vendors -->
<script type="text/javascript">$(document).ready( function () {
    $('#nice').DataTable();
} );</script>
@stop