@extends('layouts.admin')

@section('sub-header')
<div class="m-subheader ">
	<div class="d-flex align-items-center">
		<div class="mr-auto">
			<h3 class="m-subheader__title m-subheader__title--separator">Dashboard</h3>
			<ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
				<li class="m-nav__item m-nav__item--home">
					<a href="#" class="m-nav__link m-nav__link--icon">
						<i class="m-nav__link-icon la la-home"></i>
					</a>
				</li>
				<li class="m-nav__separator">-</li>
				<li class="m-nav__item">
					<a href="" class="m-nav__link">
						<span class="m-nav__link-text">Actions</span>
					</a>
				</li>
				<li class="m-nav__separator">-</li>
				<li class="m-nav__item">
					<a href="" class="m-nav__link">
						<span class="m-nav__link-text">Generate Reports</span>
					</a>
				</li>
			</ul>
		</div>
		
	</div>
</div>
@stop

@section('content')
<div class="row ">
	
	<div class="col-md-12 m-portlet">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					
					<h3 class="m-portlet__head-text">
						Pageviews this week 
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<canvas id="week" height="50"></canvas>
		</div>
	</div>
	<div class="col-md-12 m-portlet">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					
					<h3 class="m-portlet__head-text">
						Pageviews this month
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<canvas id="month" height="50"></canvas>
		</div>
	</div>
	<div class="col-md-6 m-portlet">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					
					<h3 class="m-portlet__head-text">
						Top 5 Post views
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<table class="table table-striped- table-bordered table-hover table-checkable">
				<thead>
					<tr>
						<th>Title</th>
						<th>Author</th>
						<th>Views</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($post as $a)
					<tr>
						<td>{{$a->id}}</td>
						<td>{{$a->user->name}}</a></td>
						<td>{{$a->views_count}}</td>
						<td>
							<a href="{{route('blog.single', $a->slug)}}" target="_blank" style="color:white;"><button  class="btn m-btn--pill btn-success "><i class="fa fa-eye"></i>View</button></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>

	<div class="col-md-6 m-portlet">
		<div class="m-portlet__head">
			<div class="m-portlet__head-caption">
				<div class="m-portlet__head-title">
					
					<h3 class="m-portlet__head-text">
						Top 5 Portofolio views
					</h3>
				</div>
			</div>
		</div>
		<div class="m-portlet__body">
			<table class="table table-striped- table-bordered table-hover table-checkable">
				<thead>
					<tr>
						<th>Logo</th>
						<th>Client</th>
						<th>Views</th>
						<th>Actions</th>
					</tr>
				</thead>
				<tbody>
					@foreach($porto as $b)
					<tr>
						<td>{{$b->id}}</td>
						<td><img height="50" src="{{ url($b->photo->file) }}"></a></td>
						<td>{{$b->views_count}}</td>
						<td>
							<a href="{{route('blog.single', $b->slug)}}" target="_blank" style="color:white;"><button  class="btn m-btn--pill btn-success "><i class="fa fa-eye"></i>View</button></a>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
	
</div>

@stop

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js" type="text/javascript"></script>
<script>
{!!json_encode($analyticsData)!!}
var ctx = document.getElementById("week").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [

            		@foreach($analyticsData as $b)
            			"{{date('D', strtotime($b['date']->date))}}",
					@endforeach
					],
        datasets: [{
            label: 'Pageviews this week',
            data: [
            		@foreach($analyticsData as $a)
						{{$a['pageViews'].',' }}
					@endforeach
					]
					,
           
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});


</script>
<script type="text/javascript">
{!!json_encode($month)!!}
var ctx = document.getElementById("month").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: [

            		@foreach($month as $b)
            			"{{date('d M', strtotime($b['date']->date))}}",
					@endforeach
					],
        datasets: [{
            label: 'Pageviews this Month',
            data: [
            		@foreach($month as $a)
						{{$a['pageViews'].',' }}
					@endforeach
					]
					,
           
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        }
    }
});
</script>
@stop