@extends('layouts.essence-t')

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
	    					<div class="portfolio-item grid-item masonry-item">
								<div class="media">
									<img src="images/portofoliosonja.png" alt="" />
									<div class="overlay-wrapper">
										<div class="overlay"></div>
											<div class="popup">
												<div class="popup-inner">
													<a href="sonja">
														<i class="pe-7s-search"></i>
													</a>
												</div>
											</div>
									</div>
								</div>
								<div class="content">
									<h3><a href="sonja">Sonja</a></h3>
									<div class="cate"><a href="sonja">Social Media, Visual Content, Video Commercial</a></div>
								</div>
							</div>

						<div class="portfolio-item grid-item masonry-item">
							<div class="media">
								<img src="images/portofoliomeatngrill.png" alt="" />
								<div class="overlay-wrapper">
									<div class="overlay"></div>
									<div class="popup">
										<div class="popup-inner">
											<a href="meatngrill">
												<i class="pe-7s-search"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="content">
								<h3><a href="meatngrill">Meat n grill malang</a></h3>
								<div class="cate"><a href="meatngrill">Social Media, Visual Content</a></div>
							</div>
						</div>

						<div class="portfolio-item grid-item masonry-item">
							<div class="media">
								<img src="images/portofoliokeyfit.png" alt="" />
								<div class="overlay-wrapper">
									<div class="overlay"></div>
									<div class="popup">
										<div class="popup-inner">
											<a href="keyfit">
												<i class="pe-7s-search"></i>
											</a>
										</div>
									</div>
								</div>
							</div>
							<div class="content">
								<h3><a href="keyfit">Keyfit</a></h3>
								<div class="cate"><a href="keyfit">Social Media, Visual Content</a></div>
							</div>
						</div>

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
							<a href="services" class="btn btn-rounded btn-dark mb-2"><span>VIEW OUR SERVICES</span></a>&nbsp;&nbsp;
							<a href="contact" class="btn btn-rounded btn-bg-dark mb-2"><span>CONTACT US</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@stop