@extends('layouts.essence-t')
@section('header')
<title>Portofolio - Essence creative | Creative Agency</title>
@stop
@section('content')
<div class="section pt-10 pb-5">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="text-center">
					<h2 class="fz-40 pf-font italic fw-light">our</h2>
					<h2 class="fz-80 fw-600">WORKS</h2>
					<h2 class="fz-80 fw-light pb-4">x</h2>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section mb-10">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="tm-grid-wrapper" data-type="masonry" data-xs-columns="1" data-sm-columns="2" data-lg-columns="3" data-gutter="15">
					<div class="tm-grid has-animation">
						<div class="grid-sizer"></div>
						@if($portofolio)
						@foreach($portofolio as $porto)

	    					<div class="portfolio-item grid-item masonry-item">
								<div class="media">
									<img src="{{ url($porto->thumbnail_image->file) }}" alt="" />
									<div class="overlay-wrapper">
										<div class="overlay"></div>
											<div class="popup">
												<div class="popup-inner">
													<a href="{{route('portofolio.single', $porto->slug)}}">
														<i class="pe-7s-search"></i>
													</a>
												</div>
											</div>
									</div>
								</div>
								<div class="content">
									<h3><a href="{{route('portofolio.single', $porto->slug)}}">{{$porto->title}}</a></h3>
									<div class="cate"><a href="{{route('portofolio.single', $porto->slug)}}">{{$porto->category}}</a></div>
								</div>
							</div>
						@endforeach
						@endif


						

					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="call-to-action pt-7 pb-6">
					<div class="row">
						<div class="col-sm-8">
							<h2 class="fz-32 mb-0">Are you ready to collaborate?</h2>
							<div class="mb-3 d-block d-md-block d-lg-none"></div>
						</div>
						<div class="col-sm-4">
							<a href="{{route('services')}}" class="btn btn-rounded btn-dark mb-2"><span>VIEW OUR SERVICES</span></a>&nbsp;&nbsp;
							<a href="{{route('contact')}}" class="btn btn-rounded btn-bg-dark mb-2"><span>CONTACT US</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop