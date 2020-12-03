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
            <li><a href="{{url('/')}}">Trang chủ</a></li>
						<li ><a href="{{url('/doi-tac')}}">Đối tác</a></li>
						<li class='--active'><a href="<?="/doi-tac/dt/$infoPartner->id_doitac"?>">{{$infoPartner->name}}</a></li>
						</ul>
					</div>
				</div>
      <section class="partner-info">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-12">
              <div class="partner-info__content">
                <img src="{{asset('FrontEnd/assets/images/defaults/')}}/phuoc.jpg" alt="hihi" />
                <h3>{{$infoPartner->name}}</h3>
                <!-- <h4>255 Review</h4> -->
                <p>Hợp tác từ {{date("d-m-Y", strtotime($infoPartner->contract_date))}}</p>
              </div>
              <div class="partner-info__address">
                <p>
                  <b>Giới thiệu:</b> {{$infoPartner->slogan}}
                </p>
              </div>
              <div class="partner-info__author">
                <h3>Thông tin chi tiết</h3>
                <ul>
                  <li>
                    <span>
                      <i class="fa fa-phone"></i>
                    </span>
                    <span>{{$infoPartner->phone_doitac}}</span>
                  </li>
                  <li>
                    <span>
                      <i class="fa fa-envelope"></i>
                    </span>
                    <span>{{$infoPartner->email_doitac}}</span>
                  </li>
                  <li>
                    <span>
                      <i class="fas fa-map-marker-alt"></i>
                    </span>
                    <span>{{$infoPartner->address_doitac}}</span>
                  </li>
                  <li>
                    <span>
                      <i class="fa fa-handshake"></i>
                    </span>
                    <span>Đối tác <?= $infoPartner->slogan ?></span>
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
                  @foreach ($showToursLimit as $t)
                    <div class="col-lg-4 col-md-6">
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
                        <div class="content" style="min-height: 210px">
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
                                >{{date("d-m-Y", strtotime($t->date_start))}}</span
                              >
                            </div>
                            <div class="d-flex flex-wrap">
                              <p style=" margin-top: 5px">
                                <i class="fas fa-bolt"></i>
                                <b>{{ number_format(($t->price - ($t->price * $t->discount / 100)), 0, '', '.')}} VNĐ</b>
                              </p>
                              <del style="padding-left: 5px; font-size: 12px; vertical-align: bottom">{{number_format($t->price, 0, '', '.')}} VNĐ</del>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
              <div class='pagination'>
                <nav>
                  <div class='<?=(!isset($_GET['page']) || $_GET['page'] <= 1) ? 'disable' : '' ?>'><a href='/doi-tac/dt/<?=$infoPartner->id_doitac?>?page=<?=(!isset($_GET['page']) ? '1' : $_GET['page'] - 1)?>'><</a></div>
                  <div><b class="page"><?=(!isset($_GET['page']) ? '1' : $_GET['page'])?> </b> &nbsp;/&nbsp; <span class="total-page">{{ceil(count($showToursTotal) / 12)}}</span></div>
                  <div  class='<?=(isset($_GET['page']) && $_GET['page'] == ceil(count($showToursTotal) / 12)) ? 'disable' : '' ?>'><a href='/doi-tac/dt/<?=$infoPartner->id_doitac?>?page=<?=(!isset($_GET['page']) ? '2' : $_GET['page'] + 1)?>'>></a></div>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
    @endsection
