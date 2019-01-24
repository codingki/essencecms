@extends('layouts.blog')
@section('header')
<title>{{$cat->name}} - Essence creative &#8211;| Creative Agency</title>
@stop
@section('content')
<div class="section section-cover section-bg-54 pt-9 pb-6">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">
				
				<h2 class="fz-32 mb-3 white"><b>{{$cat->name}}</b></h2>
			</div>
		</div>
	</div>
</div>
<div class="section bg-gray pt-10 pb-10">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<div class="row">
					@if(@blogs)
					@foreach($blogs as $blog)
					<div class="col-lg-6 col-md-6">
						<div class="blog-item style-1 mb-3">
							<div class="blog-item-wrapper">
								<div class="media-wrapper">
									<div class="media">
										<a href="{{route('blog.single', $blog->slug)}}"><img src="{{ url($blog->photo->file) }}" alt="" /></a>
									</div>
									
								</div>
								<div class="content">
									<div class="cate">
										{{ date('F d, Y', strtotime($blog->created_at)) }} / <a href="{{route('blog.category', $blog->category->slug)}}">{{ $blog->category->name}}</a>
									</div>
									<h3><a href="{{route('blog.single', $blog->slug)}}">{{ $blog->title }}</a></h3>
									{!! str_limit($blog->body, 30) !!}
									
								</div>
							</div>
						</div>
					</div>
					@endforeach
					@endif
					
					
				</div>
				<div class="pagination text-center">
					
					{{$blogs->links()}}
				</div>
			</div>
			@include('includes.blog-sidebar')
		</div>
	</div>
</div>
@stop