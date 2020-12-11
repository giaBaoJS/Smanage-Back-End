@extends('front-end/layout/layout')
@section('title', 'Tours')
@section('wrapper')
<div class="wrapper-tour">
			<section class="hero-banner">
				<div class="container">
					<h2>Chọn tour du lịch theo khu vực</h2>
				</div>
      </section>
      <div class="sec-breadcrumb">
					<div class="container">
            <ul class="breadcrumb">
						<li><a href="{{url('/')}}">Trang chủ</a></li>
						<li class='--active'><a href="<?='/tours/mien/'.$showToursLimit[0]['id_mien']?>">Tours {{$showToursLimit[0]['name_mien']}}</a></li>
					</ul>
					</div>
				</div>
			<section class="tours">
				<div class="container">
					<div class="row">
						<div class="col-md-3 sidebar">
							<div class="popup-wrap">
								<div class="search-form" id="search-form">
									<div class="search-title">
										<h2>Tìm kiếm tours</h2>
										<div class="close-icon">
											<i class="fa fa-times" aria-hidden="true"></i>
										</div>
									</div>
									<div class="filter-form">
                                        <form class="form" action="{{ URL::to('/timkiem') }}" method="GET" id="toursearch">
                                            @csrf
											<div class="wrapper-items-form">
												<div class="item">
													<i
														class="fas fa-map-marker-alt"
														aria-hidden="true"
													></i>
													<div class="content">
														<label for="diemden">Điểm đến</label>
														<input
															id="diemden"
                                                            type="text"
                                                            name="diemden"
															placeholder="Nơi mà bạn muốn đến?"
                                                        />
                                                        @error('diemden')
                                                        <p style="color:red">{{$message}}</p>
                                                        @enderror
													</div>
												</div>
												<ul class="dropdown-place">
                          @foreach ($showTinh as $t)
                            <li data-value="{{$t->id_tinh}}"><span>{{$t->name_tinh}}</span></li>
                          @endforeach
												</ul>
											</div>
											<div class="wrapper-items-form">
												<div class="item">
													<i class="far fa-calendar"></i>
													<div class="content">
														<label for="checkin">Ngày khởi hành</label>
														<input
															class="flatpickr-input"
															type="text"
															placeholder="dd/mm/yyyy"
															name="from-date"
															id="from-date"
                                                        />
                                                        @error('from-date')
                                                        <p style="color:red">{{$message}}</p>
                                                        @enderror
													</div>
													<div class="arrow-date">
														<i class="fa fa-angle-down"></i>
													</div>
												</div>
											</div>
											<div class="wrapper-items-form">
												<div class="item">
													<i class="far fa-calendar"></i>
													<div class="content">
														<label for="checkout">Ngày về</label>
														<input
															class="flatpickr-input"
															type="text"
															name="to-date"
															id="to-date"
															placeholder="dd/mm/yyyy"
                                                        />
                                                        @error('to-date')
                                                        <p style="color:red">{{$message}}</p>
                                                        @enderror
													</div>
													<div class="arrow-date">
														<i class="fa fa-angle-down"></i>
													</div>
												</div>
											</div>
											<div class="wrapper-items-form">
												<div class="item">
													<button type="submit">Tìm kiếm</button>
												</div>
											</div>
										</form>
									</div>
								</div>
							</div>
							<div class="popup-wrap">
								<div class="filter-items" id="filter-items">
									<div class="search-title">
										<h2>Lọc Tours</h2>
										<div class="close-icon">
											<i class="fa fa-times" aria-hidden="true"></i>
										</div>
									</div>
									<div class="item">
										<h4>Theo đánh giá</h4>
										<div class="two-ele">
											<ul>
												<li>
													<span><i class="fa fa-star"></i></span>
													<span><i class="fa fa-star"></i></span>
													<span><i class="fa fa-star"></i></span>
													<span><i class="fa fa-star"></i></span>
													<span><i class="fa fa-star"></i></span>
													<input
														type="checkbox"
														name="review_score"
														value="5"
														data-type="star-rate"
													/>
													<span class="fcheckbox"></span>
												</li>
												<li>
													<span><i class="fa fa-star"></i></span>
													<span><i class="fa fa-star"></i></span>
													<span><i class="fa fa-star"></i></span>
													<span><i class="fa fa-star"></i></span>
													<span><i class="fa fa-star fake-star"></i></span>
													<input
														type="checkbox"
														name="review_score"
														value="5"
														data-type="star-rate"
													/>
													<span class="fcheckbox"></span>
												</li>
												<li>
													<span><i class="fa fa-star"></i></span>
													<span><i class="fa fa-star"></i></span>
													<span><i class="fa fa-star"></i></span>
													<span><i class="fa fa-star fake-star"></i></span>
													<span><i class="fa fa-star fake-star"></i></span>
													<input
														type="checkbox"
														name="review_score"
														value="5"
														data-type="star-rate"
													/>
													<span class="fcheckbox"></span>
												</li>
												<li>
													<span><i class="fa fa-star"></i></span>
													<span><i class="fa fa-star"></i></span>
													<span><i class="fa fa-star fake-star"></i></span>
													<span><i class="fa fa-star fake-star"></i></span>
													<span><i class="fa fa-star fake-star"></i></span>
													<input
														type="checkbox"
														name="review_score"
														value="5"
														data-type="star-rate"
													/>
													<span class="fcheckbox"></span>
												</li>
												<li>
													<span><i class="fa fa-star"></i></span>
													<span><i class="fa fa-star fake-star"></i></span>
													<span><i class="fa fa-star fake-star"></i></span>
													<span><i class="fa fa-star fake-star"></i></span>
													<span><i class="fa fa-star fake-star"></i></span>
													<input
														type="checkbox"
														name="review_score"
														value="5"
														data-type="star-rate"
													/>
													<span class="fcheckbox"></span>
												</li>
											</ul>
										</div>
									</div>
									<div class="item">
										<h4>Miền</h4>
										<div class="two-ele">
											<ul>
												<li>
													<label>Miền bắc</label>
													<input
														type="checkbox"
														name="review_score"
														value="5"
														data-type="star-rate"
													/>
													<span class="checkmark fcheckbox"></span>
												</li>
												<li>
													<label>Miền trung</label>
													<input
														type="checkbox"
														name="review_score"
														value="5"
														data-type="star-rate"
													/>
													<span class="fcheckbox"></span>
												</li>
												<li>
													<label>Miền nam</label>
													<input
														type="checkbox"
														name="review_score"
														value="5"
														data-type="star-rate"
													/>
													<span class="fcheckbox"></span>
												</li>
											</ul>
										</div>
									</div>
									<div class="item">
										<h4>Miền</h4>
										<div class="two-ele">
											<ul>
												<li>
													<label>Miền bắc</label>
													<input
														type="checkbox"
														name="review_score"
														value="5"
														data-type="star-rate"
													/>
													<span class="fcheckbox"></span>
												</li>
												<li>
													<label>Miền trung</label>
													<input
														type="checkbox"
														name="review_score"
														value="5"
														data-type="star-rate"
													/>
													<span class="fcheckbox"></span>
												</li>
												<li>
													<label>Miền nam</label>
													<input
														type="checkbox"
														name="review_score"
														value="5"
														data-type="star-rate"
													/>
													<span class="fcheckbox"></span>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>

							<div class="sidebar__mobile">
								<ul>
									<li>
										<a class="open-popup-btn" href="#search-form"
											>Tìm kiếm tour</a
										>
									</li>
									<li>
										<a class="open-popup-btn" href="#filter-items">Lọc</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 col-md-12">
							<div class="filter-tour">
								<div class="found-search">
                                    @if(isset($error))
                                        <h3>{{$error}} tours phù hợp</h3>
                                    @else
                                        <h3>{{count($showToursTotal)}} tours phù hợp</h3>
                                    @endif
									<a href="#">Bỏ sắp xếp</a>
								</div>
								<div class="sort">
				 					<div class="sl-form mr-3">
										<select name="sources" id="sources" class="custom-selects sources" placeholder="Sắp xếp theo">
										<option value="1">Giá tăng dần</option>
										<option value="2">Giá giảm dần</option>
										<option value="3">Lượt xem tăng dần</option>
										<option value="4">Lượt xem giảm dần</option>
										<option value="5">Tour mới nhất</option>
										</select>
									</div>
									<!-- <div class="layout tablist">
										<span class="layout-item active" data-tab="tab1">
											<span class="icon-normal">
												<i class="fas fa-list"></i>
											</span>
										</span>
										<span class="layout-item" data-tab="tab2">
											<span class="icon-normal">
												<i class="fas fa-th" aria-hidden="true"></i>
											</span>
										</span>
									</div> -->
								</div>
							</div>

							<!-- Tour dạng list  -->
							<div class="list-tours tabs tab1 active">
								<div class="row">
                  @foreach($showToursLimit as $t)
                  <div class="col-lg-4 col-md-6 spc">
										<div class="wrapper-tour">
											<div class="feature-image">
												<a href="/tours/dt/{{$t->id_tour}}">
													<img
														class="w-100 img-fluid"
														src="{{asset('BackEnd/assets/images/tours')}}/{{$t->url_img_tour}}"
														alt=""
												/></a>
												<div class="icons">
													<a href="#"><i class="fa fa-heart"></i></a>
												</div>
												<div class="feature-tour">Đặt nhiều</div>
                        @if($t->discount > 0)
                          <div class="sale">- {{$t->discount}}%</div>
                        @endif
											</div>
											<div class="content --custom">
												<div class="content-top">
													<i class="fas fa-map-marker-alt"></i>
													<h3>{{$t->name_tinh}}, {{$t->name_mien}}</h3>
												</div>
												<a href="/tours/dt/{{$t->id_tour}}">{{$t->name_tour}}</a>
												<div class="content-mid">
													<ul class="d-flex list-star">
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
														<li><i class="fa fa-star"></i></li>
													</ul>
													<span>{{ count(\App\comment_tour::where('id_tour', $t->id_tour)->get()) }} nhận xét</span>
												</div>
												<div class="content-bottom ">
													<div class="d-flex align-items-center mb-2">
														<i class="fas fa-clock"></i>
														<span
															style="
																color: #6f6f6f;
																font-size: 14px;
																margin-left: 5px;
															"
															>{{date("d-m-Y", strtotime($t->date_start))}}</span
														>
                                                    </div>
                                                    @if ($t->discount==0)
                                                    <div class="d-flex flex-wrap">
                                                        <p>
                                                          <i class="fas fa-bolt"></i>
                                                          <b>{{ number_format(($t->price - ($t->price * $t->discount / 100)), 0, '', '.')}} VNĐ</b>
                                                        </p>
                                                                                </div>
                                                    @else
                                                    <div class="d-flex flex-wrap">
                                                        <p>
                                                          <i class="fas fa-bolt"></i>
                                                          <b>{{ number_format(($t->price - ($t->price * $t->discount / 100)), 0, '', '.')}} VNĐ</b>
                                                        </p>
                                                        <del style="padding-left: 5px; font-size: 12px; vertical-align: bottom">{{number_format($t->price, 0, '', '.')}} VNĐ</del>
                                                                                </div>
                                                    @endif

												</div>
											</div>
										</div>
									</div>
                  @endforeach
								</div>
							</div>

							<!-- Tour dạng chi tiết -->
							<!-- <div class="tours-cover tabs tab2">
								<div class="container">
									<div class="row">
										<div class="item-service">
											<div class="row">
												<div class="col-md-4">
													<div class="thumb">
														<div class="icons">
															<a href="#"><i class="fa fa-heart"></i></a>
															<div class="feature-tour">Đặt nhiều</div>
															<a href="#">
																<img
																	class="w-100 img-fluid"
																	src="{{asset('FrontEnd/assets/images/defaults/background/')}}/bg-duoicung.jpg"
																	alt=""
															/></a>
														</div>
													</div>
												</div>
												<div class="col-md-5">
													<div class="content">
														<div class="content-top">
															<i class="fas fa-map-marker-alt"></i>
															<h3>Miền bắc</h3>
														</div>
														<a href="#">Hạ Long - Sapa</a>
														<div class="content-mid">
															<ul class="d-flex list-star">
																<li><i class="fa fa-star"></i></li>
																<li><i class="fa fa-star"></i></li>
																<li><i class="fa fa-star"></i></li>
																<li><i class="fa fa-star"></i></li>
																<li><i class="fa fa-star"></i></li>
															</ul>
															<span>7 nhận xét</span>
														</div>
														<p>
															Varius massa maecenas et id dictumst mattis. Donec
															fringilla ac parturient posuere ...
														</p>
													</div>
												</div>
												<div class="col-md-3">
													<div class="services">
														<div
															class="d-flex align-items-center services-price"
														>
															<span>Giá từ</span>
															<p>1.000.000đ</p>
														</div>
														<div
															class="d-flex align-items-center services-list"
														>
															<i class="fas fa-clock"></i>
															<span>3 Ngày 2 Đêm</span>
														</div>
														<div
															class="d-flex align-items-center services-list"
														>
															<i class="fas fa-hotel"></i>
															<span>Khách sạn cao cấp</span>
														</div>
														<div
															class="d-flex align-items-center services-list"
														>
															<i class="fas fa-plane"></i>
															<span>Vé máy bay khứ hồi</span>
														</div>
														<div class="sale">- 20%</div>
														<div class="text-center">
															<a href="#" class="btn-tours">Chi tiết</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="item-service">
											<div class="row">
												<div class="col-md-4">
													<div class="thumb">
														<div class="icons">
															<a href="#"><i class="fa fa-heart"></i></a>
															<div class="feature-tour">Đặt nhiều</div>
															<a href="#">
																<img
																	class="w-100 img-fluid"
																	src="{{asset('FrontEnd/assets/images/defaults/background/')}}/bg-duoicung.jpg"
																	alt=""
															/></a>
														</div>
													</div>
												</div>
												<div class="col-md-5">
													<div class="content">
														<div class="content-top">
															<i class="fas fa-map-marker-alt"></i>
															<h3>Miền bắc</h3>
														</div>
														<a href="#">Hạ Long - Sapa</a>
														<div class="content-mid">
															<ul class="d-flex list-star">
																<li><i class="fa fa-star"></i></li>
																<li><i class="fa fa-star"></i></li>
																<li><i class="fa fa-star"></i></li>
																<li><i class="fa fa-star"></i></li>
																<li><i class="fa fa-star"></i></li>
															</ul>
															<span>7 nhận xét</span>
														</div>
														<p>
															Varius massa maecenas et id dictumst mattis. Donec
															fringilla ac parturient posuere ...
														</p>
													</div>
												</div>
												<div class="col-md-3">
													<div class="services">
														<div
															class="d-flex align-items-center services-price"
														>
															<span>Giá từ</span>
															<p>1.000.000đ</p>
														</div>
														<div
															class="d-flex align-items-center services-list"
														>
															<i class="fas fa-clock"></i>
															<span>3 Ngày 2 Đêm</span>
														</div>
														<div
															class="d-flex align-items-center services-list"
														>
															<i class="fas fa-hotel"></i>
															<span>Khách sạn cao cấp</span>
														</div>
														<div
															class="d-flex align-items-center services-list"
														>
															<i class="fas fa-plane"></i>
															<span>Vé máy bay khứ hồi</span>
														</div>
														<div class="sale">- 20%</div>
														<div class="text-center">
															<a href="#" class="btn-tours">Chi tiết</a>
														</div>
													</div>
												</div>
											</div>
										</div>
										<div class="item-service">
											<div class="row">
												<div class="col-md-4">
													<div class="thumb">
														<div class="icons">
															<a href="#"><i class="fa fa-heart"></i></a>
															<div class="feature-tour">Đặt nhiều</div>
															<a href="#">
																<img
																	class="w-100 img-fluid"
																	src="{{asset('FrontEnd/assets/images/defaults/background/')}}/bg-duoicung.jpg"
																	alt=""
															/></a>
														</div>
													</div>
												</div>
												<div class="col-md-5">
													<div class="content">
														<div class="content-top">
															<i class="fas fa-map-marker-alt"></i>
															<h3>Miền bắc</h3>
														</div>
														<a href="#">Hạ Long - Sapa</a>
														<div class="content-mid">
															<ul class="d-flex list-star">
																<li><i class="fa fa-star"></i></li>
																<li><i class="fa fa-star"></i></li>
																<li><i class="fa fa-star"></i></li>
																<li><i class="fa fa-star"></i></li>
																<li><i class="fa fa-star"></i></li>
															</ul>
															<span>7 nhận xét</span>
														</div>
														<p>
															Varius massa maecenas et id dictumst mattis. Donec
															fringilla ac parturient posuere ...
														</p>
													</div>
												</div>
												<div class="col-md-3">
													<div class="services">
														<div
															class="d-flex align-items-center services-price"
														>
															<span>Giá từ</span>
															<p>1.000.000đ</p>
														</div>
														<div
															class="d-flex align-items-center services-list"
														>
															<i class="fas fa-clock"></i>
															<span>3 Ngày 2 Đêm</span>
														</div>
														<div
															class="d-flex align-items-center services-list"
														>
															<i class="fas fa-hotel"></i>
															<span>Khách sạn cao cấp</span>
														</div>
														<div
															class="d-flex align-items-center services-list"
														>
															<i class="fas fa-plane"></i>
															<span>Vé máy bay khứ hồi</span>
														</div>
														<div class="sale">- 20%</div>
														<div class="text-center">
															<a href="#" class="btn-tours">Chi tiết</a>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
              </div> -->
              @if(ceil(count($showToursTotal) / 12) >= 2)
              <div class='pagination'>
                <nav>
                  <div class='<?=(!isset($_GET['page']) || $_GET['page'] <= 1) ? 'disable' : '' ?>'><a href='/tours/mien/<?=1?>?page=<?=(!isset($_GET['page']) ? '1' : $_GET['page'] - 1)?>'><</a></div>
                  <div><b class="page"><?=(!isset($_GET['page']) ? '1' : $_GET['page'])?> </b> &nbsp;/&nbsp; <span class="total-page">{{ceil(count($showToursTotal) / 12)}}</span></div>
                  <div  class='<?=(isset($_GET['page']) && $_GET['page'] == ceil(count($showToursTotal) / 12)) ? 'disable' : '' ?>'><a href='/tours/mien/<?=1?>?page=<?=(!isset($_GET['page']) ? '2' : $_GET['page'] + 1)?>'>></a></div>
                </nav>
              </div>
              @endif
						</div>
					</div>
				</div>
			</section>
    </div>
  @endsection
