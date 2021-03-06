<li class="m-nav__item m-topbar__user-profile m-topbar__user-profile--img  m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--header-bg-fill m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light"
										 m-dropdown-toggle="click">
											<a href="#" class="m-nav__link m-dropdown__toggle">
												<span class="m-topbar__welcome m--hidden-tablet m--hidden-mobile">Hello,&nbsp;</span>
												<span class="m-topbar__username m--hidden-tablet m--hidden-mobile m--padding-right-15"><span class="m-link">{{ Auth::user()->name }}</span></span>
												<span class="m-topbar__userpic">
													<img src="{{ Auth::user()->photo ? URL::asset( Auth::user()->photo->file) : 'http://placehold.it/400x400'}}" class="m--img-rounded m--marginless m--img-centered" alt="" />
												</span>
											</a>
											<div class="m-dropdown__wrapper">
												<span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust"></span>
												<div class="m-dropdown__inner">
													<div class="m-dropdown__header m--align-center" style="background: url({{ asset('assets/app/media/img/misc/user_profile_bg.jpg') }}); background-size: cover;">
														<div class="m-card-user m-card-user--skin-dark">
															<div class="m-card-user__pic">
																<img src="{{ Auth::user()->photo ? URL::asset( Auth::user()->photo->file) : 'http://placehold.it/400x400'}}" class="m--img-rounded m--marginless" alt="" />
															</div>
															<div class="m-card-user__details">
																<span class="m-card-user__name m--font-weight-500">{{ Auth::user()->name }}</span>
																<a href="" class="m-card-user__email m--font-weight-300 m-link">{{ Auth::user()->email }}</a>
															</div>
														</div>
													</div>
													<div class="m-dropdown__body">
														<div class="m-dropdown__content">
															<ul class="m-nav m-nav--skin-light">
																<li class="m-nav__section m--hide">
																	<span class="m-nav__section-text">Section</span>
																</li>
																@if(Auth::user()->role_id == 1)
																<li class="m-nav__item">
																	<a href="{{ url('admin/users') }}" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-users"></i>
																		<span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">All Users</span>
																			</span>
																		</span>
																	</a>
																</li>
																@endif
																<li class="m-nav__item">
																	<a href="{{ url('admin/profile') }}" class="m-nav__link">
																		<i class="m-nav__link-icon flaticon-profile-1"></i>
																		<span class="m-nav__link-title">
																			<span class="m-nav__link-wrap">
																				<span class="m-nav__link-text">My Profile</span>
																				
																			</span>
																		</span>
																	</a>
																</li>
																
																<li class="m-nav__item">
																	<a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder">Logout</a>
																</li>
															</ul>
															<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						                                        @csrf
						                                    </form>
														</div>
													</div>
												</div>
											</div>
										</li>