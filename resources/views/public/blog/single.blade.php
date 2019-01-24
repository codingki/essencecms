@extends('layouts.blog')
@section('header')
<title>{{$blog->title}} - Essence creative &#8211;| Creative Agency</title>
@stop
@section('content')
<div class="section bg-gray pt-10 pb-10">
	<div class="container">
		<div class="row">
			<div class="col-lg-9">
				<div class="blog-item style-3 mb-0">
					<div class="post-thumb">
						<div class="dates">
							<div>
								<span>{{ date('d F Y', strtotime($blog->created_at)) }}</span>
							</div>
						</div>
						<img src="{{url($blog->photo->file)}}" alt="" />
					</div>
					<div class="entry-meta">
						<div class="container row">
							<div class="info col-lg-10 col-md-9">
								<span class="author vcard"><i class="fa fa-user"></i> Posted by {{ $blog->user->name }}</span>
								<span class="categories-links"><i class="fa fa-folder"></i> In <a href="{{route('blog.category', $blog->category->slug)}}">{{ $blog->category->name}}</a></span>
								
							</div>
							<div class="share col-lg-2 col-md-3">
								<span><a target="_blank" href="#"><i class="fa fa-facebook"></i></a></span>
								<span><a target="_blank" href="#"><i class="fa fa-twitter"></i></a></span>
								<span><a target="_blank" href="#"><i class="fa fa-google-plus"></i></a></span>
							</div>
						</div>
					</div>
					<div class="entry-header">
						<h2 class="entry-title"><a href="#">{{$blog->title}}</a></h2>
					</div>
					<div class="entry-content">
						{!! $blog->body !!}
					</div>
					<div class="entry-footer">
						TAGS: 
						@if($blog->tags)
						@foreach(explode(',',$blog->tags) as $tag)
						<a href="#">{{$tag}}</a>
						@endforeach
						@endif
					</div>
				</div>
				<div class="author-info">
					<div class="row">
						<div class="col-sm-3">
							<img alt="" src="{{ url($blog->user->photo->file) }}" />
						</div>
						<div class="col-sm-9">
							<h3>{{ $blog->user->name }}</h3>
							<p>{{ $blog->user->bio }}</p>
							<span><a target="_blank" href="#"><i style="color:white;" class="fa fa-facebook"></i></a></span>
							<span><a target="_blank" href="#"><i style="color:white;" class="fa fa-twitter"></i></a></span>
							<span><a target="_blank" href="#"><i style="color:white;" class="fa fa-google-plus"></i></a></span>
						</div>
					</div>
				</div>
				
			</div>
@include('includes.blog-sidebar')
		</div>
	</div>
</div>
@stop