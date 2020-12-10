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
          <form class="wrap-form" action="{{ URL::to('/timkiem') }}">
            @csrf
            <div class="row no-gutters">
              <div class="col-lg-3 line">
                <div class="wrapper-items-form">
                  <div class="item">
                    <i class="fas fa-map-marker-alt" aria-hidden="true"></i>
                    <div class="content">
                      <label for="diemden">Điểm đến</label>
                      <input type="text" id="diemden" placeholder="Nơi mà bạn muốn đến?" name="diemden" />
                        @error('diemden')
                            <p style="color:red">{{$message}}</p>
                        @enderror
                    </div>
                  </div>
                  <div class="wrap-dropdown-place">
                    <ul class="dropdown-place">
                      @foreach ($showTinh as $t)
                        <li data-value="{{$t->id_tinh}}"><span>{{$t->name_tinh}}</span></li>
                      @endforeach
                    </ul>
                  </div>
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
                        @error('from-date')
                            <p style="color:red">{{$message}}</p>
                        @enderror
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
                        @error('to-date')
                            <p style="color:red">{{$message}}</p>
                        @enderror
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
        <div class="row opg">
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
            data-wow-delay="0.2s"
          >
            <img
              class="img-fluid w-100"
              src="{{asset('FrontEnd/assets/images/defaults')}}/vietnamoi.png"
              alt="test"
            />
          </div>
        </div>
      </div>
      <div class="image-ol">
        <div class="img1"><img src="{{asset('FrontEnd/assets/images/defaults')}}/cay1.png" alt="img"></div>
        <div class="img2"><img src="{{asset('FrontEnd/assets/images/defaults')}}/cay2.png" alt="img"></div>
      </div>
    </section>
    <section class="regions">
      <div class="container">
        <div class="sub-title">
          <p>xách ba lô lên và đi</p>
          <h2>3 miền <strong>Việt Nam</strong></h2>
        </div>
        <div class="row wow fadeInUp"
          data-wow-duration="1s"
          data-wow-delay="0.2s">
        @foreach ($showMien as $m)
        <div class="col-md-4 ">
            <div class="wrapper-image">
              <a href="/tours/mien/{{$m->id_mien}}"
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
                <a href="/tours/mien/{{$m->id_mien}}">Khám phá {{$m->id_mien}}</a>
              </div>
            </div>
          </div>
        @endforeach

        </div>
        <div class="more text-center">
          <a href="/tours">XEM THÊM</a>
        </div>
      </div>
    </section>
    <section class="experience">
      <div class="container">
        <div class="row">
          <div
            class="col-md-12"
          >
            <div class="content">
              <div class="wow fadeInUp"  data-wow-duration="1s" data-wow-delay="0.2s">
              <h2>NHỮNG <strong>CHUYẾN ĐI</strong> MỚI</h2>
              <h3>TRẢI NGHIỆM</h3>
              <p>
                There are many variations of passages of. Lorem Ipsum
                available, but the majority have suffered alteration in some
                form, by injected humour, or randomised words which don't
                look.
              </p>
            </div>

              <div class="img-video wow fadeInUp"  data-wow-duration="1s" data-wow-delay="0.4s">
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
      <div class="tour-hot__title wow fadeInUp"  data-wow-duration="1s" data-wow-delay="0.2s">
        <h2 class="title">Tour Hot</h2>
        <h3 class="sub-title">Hãy Chọn Ngay</h3>
      </div>
      <div class="swiper-container2" style="padding: 0 15px">
        <div class="swiper-wrapper">
          @foreach($showToursLimit as $t)
            <div class="swiper-slide">
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
                        >{{date("d-m-Y", strtotime($t->date_start))}}
                      </span>
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
        <div class="swiper-pagination"></div>
      </div>
      <div class="image-ol">
        <div class="img1"><img src="{{asset('FrontEnd/assets/images/defaults')}}/mayanh.png" alt="img"></div>
        <div class="img2"><img src="{{asset('FrontEnd/assets/images/defaults')}}/traibanh.png" alt="img"></div>
        <div class="img3"><img src="{{asset('FrontEnd/assets/images/defaults')}}/voso.png" alt="img"></div>
        <div class="img4">
          <img src="{{asset('FrontEnd/assets/images/defaults')}}/laban.png" alt="img">
        </div>
      </div>
    </section>
    <section class="news">
      <div class="container">
        <h2>Tin tức mới nhất</h2>
        <div
          class="swiper-container3 wow fadeInUp"
          data-wow-delay="0.2s"
          data-wow-duration="1s"
        >
          <div class="swiper-wrapper">
              @foreach ($showOneNews as $tintuc)
              <div class="swiper-slide">
                <div class="row">
                  <div class="col-md-6">
                  <a href="/tin-tuc/dt/{{$tintuc->id_news}}">
                    <img
                  src="{{asset('BackEnd/assets/images/news')}}/{{ $tintuc->url_img_news}}"
                      class="w-100 img-fluid"
                      alt="images"
                      style="height:100%; object-fit:cover"
                    />
                    </a>
                  </div>
                  <div class="col-md-6">
                    <div class="content">
                      <a class="title" href="/tin-tuc/dt/{{$tintuc->id_news}}"
                        >{{ $tintuc->title}}</a
                      >
                      <ul>
                      <li><a href="/tin-tuc/dt/{{$tintuc->id_news}}">{{date('m-d-Y',strtotime($tintuc->updated_at))}}</a></li>
                        <li><a href="#.">{{$tintuc->name}}</a></li>
                      </ul>
                      <p>
                        {{ $tintuc->short_content}}
                      </p>
                    </div>
                    <a class="btn btn-main" href="/tin-tuc/dt/{{$tintuc->id_news}}">Xem Thêm</a>
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
            <div class="swiper-container6">
              <div class="swiper-wrapper">
              @foreach($showToursSale as $s)
                <div class="swiper-slide">
                  <div class="detail">
                    <div class="detail-left wow fadeInLeft"  data-wow-duration="1s" data-wow-delay="0.2s">
                      <div class="sale-box">
                        <h2>{{$s->discount}}</h2>
                        <span class="sup-1">%</span>
                        <span>off</span>
                      </div>
                      <h3>GIẢM GIÁ</h3>
                    </div>
                    <div class="detail-right wow fadeInRight"  data-wow-duration="1s" data-wow-delay="0.2s">
                      <h2>{{$s->name_tour}}</h2>
                      <p>
                        {{$s->short_content}}
                      </p>
                      <div class="group-btn">
                        <a href="/tours/dt/{{$s->id_tour}}">Đặt Ngay</a>
                        <a href="/tours/dt/{{$s->id_tour}}">Xem Thêm</a>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <section class="contact-us">
      <div class="container">
        <div class="contact-form wow fadeInUp"  data-wow-duration="1s" data-wow-delay="0.2s">
          <h5>Liên Hệ Với Chúng Tôi</h5>
          <p>
            Chỉ xách balo và đi! Hãy để lại kế hoạch du lịch của bạn cho các
            chuyên gia du lịch!
          </p>
          <form class="user-ajax"  action="lien-he" method="post" novalidate="novalidate">
            <div class="form-group  validate-input" data-validate="Tên không đúng định dạng">
              <input
                type="text"
                class="form-control validate-form-control"
                name="name"
                placeholder="Họ và Tên (*)"
              />
            </div>
            <div class="form-group  validate-input"  data-validate="Email không đúng định dạng">
              <input
                type="email"
                class="form-control validate-form-control"
                name="email"
                placeholder="Email của bạn (*)"
              />
            </div>
            <div class="form-group validate-input"  data-validate="Số điện thoại không đúng định dạng">
                  <input
                    type="text"
                    class="form-control validate-form-control"
                    maxlength="10"
                    id="phone"
                    name="phone"
                    placeholder="Số điện thoại (*)"
                  />
                </div>
            <div class="form-group  validate-input"   data-validate="Lời nhắn không đúng định dạng">
              <textarea class="form-control validate-form-control" name="content" id="" cols="30" rows="10" placeholder="Để lại lời nhắn... (*)"></textarea>
            </div>
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
