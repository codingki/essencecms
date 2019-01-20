@extends('layouts.admin')

@section('styles')
<link href="{{ asset('assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@stop
@section('sub-header')
<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h3 class="m-subheader__title m-subheader__title--separator">Users</h3>
			<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
				
				<li class="m-nav__separator">-</li>
				<li class="m-nav__item">
					<a href="" class="m-nav__link">
						<span class="m-nav__link-text">All Users</span>
					</a>
				</li>
				
			</ul>
		</div>
		
	</div>
</div>
@stop


@section('content')
<div class="m-portlet m-portlet--mobile">
							
							<div class="m-portlet__body">

								<!--begin: Datatable -->
								<table class="table table-striped- table-bordered table-hover table-checkable" id="nice">
									<thead>
										<tr>
											<th>ID</th>
											<th>Avatar</th>
											<th>Name</th>
											<th>Email</th>
											<th>Role</th>
											<th>Status</th>
											<th>Created at</th>
											<th>Actions</th>

										</tr>
									</thead>
									<tbody>
										@if($users)
										@foreach($users as $user)
										<tr>
											<td>{{ $user->id }}</td>
											<td><img height="50" src="{{ $user->photo ? URL::asset( $user->photo->file) : 'http://placehold.it/400x400'}}"></td>
											<td>{{ $user->name }}</td>
        									<td>{{ $user->email }}</td>
        									<td>{{ $user->role->name }}</td>
        									<td>{{ $user->is_active ? 'Active' : 'Not Active' }}</td>
											<td>{{$user->created_at->diffForHumans()}}</td>
											<td>
												@if($user->is_active == 0)
													<a href="{{ route('admin.users.updateActive', $user->id) }}" style="color:white;">
														<button class="btn m-btn--pill btn-success">
															<i class='fa fa-check'></i> Activate
														</button>
													</a>
													@else
													<a href="{{ route('admin.users.updateActive', $user->id) }}" style="color:white;">
														<button class="btn m-btn--pill btn-danger">
														 	<i class='fa fa-times'></i> Deactivate
														</button>
													</a>
												@endif

												@if($user->role_id == 2)
													<a href="{{ route('admin.users.updateAdmin', $user->id) }}" style="color:white;">
														<button class="btn m-btn--pill btn-success">
															Jadikan seorang Admin 
														</button>
													</a>	
													@else
													<a href="{{ route('admin.users.updateAdmin', $user->id) }}" style="color:white;">
														<button class="btn m-btn--pill btn-info">
															Jadikan seorang Author
														</button>
													</a>
												@endif
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