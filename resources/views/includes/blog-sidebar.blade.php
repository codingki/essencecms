<div class="col-lg-3">
	<div class="sidebar">
		<div class="widget widget-recent-entries">
			<h3 class="widget-title">Recent Posts</h3>
			<ul>
				@foreach($recent as $post)
				<li>
					<a href="{{route('blog.single', $post->slug)}}">{{$post->title}}</a>
					<span class="post-date">{{ date('F d, Y', strtotime($post->created_at)) }}</span>
				</li>
				@endforeach
				
			</ul>
		</div>
		<div class="widget widget-recent-entries">
			<h3 class="widget-title">Top Posts</h3>
			<ul>
				@foreach($top as $post)
				<li>
					<a href="{{route('blog.single', $post->slug)}}">{{$post->title}}</a>
					<span class="post-date">{{ date('F d, Y', strtotime($post->created_at)) }}</span>
				</li>
				@endforeach
				
			</ul>
		</div>
		
	</div>
</div>