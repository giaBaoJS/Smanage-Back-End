@extends('front-end/layout/layout')
@section('title', 'Chi Tiết Tin Tức')
@section('wrapper')
<div class="wrapper-detail-news">
      <section class="hero-banner">
        <div class="container">
        <h2>{{$showOneNew->title}}</h2>
        </div>
      </section>
      <section class="detail-news">
        <div class="container">
          <div class="row">
            <div class="col-lg-9 col-md-8">
              <div class="news-list">
                <div class="items">
                  <a href="#">
                    <img
                      src="{{asset('BackEnd/assets/images/news')}}/{{$showOneNew->url_img_news}}"
                      alt="news"
                  /></a>
                  <h3 class="title">{{ucwords($showOneNew->title)}}</h3>
                  <div class="list-info">
                    <span>{{date('d/m/Y',strtotime($showOneNew->created_at))}}</span>
                    <a>4 Nhận xét</a>
                  </div>
                  {!!$showOneNew->content!!}
                  <div class="shared">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="list-tag">
                          <a href="#">Miền Bắc</a>
                          <a href="#">Núi rừng</a>
                          <a href="#">Cao bằng</a>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="shared__icon">
                          <a href="#"><i class="fa fa-facebook-f"></i></a>
                          <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="poster">
                    <div class="info">
                      <img
                        src="{{asset('BackEnd/assets/images')}}/{{$showOneNew->url_avatar}}"
                        alt="avatar"
                      />
                      <div>
                        <h4>{{$showOneNew->name}}</h4>
                        <p>Quản trị viên</p>
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
                          src="{{asset('FrontEnd/assets/images/defaults')}}/bao.jpg"
                          alt="avatar"
                        />
                        <div>
                          <h4>Gia Bảo</h4>
                          <span>22/10/2020</span>
                        </div>
                      </div>
                      <div class="comment">
                        <p>
                          Dream constantly receive a stable income on the
                          auction and make less mistakes? Introducing To your
                          attention– service for automatic investment in
                          profitable positions on the exchange. For a successful
                          start, register in the system and after making $ 300
                          attention– service for automatic investment in
                          profitable positions on the exchange. For a successful
                          start, register in the system and after making $ 300
                        </p>
                        <a href="#">TRẢ LỜI</a>
                      </div>
                    </div>
                    <div class="items">
                      <div class="info-users">
                        <img
                          src="{{asset('FrontEnd/assets/images/defaults')}}/bao.jpg"
                          alt="avatar"
                        />
                        <div>
                          <h4>Gia Bảo</h4>
                          <span>22/10/2020</span>
                        </div>
                      </div>
                      <div class="comment">
                        <p>
                          Dream constantly receive a stable income on the
                          auction and make less mistakes? Introducing To your
                          attention– service for automatic investment in
                          profitable positions on the exchange. For a successful
                          start, register in the system and after making $ 300
                          attention– service for automatic investment in
                          profitable positions on the exchange. For a successful
                          start, register in the system and after making $ 300
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
            </div>
            <div class="col-lg-3 col-md-4">
                <div class="filter-news">
                  <form action="#">
                    <input type="text" placeholder="Tìm kiếm ..." />
                    <button type="submit">
                      <i class="fa fa-search"></i>
                    </button>
                  </form>
                  <div class="abouts">
                    <h3>Về chúng tôi</h3>
                    <img
                      src="{{asset('FrontEnd/assets/images/defaults')}}/travelers.jpg"
                      alt="travels"
                    />
                    <p>
                      Nam dapibus nisl vitae elit fringilla rutrum. Aenean
                      sollicitudin, erat a elementum rutrum, neque sem pretium
                      metus, quis mollis nisl nunc et massa
                    </p>
                  </div>
                  <div class="lasted-news">
                    <h3>Tin mới nhất</h3>
                    <div class="row no-gutters">
                        @foreach ($showNewsHighlights as $hl)
                          <div class="col-md-4 mb-3">
                              <a href="/tin-tuc/dt/{{$hl->id_news}}">
                              <img
                                  src="{{asset('BackEnd/assets/images/news')}}/{{$hl->url_img_news}}"
                                  alt="news"
                              />
                              </a>
                          </div>
                          <div class="col-md-8 mb-3">
                              <div class="content">
                              <h3><a href="/tin-tuc/dt/{{$hl->id_news}}">{{$hl->title}}</a></h3>
                              <span>{{date('d',strtotime($hl->created_at))}} Tháng {{date('m',strtotime($hl->created_at))}} Năm {{date('Y',strtotime($hl->created_at))}}</span>
                              </div>
                          </div>
                        @endforeach
                    </div>
                  </div>
                  <div class="tag-news">
                    <h3>Tags</h3>
                    <div class="list-tag">
                        @foreach ($showMien as $m)
                          <a href="#">{{$m->name_mien}}</a>
                        @endforeach
                        @foreach ($showTinh as $t)
                        <a href="#">{{$t->name_tinh}}</a>
                        @endforeach
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
      </section>
    </div>
    @endsection
