@extends('layouts.admin')

@section('styles')
<link href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
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
						<span class="m-nav__link-text">All Testimonials</span>
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
											<a href="{{ url('admin/testimonials/create') }}" class="btn btn-primary m-btn m-btn--pill m-btn--custom m-btn--icon m-btn--air">
												<span>
													<i class="la la-plus"></i>
													<span>New Testimonial</span>
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
											<th>Logo</th>
											<th>Client</th>
											<th>Name</th>
											<th>Created at</th>
											<th>Updated at</th>
											<th>Actions</th>

										</tr>
									</thead>
									<tbody>
										@if($testimoni)
										@foreach($testimoni as $testi)
										<tr>
											<td>{{$testi->id}}</td>
											<td><img height="50" src="{{url($testi->photo->file)}}"></td>
											<td>{{$testi->client}}</td>
											<td>{{$testi->name}}</td>
											<td>{{$testi->created_at->diffForHumans()}}</td>
        									<td>{{$testi->updated_at->diffForHumans()}}</td>
        									<td>
        										<a href="{{route('admin.testimonials.edit', $testi->id)}}" ><button style="color:white;" class="btn m-btn--pill btn-info "><i class="fa fa-edit"></i>Edit</button></a>
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