@extends('front-end/layout/layout')
@section('title', 'Đối Tác Chi Tiết')
@section('wrapper')
<div class="wrapper-partner-detail">
      <section class="hero-banner">
        <div class="container">
          <h2>Đối tác</h2>
        </div>
      </section>
      <div class="sec-breadcrumb">
					<div class="container">
						<ul class="breadcrumb">
							<li><a href="#">Home</a></li>
							<li><a href="#">Tour</a></li>
							<li class="--active"><a href="#">Tour Detail</a></li>
						</ul>
					</div>
				</div>
      <section class="partner-info">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-12">
              <div class="partner-info__content">
                <img src="{{asset('FrontEnd/assets/images/defaults/')}}/phuoc.jpg" alt="hihi" />
                <h3>Nguyễn Đại Phước</h3>
                <h4>255 Review</h4>
                <p>Là đối tác từ Tháng 10, 2020</p>
              </div>
              <div class="partner-info__address">
                <p>
                  <b>Giới thiệu:</b> Là người đi đầu trong những tour về du lịch
                  Miền Bắc suốt 10 năm qua
                </p>
              </div>
              <div class="partner-info__author">
                <h3>Thông tin chi tiết</h3>
                <ul>
                  <li>
                    <span>
                      <i class="fa fa-phone"></i>
                    </span>
                    <span>0927913181</span>
                  </li>
                  <li>
                    <span>
                      <i class="fa fa-envelope"></i>
                    </span>
                    <span>oklunnha@gmail.com</span>
                  </li>
                  <li>
                    <span>
                      <i class="fas fa-map-marker-alt"></i>
                    </span>
                    <span>oklunnha@gmail.com</span>
                  </li>
                  <li>
                    <span>
                      <i class="fa fa-handshake"></i>
                    </span>
                    <span>Uy tín</span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-lg-9 col-md-12">
              <div class="main-title">
                <h2>Tours đang hiện hành</h2>
              </div>
              <div class="list-tours">
                <div class="row">
                  <div class="col-lg-4 col-md-6">
                    <div class="wrapper-tour">
                      <div class="feature-image">
                        <a href="#">
                          <img
                            class="w-100 img-fluid"
                            src="{{asset('FrontEnd/assets/images/defaults/background/')}}/bg-duoicung.jpg"
                            alt=""
                        /></a>
                        <div class="icons">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                        <div class="feature-tour">Đặt nhiều</div>
                        <div class="sale">- 20%</div>
                      </div>
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
                        <div class="content-bottom">
                          <div class="d-flex align-items-center">
                            <i class="fas fa-clock"></i>
                            <span
                              style="
                                color: #6f6f6f;
                                font-size: 14px;
                                margin-left: 5px;
                              "
                              >3 Ngày 2 Đêm</span
                            >
                          </div>
                          <div class="d-flex">
                            <i class="fas fa-bolt"></i>
                            <p>1.000.000đ</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="wrapper-tour">
                      <div class="feature-image">
                        <a href="#">
                          <img
                            class="w-100 img-fluid"
                            src="{{asset('FrontEnd/assets/images/defaults/background/')}}/bg-duoicung.jpg"
                            alt=""
                        /></a>
                        <div class="icons">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                        <div class="feature-tour new">Mới nhất</div>
                      </div>
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
                        <div class="content-bottom">
                          <div class="d-flex align-items-center">
                            <i class="fas fa-clock"></i>
                            <span
                              style="
                                color: #6f6f6f;
                                font-size: 14px;
                                margin-left: 5px;
                              "
                              >3 Ngày 2 Đêm</span
                            >
                          </div>
                          <div class="d-flex">
                            <i class="fas fa-bolt"></i>
                            <p>1.000.000đ</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="wrapper-tour">
                      <div class="feature-image">
                        <a href="#">
                          <img
                            class="w-100 img-fluid"
                            src="{{asset('FrontEnd/assets/images/defaults/background/')}}/bg-duoicung.jpg"
                            alt=""
                        /></a>
                        <div class="icons">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>
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
                        <div class="content-bottom">
                          <div class="d-flex align-items-center">
                            <i class="fas fa-clock"></i>
                            <span
                              style="
                                color: #6f6f6f;
                                font-size: 14px;
                                margin-left: 5px;
                              "
                              >3 Ngày 2 Đêm</span
                            >
                          </div>
                          <div class="d-flex">
                            <i class="fas fa-bolt"></i>
                            <p>1.000.000đ</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="wrapper-tour">
                      <div class="feature-image">
                        <a href="#">
                          <img
                            class="w-100 img-fluid"
                            src="{{asset('FrontEnd/assets/images/defaults/background/')}}/bg-duoicung.jpg"
                            alt=""
                        /></a>
                        <div class="icons">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>
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
                        <div class="content-bottom">
                          <div class="d-flex align-items-center">
                            <i class="fas fa-clock"></i>
                            <span
                              style="
                                color: #6f6f6f;
                                font-size: 14px;
                                margin-left: 5px;
                              "
                              >3 Ngày 2 Đêm</span
                            >
                          </div>
                          <div class="d-flex">
                            <i class="fas fa-bolt"></i>
                            <p>1.000.000đ</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="wrapper-tour">
                      <div class="feature-image">
                        <a href="#">
                          <img
                            class="w-100 img-fluid"
                            src="{{asset('FrontEnd/assets/images/defaults/background/')}}/bg-duoicung.jpg"
                            alt=""
                        /></a>
                        <div class="icons">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>
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
                        <div class="content-bottom">
                          <div class="d-flex align-items-center">
                            <i class="fas fa-clock"></i>
                            <span
                              style="
                                color: #6f6f6f;
                                font-size: 14px;
                                margin-left: 5px;
                              "
                              >3 Ngày 2 Đêm</span
                            >
                          </div>
                          <div class="d-flex">
                            <i class="fas fa-bolt"></i>
                            <p>1.000.000đ</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="wrapper-tour">
                      <div class="feature-image">
                        <a href="#">
                          <img
                            class="w-100 img-fluid"
                            src="{{asset('FrontEnd/assets/images/defaults/background/')}}/bg-duoicung.jpg"
                            alt=""
                        /></a>
                        <div class="icons">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>
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
                        <div class="content-bottom">
                          <div class="d-flex align-items-center">
                            <i class="fas fa-clock"></i>
                            <span
                              style="
                                color: #6f6f6f;
                                font-size: 14px;
                                margin-left: 5px;
                              "
                              >3 Ngày 2 Đêm</span
                            >
                          </div>
                          <div class="d-flex">
                            <i class="fas fa-bolt"></i>
                            <p>1.000.000đ</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="wrapper-tour">
                      <div class="feature-image">
                        <a href="#">
                          <img
                            class="w-100 img-fluid"
                            src="{{asset('FrontEnd/assets/images/defaults/background/')}}/bg-duoicung.jpg"
                            alt=""
                        /></a>
                        <div class="icons">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>
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
                        <div class="content-bottom">
                          <div class="d-flex align-items-center">
                            <i class="fas fa-clock"></i>
                            <span
                              style="
                                color: #6f6f6f;
                                font-size: 14px;
                                margin-left: 5px;
                              "
                              >3 Ngày 2 Đêm</span
                            >
                          </div>
                          <div class="d-flex">
                            <i class="fas fa-bolt"></i>
                            <p>1.000.000đ</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="wrapper-tour">
                      <div class="feature-image">
                        <a href="#">
                          <img
                            class="w-100 img-fluid"
                            src="{{asset('FrontEnd/assets/images/defaults/background/')}}/bg-duoicung.jpg"
                            alt=""
                        /></a>
                        <div class="icons">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>
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
                        <div class="content-bottom">
                          <div class="d-flex align-items-center">
                            <i class="fas fa-clock"></i>
                            <span
                              style="
                                color: #6f6f6f;
                                font-size: 14px;
                                margin-left: 5px;
                              "
                              >3 Ngày 2 Đêm</span
                            >
                          </div>
                          <div class="d-flex">
                            <i class="fas fa-bolt"></i>
                            <p>1.000.000đ</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="wrapper-tour">
                      <div class="feature-image">
                        <a href="#">
                          <img
                            class="w-100 img-fluid"
                            src="{{asset('FrontEnd/assets/images/defaults/background/')}}/bg-duoicung.jpg"
                            alt=""
                        /></a>
                        <div class="icons">
                          <a href="#"><i class="fa fa-heart"></i></a>
                        </div>
                      </div>
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
                        <div class="content-bottom">
                          <div class="d-flex align-items-center">
                            <i class="fas fa-clock"></i>
                            <span
                              style="
                                color: #6f6f6f;
                                font-size: 14px;
                                margin-left: 5px;
                              "
                              >3 Ngày 2 Đêm</span
                            >
                          </div>
                          <div class="d-flex">
                            <i class="fas fa-bolt"></i>
                            <p>1.000.000đ</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    @endsection