@extends('front-end/layout/layout')
@section('title', 'Tours Chi Tiết')
@section('wrapper')<div>
			<div class="book-mobile">
				<div class="price-wrapper">
					Giá từ
					<span class="price">
            <del style="padding-left: 5px; font-size: 14px; vertical-align: bottom">{{number_format($t->price, 0, '', '.')}} VNĐ</del>
            <p><b>{{ number_format(($t->price - ($t->price * $t->discount / 100)), 0, '', '.')}} VNĐ</b></p>
          </span>
				</div>
				<a href="#booking-request" class="btn open-popup-btn">Đặt ngay</a>
			</div>
			<div class="tour-dt">
				<section class="hero-banner">
					<div class="container">
						<h2>Tour du lịch: {{$t->name_tour}}</h2>
					</div>
				</section>
				<div class="sec-breadcrumb">
					<div class="container">
					<ul class="breadcrumb">
						<li><a href="{{url('/')}}">Trang chủ</a></li>
						<li ><a href="{{url('/tours')}}">Tours</a></li>
						<li class='--active'><a href="{{url('/tours/dt')}}">{{$t->name_tour}}</a></li>
					</ul>
					</div>
				</div>

				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-9 tour-dt-left">
							<!-- TOUR HEADER -->
							<div class="tour-dt__header">
								<div class="left">
									<h2>{{$t->name_tour}}</h2>
									<div class="sub">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										{{$t->name_tinh}}, {{$t->name_mien}}
									</div>
								</div>
								<div class="right">
									<div class="tour-dt__rating">
										<span>Đánh giá</span>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star grey"></i>
											<i class="fa fa-star grey"></i>
											<i class="fa fa-star grey"></i>
										</div>

										<p id="comment__count-2">Từ <span class="cmt-count" style="display: inline-block">{{count($showComment)}}</span> đánh giá</p>
									</div>
								</div>
							</div>
							<!-- TOUR INFO -->
							<div class="tour-dt__feature">
								<div class="row">
									<div class="col-6 col-sm-6 col-lg-3">
										<div class="item">
											<div class="icon">
												<i class="fa far fa-clock" aria-hidden="true"></i>
											</div>
											<div class="info">
												<h4 class="name">Ngày đi</h4>
												<p class="value"><b>{{date("d-m-Y", strtotime($t->date_start))}}</b></p>
											</div>
										</div>
									</div>
									<div class="col-6 col-sm-6 col-lg-3">
										<div class="item">
											<div class="icon">
												<i class="fa far fa-clock" aria-hidden="true"></i>
											</div>
											<div class="info">
												<h4 class="name">Ngày về</h4>
												<p class="value"><b>{{date("d-m-Y", strtotime($t->date_end))}}</b></p>
											</div>
										</div>
									</div>
									<div class="col-6 col-sm-6 col-lg-3">
										<div class="item">
											<div class="icon">
												<i class="fa fa-users" aria-hidden="true"></i>
											</div>
											<div class="info">
												<h4 class="name">Số lượng</h4>
												<p class="value"><b>{{$t->quantity_limit}}</b></p>
											</div>
										</div>
									</div>
									<div class="col-6 col-sm-6 col-lg-3">
										<div class="item">
											<div class="icon">
												<i class="fa fa-language" aria-hidden="true"></i>
											</div>
											<div class="info">
												<h4 class="name">Ngôn ngữ</h4>
												<p class="value"><b>Việt / Anh</b></p>
                        <p></p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- TOUR SLIDER -->

							<div class="is-slider tour-dt__slider" id="is-slider-detail">
								<div class="swiper-container-tour swiper-container-tour-dt">
									<div class="swiper-wrapper is-lightgallery">
                    <?php
                      $galleryArr = explode(',',$t->url_gallery_tours);
                      foreach ($galleryArr as $g) {
                    ?>
                      <div
                      class="swiper-slide"
                      data-src="{{asset('BackEnd/assets/images/tours')}}/<?=$g?>"
                      >
											  <div class="tour-dt__img">
                          <img
                            src="{{asset('BackEnd/assets/images/tours')}}/<?=$g?>"
                            alt=""
                          />
											</div>
										</div>
                    <?php
                      }
                    ?>
									</div>
									<div class="swiper-pagination"></div>
								</div>
								<div class="swiper-button-prev"></div>
								<div class="swiper-button-next"></div>
							</div>
							<div
								class="is-slider tour-dt__slider-thumbs"
								id="is-slider-detail-thumbs"
							>
								<div
									class="swiper-container-tour swiper-container-tour-dt-thumbs"
								>
									<div class="swiper-wrapper">
                  <?php
                      $galleryArr = explode(',',$t->url_gallery_tours);
                      foreach ($galleryArr as $g) {
                    ?>
                    <div
                    class="swiper-slide"
                    data-src="{{asset('BackEnd/assets/images/tours')}}/<?=$g?>"
                    >
											<div class="tour-dt__img">
												<img
													src="{{asset('BackEnd/assets/images/tours')}}/<?=$g?>"
													alt=""
												/>
											</div>
										</div>
                    <?php
                      }
                    ?>
									</div>
								</div>
							</div>
							<!-- TOUR OVERVIEW -->
							<div class="tour-dt__overview" style="margin-top: 48px">
								<h3>Mô tả</h3>
								<div>
									{{$t->short_content}}
								</div>
							</div>
							<!-- TOUR HIGHT LIGHT -->
							<div class="tour-dt__hightlight">
								<h3>Điểm nổi bật</h3>
								<ul>
									<li>Nón, nước suối, khăn lạnh, viết miễn phí</li>
									<li>
										Hướng dẫn viên du lịch nhiệt tình, chu đáo. Phục vụ hành khách an toàn và vui vẻ trên mọi nẻo đường.
									</li>
									<li>
										Wifi miễn phí trên xe.
									</li>
									<li>
                    Quà tặng mùa dịch: nước rửa tay sát khuẩn. khẩu trang y tế.
									</li>
								</ul>
							</div>
							<!-- TOUR PROGRAM -->
							<div class="tour-dt__program">
								<div class="title">
									<h3 class="st-section-title">Hành trình</h3>
                </div>
                <div class="list">
                  {!! $schedule->content !!}
                </div>
								<!-- <div class="list">
									<div class="item --active">
										<div class="item-header">
											<h5>
												8:00 The Hayden Planetarium Space Show: Dark Universe
											</h5>
											<span class="arrow">
												<i class="fa fa-angle-down"></i>
											</span>
										</div>
										<div class="body">
											<p>
												Celebrates the pivotal discoveries that have led us to
												greater knowledge of the structure and history of the
												universe and our place in it—and to new frontiers for
												exploration. Featuring exquisite renderings of enigmatic
												cosmic phenomena, seminal scientific instruments, and
												spectacular scenes in deep space
											</p>
										</div>
									</div>
									<div class="item">
										<div class="item-header">
											<h5>
												10:00 Behold masterpieces by Gauguin, Dali, Picasso, and
												Pollock
											</h5>
											<span class="arrow">
												<i class="fa fa-angle-down"></i>
											</span>
										</div>
										<div class="body">
											<p>
												The Museum of Modern Art is a place that fuels
												creativity, challenges minds, and provides inspiration.
												With extraordinary exhibitions and the world's finest
												collection of modern and contemporary art, MoMA is
												dedicated to the conversation between the past and the
												present, the established and the experimental.
											</p>
										</div>
									</div>
									<div class="item">
										<div class="item-header">
											<h5>
												12:00 Enjoy free admission to all special exhibits and
												films
											</h5>
											<span class="arrow">
												<i class="fa fa-angle-down"></i>
											</span>
										</div>
										<div class="body">
											<p>
												Purchase your admission and skip the lines to one of the
												world's most celebrated art museums.
											</p>
										</div>
									</div>
									<div class="item">
										<div class="item-header">
											<h5>14:00 Receive a free pass to MoMA PS1</h5>
											<span class="arrow">
												<i class="fa fa-angle-down"></i>
											</span>
										</div>
										<div class="body">
											<p>
												MoMA offers a panoramic overview of modern and
												contemporary art, from the innovative European painting
												and sculpture of the 1880s to today's film, design, and
												performance art.
											</p>
										</div>
									</div>
									<div class="item">
										<div class="item-header">
											<h5>
												16:00 Behold masterpieces by Gauguin, Dali, Picasso, and
												Pollock
											</h5>
											<span class="arrow">
												<i class="fa fa-angle-down"></i>
											</span>
										</div>
										<div class="body">
											<p>
												Celebrates the pivotal discoveries that have led us to
												greater knowledge of the structure and history of the
												universe and our place in it—and to new frontiers for
												exploration.
											</p>
										</div>
									</div>
								</div> -->
							</div>
							<!-- TOUR INCLUDES -->
							<div class="tour-dt__includes">
								<h3 class="title">Giá trên bao gồm</h3>
								<div class="row">
									<div class="col-sm-6 col-lg-6">
										<ul class="include">
											<li>
												<i class="fa fa-plus-square" aria-hidden="true"></i
                        >
                        Bảo hiểm.
											</li>
											<li>
												<i class="fa fa-plus-square" aria-hidden="true"></i
                        >
                        Chi phí xe phục vụ theo chương trình.
											</li>
											<li>
												<i class="fa fa-plus-square" aria-hidden="true"></i
												>Chi phí ăn – uống theo chương trình.
											</li>
											<li>
												<i class="fa fa-plus-square" aria-hidden="true"></i
												>Chi phí khách sạn: 2 khách/phòng. Lẻ khách ngủ giường phụ hoặc chịu phụ thu phòng đơn: theo giá khách sạn
											</li>
											<li>
												<i class="fa fa-plus-square" aria-hidden="true"></i>Phí tham quan, hướng dẫn viên tiếng Việt
											</li>
										</ul>
									</div>
									<div class="col-sm-6 col-lg-6">
										<ul class="exclude">
											<li>
												<i class="fa fa-minus-square" aria-hidden="true"></i
												>Ăn uống ngoài chương trình.
											</li>
											<li>
												<i class="fa fa-minus-square" aria-hidden="true"></i
												>Chi phí tham quan ngoài chương trình.
											</li>
											<li>
												<i class="fa fa-minus-square" aria-hidden="true"></i
												>Dịch vụ giặt ủi, điện thoại và các chi phí cá nhân khác.
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- TOUR FAQ -->
							<div class="tour-dt__faq">
                <h3>Câu hỏi thường gặp</h3>
                <div class="item">
									<div class="item-header">
										<i
											class="fa fa-question-circle icon"
											aria-hidden="true"
										></i>
										<h5>Tour sẽ được bắt đầu và kết thúc khi nào?</h5>
										<span class="arrow">
											<i class="fa fa-angle-down"></i>
										</span>
									</div>
									<div class="body">
                    Chuyến tham quan của bạn sẽ bắt đầu vào ngày <b>{{date("d-m-Y", strtotime($t->date_start))}}</b> và kết thúc vào ngày <b>{{date("d-m-Y", strtotime($t->date_end))}}</b> của chuyến đi.
                    Không có hoạt động nào được lên kế hoạch cho ngày này nên bạn có thể khởi hành bất cứ lúc nào.
                    Chúng tôi đặc biệt khuyên bạn nên dành cho mình thời gian để trải nghiệm đầy đủ những điều kỳ diệu của thành phố mang tính biểu tượng này!
									</div>
								</div>
                <div class="item">
									<div class="item-header">
										<i
											class="fa fa-question-circle icon"
											aria-hidden="true"
										></i>
										<h5>Thanh toán</h5>
										<span class="arrow">
											<i class="fa fa-angle-down"></i>
										</span>
									</div>
									<div class="body">
                  Khi đặt phòng với <b>Golden Tours</b>, bạn sẽ nhận được giá ưu đãi hơn khi đặt trực tiếp với khách sạn. Theo điều kiện hợp tác giữa khách sạn và Golden Tours, khoản thanh toán này bạn sẽ phải thanh toán cho <b>Golden Tours</b>, trừ các phụ thu phát sinh khác mới thanh toán riêng cho khách sạn. Hãy liên hệ hotline của chúng tôi <b>0909-123-123</b> để được hỗ trợ đặt phòng phù hợp với nhu cầu và nhận được mức giá ưu đãi nhất cho chuyến du lịch của mình nhé!
									</div>
								</div>
								<div class="item">
									<div class="item-header">
										<i
											class="fa fa-question-circle icon"
											aria-hidden="true"
										></i>
										<h5>Phương tiện di chuyển</h5>
										<span class="arrow">
											<i class="fa fa-angle-down"></i>
										</span>
									</div>
									<div class="body">
										Phương tiện di chuyển sẽ được dựa trên hành trình của chuyến đi. Các phương tiện được hay được <b>Golden Tours</b> lựa chọn là <b>Máy bay, Xe du lịch, và yêu cầu của khách hàng</b>
									</div>
								</div>
								<div class="item">
									<div class="item-header">
										<i
											class="fa fa-question-circle icon"
											aria-hidden="true"
										></i>
										<h5>Độ tuổi tham gia chuyến đi.</h5>
										<span class="arrow">
											<i class="fa fa-angle-down"></i>
										</span>
									</div>
									<div class="body">
                    Tour này có độ tuổi từ <b>2-70 tuổi.</b> Tuy nhiên, nếu trong đoàn của bạn có thành viên dưới 12 tuổi hoặc trên 70 tuổi, hãy liên hệ với chúng tôi vì bạn có thể đủ điều kiện tham gia chuyến tham quan. Xin cảm ơn.
									</div>
								</div>
							</div>
							<!-- TOUR REVIEW -->
							<h2 class="tour-dt__heading">Đánh giá</h2>
							<div class="tour-dt__reviews">
								<div class="review-box">
									<div class="row">
										<div class="col-lg-5">
											<div class="review-box-score">
												<div class="review-score">
													5.1<span class="per-total">/5</span>
												</div>
												<div class="review-score-text">Average</div>
												<div class="review-score-base">
													Based on <span>4 reviews</span>
												</div>
											</div>
										</div>
										<div class="col-lg-7">
											<div class="review-sumary">
												<div class="item">
													<div class="label">Excellent</div>
													<div class="progress">
														<div class="percent green" style="width: 25%"></div>
													</div>
													<div class="number">1</div>
												</div>
												<div class="item">
													<div class="label">Very Good</div>
													<div class="progress">
														<div
															class="percent darkgreen"
															style="width: 0%"
														></div>
													</div>
													<div class="number">0</div>
												</div>
												<div class="item">
													<div class="label">Average</div>
													<div class="progress">
														<div
															class="percent yellow"
															style="width: 25%"
														></div>
													</div>
													<div class="number">1</div>
												</div>
												<div class="item">
													<div class="label">Poor</div>
													<div class="progress">
														<div class="percent orange" style="width: 0%"></div>
													</div>
													<div class="number">0</div>
												</div>
												<div class="item">
													<div class="label">Terrible</div>
													<div class="progress">
														<div class="percent red" style="width: 25%"></div>
													</div>
													<div class="number">1</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="comments">
								<div class="comments__title" id="comment__count">
									<h3>Bình luận <span class="cmt-count">({{count($showComment)}})</span></h3>
								</div>
								<div class="comments__list" id="showComment">
                  @foreach ($showCommentLimit as $c)
                    <div class="items">
                      <div class="info-users">
                        <img
                          src="{{asset('BackEnd/assets/images')}}/{{$c->url_avatar}}"
                          alt="avatar"
                        />
                        <div>
                        <h4>{{$c->name}}</h4>
                        <span>{{date('d/m/Y: H:i:s',strtotime($c->created_at))}}</span>
                        </div>
                      </div>
                      <div class="comment">
                        <p>
                          {{$c->content}}
                        </p>
                        <!-- <a href="#">TRẢ LỜI</a> -->
                      </div>
                    </div>
                  @endforeach
                </div>
                <div class="text-right mb-5">
                  @if(count($showComment) > 4)
                    <a href="#" class='pagination-cmts' data-id='{{$t->id_tour}}' data-type="tour">Xem thêm</a>
                  @endif
                </div>
							</div>
							<div class="replay">
								<div class="wrap-content">
                  <h3>ĐỂ LẠI BÌNH LUẬN</h3>
                  @if (session('account'))
                    <form id="formComment">
                        <div class="content">
                          <div class="info-group">
                            <div class="row">
								<div class="col-md-12">
									<div class="rate">
										<input type="radio" id="star5" name="rate" value="5" />
										<label for="star5" title="text"><i class="fa fa-star"></i></label>
										<input type="radio" id="star4" name="rate" value="4" />
										<label for="star4" title="text"><i class="fa fa-star"></i></label>
										<input type="radio" id="star3" name="rate" value="3" />
										<label for="star3" title="text"><i class="fa fa-star"></i></label>
										<input type="radio" id="star2" name="rate" value="2" />
										<label for="star2" title="text"><i class="fa fa-star"></i></label>
										<input type="radio" id="star1" name="rate" value="1" />
										<label for="star1" title="text"><i class="fa fa-star"></i></label>
									</div>
								</div>
                                <div class="col-md-12" data-validate="Vui lòng nhận xét!!">
                                    <textarea
                                    class="form-control validate-form-control"
                                    name="comment"
                                    placeholder="Nhận xét ..."
                                    id="comment"
                                    cols="45"
                                    rows="6"
                                  ></textarea>
								</div>
                              <div class="col-md-6">
                                <input
                                  class="form-control"
                                  type="text"
                                  placeholder="Họ và tên*"
                                  readonly
                                  value="{{session('account')->name}}"
                                />
                              </div>
                              <div class="col-md-6">
                                <input
                                  class="form-control"
                                  type="email"
                                  placeholder="Email*"
                                  readonly
                              value="{{session('account')->email}}"
                                />
                                <input type="hidden" name="id_user" value="{{session('account')->id_user}}">
                                <input type="hidden" name="id" value="{{$t->id_tour}}">
                              </div>
                            </div>
                          </div>
                          <div class="btn-submit">
                            <input type="hidden" name="type" value="tour">
                            <button class="form-control" type="button" onclick="addComment()">
                              BÌNH LUẬN
                            </button>
                          </div>
                        </div>
                      </form>
                    @else
                      <div>Vui lòng
                        <a style="display: inline-block;
                            padding: 5px 10px;
                            border-radius: 50px;
                            background-color: #0ac9db;
                            color: #fff;" href="/dang-nhap?prev_url=<?= $_SERVER["REQUEST_URI"] ?>">Đăng nhập</a> để bình luận
                      </div>
                    @endif
								</div>
							</div>
						</div>
						<div class="col-xs-12 col-sm-4 col-md-3">
							<div class="widgets tour-dt__booking">
								<div class="fixed-on-mobile" id="booking-request">
									<div class="close-icon">
										<i class="fa fa-times" aria-hidden="true"></i>
									</div>

									<div class="form-book-wrapper">
										<div class="form-head">
                      <div class="price">
                        <span class="label"> Từ </span>
												<span class="value">
                          <del style="padding-left: 5px; font-size: 14px; vertical-align: bottom">{{number_format($t->price, 0, '', '.')}} VNĐ</del>
													<p style="color: #fff"><b>{{ number_format(($t->price - ($t->price * $t->discount / 100)), 0, '', '.')}} VNĐ</b></p>
												</span>
											</div>
										</div>
										<div class="form-content pb-3">
											<div class="guest-wrapper" style="border-bottom: 0">
												<div style="width: 100%">
													<label>Thời gian</label>
													<div class="render">{{date("d-m-Y", strtotime($t->date_start))}} - {{date("d-m-Y", strtotime($t->date_end))}}</div>
												</div>
											</div>
											<form method="#" action="#" class="tour-booking-form">
												<div class="form-group form-guest-search">
													<div class="guest-wrapper">
														<div class="check-in-wrapper">
															<label>Người lớn</label>
															<div class="render">Trên 12 tuổi</div>
														</div>
														<div class="select-wrapper">
															<div class="st-number-wrapper qtt-picker">
																<span class="prev">-</span>
																<input
																	type="text"
																	name="adult_number"
																	value="0"
																	class="form-control qtt-input"
																	autocomplete="off"
																	readonly=""
																	min="0"
																	max="10"
																/>
																<span class="next">+</span>
															</div>
														</div>
													</div>
													<div class="guest-wrapper">
														<div class="check-in-wrapper">
															<label>Trẻ em</label>
															<div class="render">2 tuổi - 12 tuổi</div>
														</div>
														<div class="select-wrapper">
															<div class="st-number-wrapper qtt-picker">
																<span class="prev">-</span>
																<input
																	type="text"
																	name="child_number"
																	value="0"
																	class="form-control qtt-input"
																	autocomplete="off"
																	readonly=""
																	min="0"
																	max="10"
																/>
																<span class="next">+</span>
															</div>
														</div>
													</div>
												</div>
												<div class="submit-group">
													<button
														class="btn btn-green btn-large btn-full upper btn-book-ajax"
														type="submit"
														name="submit"
													>
														Đặt ngay
													</button>
												</div>
											</form>
										</div>
									</div>

									<div class="widget-box">
										<h4 class="heading">Đối tác cung cấp</h4>
										<div class="media">
											<div class="media-left">
												<a
													href="/doi-tac/dt/{{$t->id_doitac}}"
												>
													<img
														alt="avatar"
														width="60"
														height="60"
														src="{{asset('BackEnd/assets/images/users')}}/{{$infoPartner->url_avatar}}"
														class="avatar avatar-96 photo origin round"
													/>
												</a>
											</div>
											<div class="media-body">
												<h4 class="media-heading">
													<a
                          href="/doi-tac/dt/{{$t->id_doitac}}"
														class="author-link"
														>{{$infoPartner->name}}</a
													>
												</h4>
												<p>Hợp tác từ {{date("d-m-Y", strtotime($infoPartner->contract_date))}}</p>
												<div class="author-review-box">
													<div class="author-start-rating">
														<div class="stm-star-rating">
															<div class="inner">
																<div
																	class="stm-star-rating-upper"
																	style="width: 84%"
																></div>
																<div class="stm-star-rating-lower"></div>
															</div>
														</div>
													</div>
													<!-- <p class="author-review-label">255 Reviews</p> -->
												</div>
											</div>
										</div>
										<!-- <div class="ask_question">
											<a
												href=""
												class="login btn btn-primary upper mt5"
												data-toggle="modal"
												data-target="#st-login-form"
												>Ask a Question</a
											>
										</div> -->
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
    </div>
@endsection
