@extends('layouts.admin')

@section('content')
<div class="m-grid__item m-grid__item--fluid m-wrapper">

							
							<div class="m-content">
								<div class="row">
									<div class="col-lg-4">
										<div class="m-portlet m-portlet--full-height   m-portlet--rounded">
											<div class="m-portlet__body">
												<div class="m-card-profile">
													<div class="m-card-profile__title m--hide">
														Your Profile
													</div>
													<div class="m-card-profile__pic">
														<div class="m-card-profile__pic-wrapper">
															<img src="{{$profile->photo ? URL::asset($profile->photo->file) : 'http://placehold.it/400x400'}}" alt="" />
														</div>
													</div>
													<div class="m-card-profile__details">
														<span class="m-card-profile__name">{{ $profile->name }}</span>
														<a href="" class="m-card-profile__email m-link">{{ $profile->email }}</a>
													</div>
												</div>
												
												<div class="m-portlet__body-separator"></div>
												<div class="m-widget1 m-widget1--paddingless">
													<div class="m-widget1__item">
														<div class="row m-row--no-padding align-items-center">
															<div class="col">
																<h3 class="m-widget1__title">Posts</h3>
																<span class="m-widget1__desc">Total Posts</span>
															</div>
															<div class="col m--align-right">
																<span class="m-widget1__number m--font-brand">200</span>
															</div>
														</div>
													</div>
													
												</div>
											</div>
										</div>
									</div>
									<div class="col-lg-8">
										<div class="m-portlet m-portlet--full-height m-portlet--tabs   m-portlet--rounded">
											<div class="m-portlet__head">
												<div class="m-portlet__head-tools">
													<ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
														<li class="nav-item m-tabs__item">
															<a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
																<i class="flaticon-share m--hide"></i>
																Update Profile
															</a>
														</li>
														
													</ul>
												</div>
												
											</div>
											<div class="tab-content">
												<div class="tab-pane active" id="m_user_profile_tab_1">
													{!! Form::model($profile,['class'=>'m-form m-form--fit m-form--label-align-right', 'method'=> 'PATCH', 'action' => ['ProfileController@update', $profile->id], 'files'=>true]) !!}
													<div class="form-group m-form__group row">
														<div class="col-10 ml-auto">
															<h3 class="m-form__section">Personal Details</h3>
														</div>
													</div>
													<div class="m-portlet__body">
														<div class="form-group m-form__group row">
															<label for="example-text-input" class="col-2 col-form-label">Full Name</label>
															<div class="col-7">
																{!! Form::text('name', null, ['class'=>'form-control m-input']) !!}
															</div>
														</div>
													</div>
											        <div class="m-portlet__body">
														<div class="form-group m-form__group row">
															<label for="example-text-input" class="col-2 col-form-label">Email</label>
															<div class="col-7">
																{!! Form::email('email', null, ['class'=>'form-control m-input']) !!}
															</div>
														</div>
													</div>
													<div class="m-portlet__body">
														<div class="form-group m-form__group row">
															<label for="example-text-input" class="col-2 col-form-label">Short Bio</label>
															<div class="col-7">
																{!! Form::text('bio', null, ['class'=>'form-control m-input']) !!}
															</div>
														</div>
													</div>
													<div class="m-portlet__body">
														<div class="form-group m-form__group row">
															<label for="example-text-input" class="col-2 col-form-label">Avatar</label>
															<div class="col-7">
																{!! Form::file('photo_id', null, ['class'=>'form-control m-input']) !!}
															</div>
														</div>
													</div>
													<div class="m-portlet__body">
														<div class="form-group m-form__group row">
															<label for="example-text-input" class="col-2 col-form-label">Password</label>
															<div class="col-7">
																{!! Form::password('password',  ['class'=>'form-control m-input']) !!}
															</div>
														</div>
													</div>
													

													<div class="form-group m-form__group row">
														<div class="col-10 ml-auto">
															<h3 class="m-form__section">Social Links</h3>
														</div>
													</div>
													<div class="m-portlet__body">
														<div class="form-group m-form__group row">
															<label for="example-text-input" class="col-2 col-form-label">Facebook</label>
															<div class="col-7">
																{!! Form::text('facebook', null, ['class'=>'form-control m-input']) !!}
															</div>
														</div>
													</div>
													<div class="m-portlet__body">
														<div class="form-group m-form__group row">
															<label for="example-text-input" class="col-2 col-form-label">Instagram</label>
															<div class="col-7">
																{!! Form::text('instagram', null, ['class'=>'form-control m-input']) !!}
															</div>
														</div>
													</div>
													<div class="m-portlet__body">
														<div class="form-group m-form__group row">
															<label for="example-text-input" class="col-2 col-form-label">Twitter</label>
															<div class="col-7">
																{!! Form::text('twitter', null, ['class'=>'form-control m-input']) !!}
															</div>
														</div>
													</div>
													<div class="m-portlet__body">
														<div class="form-group m-form__group row">
															<label for="example-text-input" class="col-2 col-form-label">Linkedin</label>
															<div class="col-7">
																{!! Form::text('linkedin', null, ['class'=>'form-control m-input']) !!}
															</div>
														</div>
													</div>

													<div class="m-portlet__foot m-portlet__foot--fit">
														<div class="m-form__actions">
															<div class="row">
																<div class="col-2">
																</div>
																<div class="col-7">
																	{!! Form::submit('Save Changes', ['class'=>'btn btn-accent m-btn m-btn--air m-btn--custom']) !!}
																</div>
															</div>
														</div>
													</div>
											        
											        {!! Form::close() !!}

											    







												</div>
												
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
@stop