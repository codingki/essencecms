@extends('layouts.essence-nt')
@section('header')
<title>Contact - Essence creative &#8211;| Creative Agency</title>
@stop
@section('content')
<div class="section section-cover section-bg-54 pt-9 pb-6 mb-6">
					<div class="container">
						<div class="row">
							<div class="col-lg-5">

								<h2 class="fz-32 mb-3 white">CONTACT US</h2>
							</div>
						</div>
					</div>
				</div>
				<div class="section pb-6">
					<div class="container">
						<div class="row">
							<div class="col-sm-4">
								<i class="pe-7s-phone fz-30"></i>&nbsp;&nbsp;
								<span class="fz-18 pr-3">085799386600</span>
							</div>
							<div class="col-sm-4">
								<i class="pe-7s-map-2 fz-30"></i>&nbsp;&nbsp;
								<span class="fz-18 pr-3">Malang, Indonesia</span>
							</div>
							<div class="col-sm-4">
								<i class="pe-7s-mail-open-file fz-30"></i>&nbsp;&nbsp;
								<span class="fz-18 pr-0"><a href="mailto:essencecreativelab@gmail.com">essencecreativelab@gmail.com</a></span>
							</div>
						</div>
					</div>
				</div>
				<div class="section bg-gray">
					<div class="container-fluid">
						<div class="row">
							<div class="col-lg-6 p-0">
								<div id="map" data-marker-image="{{url('images/map-marker.png')}}"></div>
							</div>
							<div class="col-lg-6">
								<div class="row">
									<div class="col-lg-8 col-md-11 col-12 pt-7 pl-7 pb-7">
										<h2 class="section-title fz-32 mb-3"><b>CONTACT</b> US</h2>
										<form>
											<div class="row">
												<div class="col-md-6">
													<input type="text" name="your-name" value="" size="40" class="form-control" placeholder="Your name here">
												</div>
												<div class="col-md-6">
													<input type="email" name="your-email" value="" size="40" class="form-control" placeholder="Your email">
												</div>
												<div class="col-md-12">
													<input type="text" name="your-subject" value="" size="40" class="form-control" placeholder="Subject">
												</div>
												<div class="col-md-12">
													<textarea name="your-message" cols="40" rows="10" class="form-control" placeholder="Your message"></textarea>
												</div>
												<div class="col-md-12">
													<input type="submit" value="Send Message" class="form-submit">
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			
@stop