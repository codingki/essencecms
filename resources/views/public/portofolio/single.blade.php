@extends('layouts.essence-nt')
@section('header')
<title>{{$porto->title}} - Essence creative &#8211;| Creative Agency</title>
@stop
@section('content')
<div class="section section-cover section-bg-54 pt-9 pb-6 mb-0">
	<div class="container">
		<div class="row">
			<div class="col-lg-5">

				<h2 class="fz-32 mb-3 white">{{$porto->title}}</h2>
			</div>
		</div>
	</div>
</div>

<div class="section bg-gray pt-4 pb-8">
	<div class="container">
		<div class="row">
<div class="col-sm-12 text-center mb-2">
<img style="height:200px;" src="{{ url($porto->photo->file) }}" alt="">

</div>
			<div class="col-sm-8">

				<h2 class="fz-24 mb-2">ABOUT THE PROJECT</h2>
				{!! $porto->description !!}
			</div>
			<div class="col-sm-4">
				<div class="portfolio-info">
					<ul>
						<li><span>Date:</span> {{$porto->month}}</li>
						<li><span>Client:</span> {{$porto->title}}</li>
						<li><span>Category:</span> <a href="">{{$porto->category}}</a>
						<li>
							<div class="share">
								<span>Social Media: </span>
								<a class="social" target="_blank" href="http://instagram.com/keyfit__"><i class="fa fa-instagram"></i></a>

							</div>
						</li>

					</ul>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="section mb-2 mt-8">
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
				<div class="tm-grid-wrapper" data-type="masonry" data-xs-columns="1" data-sm-columns="2" data-lg-columns="4" data-gutter="30">
					<div class="tm-grid has-animation">
						<div class="grid-sizer"></div>
						@foreach(unserialize($porto->photos) as $a)
    					<div class="portfolio-item grid-item masonry-item">
							<div class="media">
								<img src="{{ url(App\Photo::findOrFail($a)->file ) }}" alt="" />
								<div class="overlay-wrapper">
									<div class="overlay"></div>
									<div class="popup">
										<div class="popup-inner">
											<a class="prettyphoto" data-rel="prettyPhoto[gallery]" href="{{ url(App\Photo::findOrFail($a)->file ) }}">
												<i class="pe-7s-search"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="content">
								<h3><a href="#">Visual Content</a></h3>
								<div class="cate"><a href="#"></a></div>
							</div>
						</div>
						@endforeach

    

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