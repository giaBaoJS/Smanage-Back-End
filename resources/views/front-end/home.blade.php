@extends('front-end/layout/layout')
@section('title', 'Trang Chủ')
@section('wrapper')
<div class="wrapper-home">
    <section class="banner-home">
      <div class="swiper-container">
        <div class="swiper-wrapper">
            @foreach ($showSlider as $sl)
            <div class="swiper-slide">
                <div class="content">
                  <div class="image">
                    <img
                      class="img-fluid w-100"
                      src="{{asset('BackEnd/assets/images/slider')}}/{{$sl->url_img_slider}}"
                      alt="home"
                    />
                  </div>
                  <div class="describe">
                    <h2 class="title">Đi thôi nào</h2>
                  <h3 class="sub-title">{{$sl->title}}</h3>
                    <p>
                        {{$sl->content}}
                    </p>
                  </div>
                </div>
              </div>
            @endforeach
        </div>
        <div class="slide-button-prev">
          <i class="fa fa-angle-left"></i>
        </div>
        <div class="slide-button-next">
          <i class="fa fa-angle-right"></i>
        </div>
      </div>
      <div class="search-form">
        <div class="container">
          <form class="wrap-form" action="#">
            <div class="row no-gutters">
              <div class="col-lg-3 line">
                <div class="wrapper-items-form">
                  <div class="item">
                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                    <div class="content">
                      <label for="diemden">Điểm đến</label>
                      <input type="text" placeholder="Nơi mà bạn muốn đến?" />
                    </div>
                  </div>
                  <ul class="dropdown-place d-none">
                    <li><span>Hạ Long</span></li>
                    <li><span>Hà Nội</span></li>
                    <li><span>Hạ Long</span></li>
                    <li><span>Hà Nội</span></li>
                    <li><span>Hạ Long</span></li>
                    <li><span>Hà Nội</span></li>
                    <li><span>Hạ Long</span></li>
                    <li><span>Hà Nội</span></li>
                    <li><span>Hạ Long</span></li>
                    <li><span>Hà Nội</span></li>
                    <li><span>Hạ Long</span></li>
                    <li><span>Hà Nội</span></li>
                    <li><span>Hạ Long</span></li>
                    <li><span>Hà Nội</span></li>
                    <li><span>Hạ Long</span></li>
                    <li><span>Hà Nội</span></li>
                    <li><span>Hạ Long</span></li>
                    <li><span>Hà Nội</span></li>
                    <li><span>Hồ Chí Minh</span></li>
                    <li><span>Thanh Hóa</span></li>
                  </ul>
                </div>
              </div>
              <div class="col-lg-3 line">
                <div class="wrapper-items-form">
                  <div class="item">
                    <i class="far fa-calendar"></i>
                    <div class="content">
                      <label for="from-date">Ngày đi</label>
                      <input
                        class="flatpickr-input"
                        type="text"
                        placeholder="dd/mm/yyyy"
                        name="from-date"
                        id="from-date"
                      />
                    </div>
                    <div class="arrow-date">
                      <i class="fas fa-angle-down"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3 line">
                <div class="wrapper-items-form">
                  <div class="item">
                    <i class="far fa-calendar"></i>
                    <div class="content">
                      <label for="checkin">Ngày về</label>
                      <input
                        class="flatpickr-input"
                        type="text"
                        name="to-date"
                        id="to-date"
                        placeholder="dd/mm/yyyy"
                      />
                    </div>
                    <div class="arrow-date">
                      <i class="fas fa-angle-down"></i>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-3">
                <button class="btn-submit" type="submit">Tìm</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </section>
    <section class="about-us">
      <div class="container">
        <div class="row">
          <div class="col-lg-5 col-md-12">
            <div class="content">
              <img
                class="img-fluid"
                src="{{asset('FrontEnd/assets/images/defaults')}}/vietnam.png"
                alt="logo"
              />
              <h2>VIỆT NAM THÂN YÊU</h2>
              <p>
                Có một câu chuyện về những con người, đã dành ra nhiều năm để
                trải nghiệm nhiều vùng đất khác nhau trên khắp mọi miền Tổ
                Quốc. Họ đi qua những vùng đất cực Bắc, cực Nam, lên rừng rồi
                lại xuống biển, ghi lại những khoảnh khắc tuyệt đẹp của thiên
                nhiên hay bức tranh sinh hoạt bình yên của người dân nơi họ
                đến rồi đi. Qua ống kính của họ, ta thấy được một Việt Nam
                thật đẹp, bình yên và cũng đủ đầy. Bằng những trải nghiệm của
                chính bản thân, bằng những khung hình đẹp nhất, 4 nhiếp ảnh
                gia đã thổi hồn vào từng bức ảnh, đem đến cho người xem những
                cảm xúc thật chân thành về Việt Nam hùng vĩ.
              </p>
            </div>
          </div>
          <div
            class="col-lg-7 col-md-12 wow zoomIn"
            data-wow-duration="1s"
            data-wow-delay="1s"
          >
            <img
              class="img-fluid w-100"
              src="{{asset('FrontEnd/assets/images/defaults')}}/vietnamoi.png"
              alt="test"
            />
          </div>
        </div>
      </div>
    </section>
    <section class="regions">
      <div class="container">
        <div class="sub-title">
          <p>xách ba lô lên và đi</p>
          <h2>3 miền <strong>Việt Nam</strong></h2>
        </div>
        <div
          class="row wow fadeInUp"
          data-wow-duration="1s"
          data-wow-delay="0.5s"
        >
        @foreach ($showMien as $m)
        <div class="col-md-4">
            <div class="wrapper-image">
              <a href="#"
                ><img
                  class="img-fluid w-100"
            src="{{asset('BackEnd/assets/images')}}/{{$m->url_img_mien}}"
                  alt="mien"
              /></a>
            </div>
            <div class="content">
            <a class="features" href="#">{{$m->name_mien}}</a>
              <hr />
              <div class="detail">
                <a href="#">Khám phá</a>
              </div>
            </div>
          </div>
        @endforeach

        </div>
        <div class="more text-center">
          <a href="#">XEM THÊM</a>
        </div>
      </div>
    </section>
    <section class="experience">
      <div class="container">
        <div class="row">
          <div
            class="col-md-12 wow fadeInUp"
            data-wow-duration="1s"
            data-wow-delay="0.5s"
          >
            <div class="content">
              <h2>NHỮNG <strong>CHUYẾN ĐI</strong> MỚI</h2>
              <h3>TRẢI NGHIỆM</h3>
              <p>
                There are many variations of passages of. Lorem Ipsum
                available, but the majority have suffered alteration in some
                form, by injected humour, or randomised words which don't
                look.
              </p>
              <div class="img-video">
                <img
                  class="img-fluid w-100"
                  src="{{asset('FrontEnd/assets/images/defaults')}}/imgvideo.jpg"
                  alt="img"
                />
                <a
                  class="btn-video"
                  href="https://www.youtube.com/watch?v=Ilui-mb3sT0"
                  ><i class="fa fa-play"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="tour-hot">
      <div class="tour-hot__title">
        <h2 class="title">Tour Hot</h2>
        <h3 class="sub-title">Hãy Chọn Ngay</h3>
      </div>
      <div class="swiper-container2">
        <div class="swiper-wrapper">
          <div class="swiper-slide">
            <div class="wrapper-tour">
              <div class="feature-image">
                <a href="#">
                  <img
                    class="w-100 img-fluid"
                    src="{{asset('FrontEnd/assets/images/defaults/background')}}/bg-duoicung.jpg"
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
          <div class="swiper-slide">
            <div class="wrapper-tour">
              <div class="feature-image">
                <a href="#">
                  <img
                    class="w-100 img-fluid"
                    src="{{asset('FrontEnd/assets/images/defaults/background')}}/bg-duoicung.jpg"
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
          <div class="swiper-slide">
            <div class="wrapper-tour">
              <div class="feature-image">
                <a href="#">
                  <img
                    class="w-100 img-fluid"
                    src="{{asset('FrontEnd/assets/images/defaults/background')}}/bg-duoicung.jpg"
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
          <div class="swiper-slide">
            <div class="wrapper-tour">
              <div class="feature-image">
                <a href="#">
                  <img
                    class="w-100 img-fluid"
                    src="{{asset('FrontEnd/assets/images/defaults/background')}}/bg-duoicung.jpg"
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
          <div class="swiper-slide">
            <div class="wrapper-tour">
              <div class="feature-image">
                <a href="#">
                  <img
                    class="w-100 img-fluid"
                    src="{{asset('FrontEnd/assets/images/defaults/background')}}/bg-duoicung.jpg"
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
          <div class="swiper-slide">
            <div class="wrapper-tour">
              <div class="feature-image">
                <a href="#">
                  <img
                    class="w-100 img-fluid"
                    src="{{asset('FrontEnd/assets/images/defaults/background')}}/bg-duoicung.jpg"
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
          <div class="swiper-slide">
            <div class="wrapper-tour">
              <div class="feature-image">
                <a href="#">
                  <img
                    class="w-100 img-fluid"
                    src="{{asset('FrontEnd/assets/images/defaults/background')}}/bg-duoicung.jpg"
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
          <div class="swiper-slide">
            <div class="wrapper-tour">
              <div class="feature-image">
                <a href="#">
                  <img
                    class="w-100 img-fluid"
                    src="{{asset('FrontEnd/assets/images/defaults/background')}}/bg-duoicung.jpg"
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
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </section>
    <section class="news">
      <div class="container">
        <h2>Tin tức mới nhất</h2>
        <div
          class="swiper-container3 wow fadeInUp"
          data-wow-delay="0.5s"
          data-wow-duration="1s"
        >
          <div class="swiper-wrapper">
              @foreach ($showOneNews as $tintuc)
              <div class="swiper-slide">
                <div class="row">
                  <div class="col-md-6">
                    <img
                  src="{{asset('BackEnd/assets/images/news')}}/{{ $tintuc->url_img_news}}"
                      class="w-100 img-fluid"
                      alt="images"
                    />
                  </div>
                  <div class="col-md-6">
                    <div class="content">
                      <a class="title" href="#"
                        >{{ $tintuc->title}}</a
                      >
                      <ul>
                      <li><a href="#">{{date('M-d-Y',strtotime($tintuc->updated_at))}}</a></li>
                        <li><a href="#">Bao Dep Trai</a></li>
                      </ul>
                      <p>
                        {{ $tintuc->short_content}}
                      </p>
                    </div>
                    <a class="btn btn-main" href="#">Xem Thêm</a>
                  </div>
                </div>
              </div>
              @endforeach
          </div>
          <div class="swiper-pagination3"></div>
        </div>
      </div>
    </section>
    <section class="tours-sale">
      <div class="row no-gutters align-items-center">
        <div class="col-md-12">
          <div class="content">
            <div class="detail">
              <div class="detail-left">
                <div class="sale-box">
                  <h2>20</h2>
                  <span class="sup-1">%</span>
                  <span>off</span>
                </div>
                <h3>SALE</h3>
              </div>
              <div class="detail-right">
                <h2>Hà Nội - Hạ Long</h2>
                <p>
                  Du lịch Hà Nội - Hạ Long 3 ngày 4 đêm (Khởi hành từ Hồ Chí
                  Minh)
                </p>
                <div class="group-btn">
                  <a href="#">Đặt Ngay</a>
                  <a href="#">Xem Thêm</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="contact-us">
      <div class="container">
        <div class="contact-form">
          <h5>Liên Hệ Với Chúng Tôi</h5>
          <p>
            Chỉ xách balo và đi! Hãy để lại kế hoạch du lịch của bạn cho các
            chuyên gia du lịch!
          </p>
          <form action="#">
            <input
              type="text"
              class="form-control form-input reset-apperance"
              placeholder="Họ tên"
              required
            />
            <input
              type="email"
              class="form-control form-input reset-apperance"
              placeholder="Email"
              required
            />
            <input
              type="text"
              class="form-control form-input reset-apperance"
              placeholder="Số điện thoại"
              required
            />
            <textarea
              name="content"
              id="contentLH"
              placeholder="Nội dung"
              class="form-control form-input reset-apperance"
              required
            ></textarea>
            <button
              id="sendLH"
              type="submit"
              data-hover="Bây giờ"
              class="btn-slide reset-apperance"
            >
              <span class="text">Gửi</span>
            </button>
          </form>
        </div>
      </div>
    </section>
  </div>
@endsection
