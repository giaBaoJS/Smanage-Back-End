@extends('front-end/layout/layout')
@section('title', 'Tours Chi Tiết')
@section('wrapper')<div>
			<div class="book-mobile">
				<div class="price-wrapper">
					from
					<span class="price"
						><span class="text-lg lh1em item"> $150,00</span></span
					>
				</div>
				<a href="#booking-request" class="btn open-popup-btn">Book Now</a>
			</div>
			<div class="tour-dt">
				<section class="hero-banner">
					<div class="container">
						<h2>Chi tiết</h2>
					</div>
				</section>
				<div class="sec-breadcrumb">
					<div class="container">
					<ul class="breadcrumb">
						<li><a href="{{url('/')}}">Trang chủ</a></li>
						<li ><a href="{{url('/tours')}}">Tours</a></li>
						<li class='--active'><a href="{{url('/tours/dt')}}">Tours Detail</a></li>
					</ul>
					</div>
				</div>

				<div class="container">
					<div class="row">
						<div class="col-12 col-sm-12 col-md-9 tour-dt-left">
							<!-- TOUR HEADER -->
							<div class="tour-dt__header">
								<div class="left">
									<h2>New York: Museum of Modern Art</h2>
									<div class="sub">
										<i class="fa fa-map-marker" aria-hidden="true"></i>
										New York, USA
									</div>
								</div>
								<div class="right">
									<div class="tour-dt__rating">
										<span>Average</span>
										<div class="rating">
											<i class="fa fa-star"></i>
											<i class="fa fa-star"></i>
											<i class="fa fa-star grey"></i>
											<i class="fa fa-star grey"></i>
											<i class="fa fa-star grey"></i>
										</div>

										<p>from 4 reviews</p>
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
												<h4 class="name">Duration</h4>
												<p class="value">Full day</p>
											</div>
										</div>
									</div>
									<div class="col-6 col-sm-6 col-lg-3">
										<div class="item">
											<div class="icon">
												<i class="fa far fa-clock" aria-hidden="true"></i>
											</div>
											<div class="info">
												<h4 class="name">Tour Type</h4>
												<p class="value">Specific Tour</p>
											</div>
										</div>
									</div>
									<div class="col-6 col-sm-6 col-lg-3">
										<div class="item">
											<div class="icon">
												<i class="fa fa-users" aria-hidden="true"></i>
											</div>
											<div class="info">
												<h4 class="name">Group Size</h4>
												<p class="value">10 people</p>
											</div>
										</div>
									</div>
									<div class="col-6 col-sm-6 col-lg-3">
										<div class="item">
											<div class="icon">
												<i class="fa fa-language" aria-hidden="true"></i>
											</div>
											<div class="info">
												<h4 class="name">Languages</h4>
												<p class="value">___</p>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- TOUR SLIDER -->
							<div class="is-slider tour-dt__slider" id="is-slider-detail">
								<div class="swiper-container-tour swiper-container-tour-dt">
									<div class="swiper-wrapper is-lightgallery">
										<div
											class="swiper-slide"
											data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-1.jpg"
										>
											<div class="tour-dt__img">
												<img
													src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-1.jpg"
													alt=""
												/>
											</div>
										</div>
										<div
											class="swiper-slide"
											data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-2.jpg"
										>
											<div class="tour-dt__img">
												<img
													src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-2.jpg"
													alt=""
												/>
											</div>
										</div>
										<div
											class="swiper-slide"
											data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-3.jpg"
										>
											<div class="tour-dt__img">
												<img
													src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-3.jpg"
													alt=""
												/>
											</div>
										</div>
										<div
											class="swiper-slide"
											data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-4.jpg"
										>
											<div class="tour-dt__img">
												<img
													src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-4.jpg"
													alt=""
												/>
											</div>
										</div>
										<div
											class="swiper-slide"
											data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-5.jpg"
										>
											<div class="tour-dt__img">
												<img
													src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-5.jpg"
													alt=""
												/>
											</div>
										</div>
										<div
											class="swiper-slide"
											data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-6.jpg"
										>
											<div class="tour-dt__img">
												<img
													src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-6.jpg"
													alt=""
												/>
											</div>
										</div>
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
										<div
											class="swiper-slide"
											data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-1.jpg"
										>
											<div class="tour-dt__img">
												<img
													src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-1.jpg"
													alt=""
												/>
											</div>
										</div>
										<div
											class="swiper-slide"
											data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-2.jpg"
										>
											<div class="tour-dt__img">
												<img
													src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-2.jpg"
													alt=""
												/>
											</div>
										</div>
										<div
											class="swiper-slide"
											data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-3.jpg"
										>
											<div class="tour-dt__img">
												<img
													src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-3.jpg"
													alt=""
												/>
											</div>
										</div>
										<div
											class="swiper-slide"
											data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-4.jpg"
										>
											<div class="tour-dt__img">
												<img
													src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-4.jpg"
													alt=""
												/>
											</div>
										</div>
										<div
											class="swiper-slide"
											data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-5.jpg"
										>
											<div class="tour-dt__img">
												<img
													src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-5.jpg"
													alt=""
												/>
											</div>
										</div>
										<div
											class="swiper-slide"
											data-src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-6.jpg"
										>
											<div class="tour-dt__img">
												<img
													src="{{asset('FrontEnd/assets/images/defaults/tours')}}/tour-detail-6.jpg"
													alt=""
												/>
											</div>
										</div>
									</div>
								</div>
							</div>
							<!-- TOUR OVERVIEW -->
							<div class="tour-dt__overview">
								<h3>Overview</h3>
								<div>
									<p>
										The Museum of Modern Art is a place that fuels creativity,
										challenges minds, and provides inspiration. With
										extraordinary exhibitions and the world’s finest collection
										of modern and contemporary art, MoMA is dedicated to the
										conversation between the past and the present, the
										established and the experimental. Purchase your admission
										and skip the lines to one of the world’s most celebrated art
										museums.
									</p>
								</div>
							</div>
							<!-- TOUR HIGHT LIGHT -->
							<div class="tour-dt__hightlight">
								<h3>HIGHLIGHTS</h3>
								<ul>
									<li>Visit the Museum of Modern Art in Manhattan</li>
									<li>
										See amazing works of contemporary art, including Vincent van
										Gogh's The Starry Night
									</li>
									<li>
										Check out Campbell's Soup Cans by Warhol and The Dance (I)
										by Matisse
									</li>
									<li>
										Behold masterpieces by Gauguin, Dali, Picasso, and Pollock
									</li>
									<li>
										Enjoy free audio guides available in English, French,
										German, Italian, Spanish, Portuguese
									</li>
								</ul>
							</div>
							<!-- TOUR PROGRAM -->
							<div class="tour-dt__program">
								<div class="title">
									<h3 class="st-section-title">Itinerary</h3>
								</div>
								<div class="list">
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
								</div>
							</div>
							<!-- TOUR INCLUDES -->
							<div class="tour-dt__includes">
								<h3 class="title">Included/Excluded</h3>
								<div class="row">
									<div class="col-sm-6 col-lg-6">
										<ul class="include">
											<li>
												<i class="fa fa-plus-square" aria-hidden="true"></i
												>Specialized bilingual guide
											</li>
											<li>
												<i class="fa fa-plus-square" aria-hidden="true"></i
												>Private Transport
											</li>
											<li>
												<i class="fa fa-plus-square" aria-hidden="true"></i
												>Entrance fees (Cable and car and Moon Valley)
											</li>
											<li>
												<i class="fa fa-plus-square" aria-hidden="true"></i>Box
												lunch water, banana apple and chocolate
											</li>
										</ul>
									</div>
									<div class="col-sm-6 col-lg-6">
										<ul class="exclude">
											<li>
												<i class="fa fa-minus-square" aria-hidden="true"></i
												>Additional Services
											</li>
											<li>
												<i class="fa fa-minus-square" aria-hidden="true"></i
												>Insurance
											</li>
											<li>
												<i class="fa fa-minus-square" aria-hidden="true"></i
												>Drink
											</li>
											<li>
												<i class="fa fa-minus-square" aria-hidden="true"></i
												>Tickets
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- TOUR FAQ -->
							<div class="tour-dt__faq">
								<h3>FAQs</h3>
								<div class="item">
									<div class="item-header">
										<i
											class="fa fa-question-circle icon"
											aria-hidden="true"
										></i>
										<h5>When and where does the tour end?</h5>
										<span class="arrow">
											<i class="fa fa-angle-down"></i>
										</span>
									</div>
									<div class="body">
										Your tour will conclude in San Francisco on Day 8 of the
										trip. There are no activities planned for this day so you're
										free to depart at any time. We highly recommend booking
										post-accommodation to give yourself time to fully experience
										the wonders of this iconic city!
									</div>
								</div>
								<div class="item">
									<div class="item-header">
										<i
											class="fa fa-question-circle icon"
											aria-hidden="true"
										></i>
										<h5>When and where does the tour start?</h5>
										<span class="arrow">
											<i class="fa fa-angle-down"></i>
										</span>
									</div>
									<div class="body">
										Day 1 of this tour is an arrivals day, which gives you a
										chance to settle into your hotel and explore Los Angeles.
										The only planned activity for this day is an evening welcome
										meeting at 7pm, where you can get to know your guides and
										fellow travellers. Please be aware that the meeting point is
										subject to change until your final documents are released.
									</div>
								</div>
								<div class="item">
									<div class="item-header">
										<i
											class="fa fa-question-circle icon"
											aria-hidden="true"
										></i>
										<h5>Do you arrange airport transfers?</h5>
										<span class="arrow">
											<i class="fa fa-angle-down"></i>
										</span>
									</div>
									<div class="body">
										Airport transfers are not included in the price of this
										tour, however you can book for an arrival transfer in
										advance. In this case a tour operator representative will be
										at the airport to greet you. To arrange this please contact
										our customer service team once you have a confirmed booking.
									</div>
								</div>
								<div class="item">
									<div class="item-header">
										<i
											class="fa fa-question-circle icon"
											aria-hidden="true"
										></i>
										<h5>What is the age range?</h5>
										<span class="arrow">
											<i class="fa fa-angle-down"></i>
										</span>
									</div>
									<div class="body">
										This tour has an age range of 12-70 years old, this means
										children under the age of 12 will not be eligible to
										participate in this tour. However, if you are over 70 years
										please contact us as you may be eligible to join the tour if
										you fill out G Adventures self-assessment form.
									</div>
								</div>
							</div>
							<!-- TOUR REVIEW -->
							<h2 class="tour-dt__heading">Reviews</h2>
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
								<div class="comments__title">
									<h3>Bình luận (4)</h3>
								</div>
								<div class="comments__list">
									<div class="items">
										<div class="info-users">
											<img
												src="{{asset('FrontEnd/assets/images/defaults/')}}/bao.jpg"
												alt="avatar"
											/>
											<div>
												<h4>Gia Bảo</h4>
												<span>22/10/2020</span>
											</div>
										</div>
										<div class="comment">
											<p>
												Dream constantly receive a stable income on the auction
												and make less mistakes? Introducing To your attention–
												service for automatic investment in profitable positions
												on the exchange. For a successful start, register in the
												system and after making $ 300 attention– service for
												automatic investment in profitable positions on the
												exchange. For a successful start, register in the system
												and after making $ 300
											</p>
											<a href="#">TRẢ LỜI</a>
										</div>
									</div>
									<div class="items">
										<div class="info-users">
											<img
												src="{{asset('FrontEnd/assets/images/defaults/')}}/bao.jpg"
												alt="avatar"
											/>
											<div>
												<h4>Gia Bảo</h4>
												<span>22/10/2020</span>
											</div>
										</div>
										<div class="comment">
											<p>
												Dream constantly receive a stable income on the auction
												and make less mistakes? Introducing To your attention–
												service for automatic investment in profitable positions
												on the exchange. For a successful start, register in the
												system and after making $ 300 attention– service for
												automatic investment in profitable positions on the
												exchange. For a successful start, register in the system
												and after making $ 300
											</p>
											<a href="#">TRẢ LỜI</a>
										</div>
									</div>
								</div>
							</div>
							<div class="replay">
								<div class="wrap-content">
									<h3>ĐỂ LẠI BÌNH LUẬN</h3>
									<form action="#">
										<div class="content">
											<textarea
												class="form-control"
												name="comment"
												placeholder="Nhận xét ..."
												id="comment"
												cols="45"
												rows="6"
											></textarea>
											<div class="info-group">
												<div class="row">
													<div class="col-md-6">
														<input
															class="form-control"
															type="text"
															placeholder="Họ và tên*"
														/>
													</div>
													<div class="col-md-6">
														<input
															class="form-control"
															type="email"
															placeholder="Email*"
														/>
													</div>
												</div>
											</div>
											<div class="btn-submit">
												<button class="form-control" type="submit">
													BÌNH LUẬN
												</button>
											</div>
										</div>
									</form>
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
													<span> $150,00</span>
												</span>
											</div>
										</div>
										<div class="form-content pb-3">
											<div class="guest-wrapper" style="border-bottom: 0">
												<div style="width: 100%">
													<label>Time</label>
													<div class="render">20/02/2020 - 22/02/2020</div>
												</div>
											</div>
											<form method="#" action="#" class="tour-booking-form">
												<div class="form-group form-guest-search">
													<div class="guest-wrapper">
														<div class="check-in-wrapper">
															<label>Adults</label>
															<div class="render">Age 18+</div>
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
															<label>Children</label>
															<div class="render">Age 6-17</div>
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
														Book Now
													</button>
												</div>
											</form>
										</div>
									</div>

									<div class="widget-box">
										<h4 class="heading">Organized by</h4>
										<div class="media">
											<div class="media-left">
												<a
													href="https://mixmap.travelerwp.com/author/travelhotel/"
												>
													<img
														alt="avatar"
														width="60"
														height="60"
														src="https://mixmap.travelerwp.com/wp-content/uploads/bfi_thumb/pp_1-200x200-3a2xg7hpbo3km7ux1396gw.png"
														class="avatar avatar-96 photo origin round"
													/>
												</a>
											</div>
											<div class="media-body">
												<h4 class="media-heading">
													<a
														href="https://mixmap.travelerwp.com/author/travelhotel/"
														class="author-link"
														>travelhotel</a
													>
												</h4>
												<p>Member Since 2018</p>
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
													<p class="author-review-label">255 Reviews</p>
												</div>
											</div>
										</div>
										<div class="ask_question">
											<a
												href=""
												class="login btn btn-primary upper mt5"
												data-toggle="modal"
												data-target="#st-login-form"
												>Ask a Question</a
											>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
    </div>
@endsection