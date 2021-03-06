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
        <div class="col-lg-3 col-md-12 filter-news-mobile">
          <div class="filter-news">
            <form action="/tim-tin-tuc">
              <input type="text" name="keyword" placeholder="Tìm kiếm ..." />
              <button type="submit">
                <i class="fa fa-search"></i>
              </button>
            </form>
          </div>
        </div>
        <div class="col-lg-9 col-md-12">
          <div class="news-list">
            <div class="items">
              <img src="{{asset('BackEnd/assets/images/news')}}/{{$showOneNew->url_img_news}}" alt="news" />
              <h3 class="title">{{ucwords($showOneNew->title)}}</h3>
              <div class="list-info">
                <span>{{date('d/m/Y',strtotime($showOneNew->created_at))}}</span>
                <a><span class="cmt-count">{{count($showComment)}}</span> Nhận xét</a>
                <span><i class="fas fa-eye"></i> {{$showOneNew->views}}</span>
                <span><i class="fas fa-thumbs-up"></i> {{$showOneNew->likes}}</span>
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
                    @if (session('account'))
                    <!-- data-like: 0 là chưa thích, 1 là đã thích -->
                    <div class="shared__icon" data-id-tn="{{$showOneNew->id_news}}" data-id-user="{{session('account')->id_user}}" data-type="0" data-is-liked="<?= count(\App\like_table::where([['id_tn', '=', $showOneNew->id_news], ['id_user', '=', session('account')->id_user], ['type', '=', '0']])->get()) ? '1' : '0' ?>">
                      <a href="#">
                        <i class="fas fa-thumbs-up"></i>
                        <span class="share__text"><?= count(\App\like_table::where([['id_tn', '=', $showOneNew->id_news], ['id_user', '=', session('account')->id_user], ['type', '=', '0']])->get()) ? 'Bỏ thích' : 'Thích' ?> </span>
                      </a>
                      <!-- <a href="#"><i class="fab fa-facebook-f"></i></a>
                      <a href="#"><i class="fab fa-instagram"></i></a> -->
                    </div>
                    @endif
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-9 col-md-12">
              {{-- <div class="poster">
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
          </div> --}}
        </div>
        <div class="comments">
          <div class="comments__title">
            <h3>Bình luận <span class="cmt-count">({{count($showComment)}})</span></h3>
          </div>
          <div class="comments__list" id="showComment">
            @foreach ($showCommentLimit as $c)
            <div class="items">
              <div class="info-users">
                <img src="{{asset('BackEnd/assets/images')}}/{{$c->url_avatar}}" alt="avatar" />
                <div>
                  <h4>{{$c->name}}</h4>
                  <span>{{date('d/m/Y: H:i:s',strtotime($c->created_at))}}</span>
                  <div class="rate" style="margin:5px 0 0; color:#ffc700">
                    @for ($i = 1; $i <= $c->rating; $i++)
                      <i class="fa fa-star"></i>
                      @endfor
                  </div>
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
            <a href="#" class='pagination-cmts' data-id='{{$showOneNew->id_news}}' data-type="news">Xem thêm</a>
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
                      <textarea class="form-control validate-form-control" name="comment" placeholder="Nhận xét ..." id="comment" cols="45" rows="6"></textarea>
                    </div>
                    <div class="col-md-6">
                      <input class="form-control" type="text" placeholder="Họ và tên*" readonly value="{{session('account')->name}}" />
                    </div>
                    <div class="col-md-6">
                      <input class="form-control" type="email" placeholder="Email*" readonly value="{{session('account')->email}}" />
                      <input type="hidden" name="id_user" value="{{session('account')->id_user}}">
                      <input type="hidden" name="id" value="{{$showOneNew->id_news}}">
                    </div>
                  </div>
                </div>
                <div class="btn-submit">
                  <input type="hidden" name="type" value="news">
                  <button class="form-control" type="button" onclick="addComment()">
                    BÌNH LUẬN
                  </button>
                </div>
              </div>
            </form>
            @else
            <div>Vui lòng <a style="display: inline-block;
                        padding: 5px 10px;
                        border-radius: 50px;
                        background-color: #4d4d4d;
                        color: #fff;" href="/dang-nhap?prev_url=<?= $_SERVER["REQUEST_URI"] ?>">Đăng nhập</a> để bình luận</div>
            @endif

          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-12">
      <div class="filter-news">
        <form action="/tim-tin-tuc" class="filter-news-desktop">
          <input type="text" name="keyword" placeholder="Tìm kiếm ..." />
          <button type="submit">
            <i class="fa fa-search"></i>
          </button>
        </form>
        <div class="abouts">
          <h3>Về chúng tôi</h3>
          <img src="{{asset('FrontEnd/assets/images/defaults')}}/travelers.jpg" alt="travels" />
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
                <img src="{{asset('BackEnd/assets/images/news')}}/{{$hl->url_img_news}}" alt="news" />
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
              <a href="/tours?mien={{$m->id_mien}}">{{$m->name_mien}}</a>
            @endforeach
            @foreach ($showTinh as $t)
              <a href="/tours?tinh={{$t->id_tinh}}">{{$t->name_tinh}}</a>
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